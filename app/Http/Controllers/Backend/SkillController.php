<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SkillSec;
use App\SitemSec;

class SkillController extends Controller
{
    public function show_backend_skill(){
        $skill_sec_rows = SkillSec::orderBy('created_at', 'desc')->get();
        return view("backend.skill")->with([
            "title" => "skill",
            "skill_rows" => $skill_sec_rows,
        ]);
    }

    public function add_backend_skill(Request $request){
        \DB::beginTransaction();
        try{
            $skill_row = new SkillSec();
            $skill_row_pub = SkillSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
            if($request->has("skill_status")){
                $skill_row->status = "PUBLISHED";               
                $skill_row_pub->status = "DRAFT";
                $skill_row_pub->save();               
            }
            else{
                $skill_row->status = "DRAFT";
            }
            $skill_row->watermark = $request->input('skill_watermark');
            $skill_row->heading = $request->input('skill_heading');
            $skill_row->description = $request->input('skill_description');        

            if( $request->hasFile('skill_image') ){
                $file_name_with_ext = $request->file('skill_image')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('skill_image')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('skill_image')->storeAs('public/images/skill_section', $file_name_to_store);        
                $skill_row->image = $file_name_to_store;
            }
            $skill_row->save();
            \DB::commit();
            return redirect()->back()->with('success', 'Your data is saved in the skill section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the skill section');
        }
    }

    public function delete_backend_skill($id){
        $skill_row = SkillSec::find($id);
        if($skill_row->status == 'DRAFT'){
            $skill_row->delete();
            if( isset($skill_row->image)){
                \Storage::delete('public/images/skill_section/'.$skill_row->image);
            }
            return redirect()->back()->with('success', 'The selected row is deleted');
        }
        else{
            return redirect()->back()->with('error', 'The row is currently published. Please select another row as published before deleting.');
        }
    }

    public function edit_backend_skill(Request $request, $id){
        \DB::beginTransaction();
        try{
            $skill_row = SkillSec::find($id);
            $skill_row_pub = SkillSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft

            $skill_row->watermark = $request->input('skill_watermark');
            $skill_row->heading = $request->input("skill_heading");
            $skill_row->description = $request->input("skill_description");
  
            if( $request->hasFile('skill_image') ){
                if( isset($skill_row->image)){
                    \Storage::delete('public/images/skill_section/'.$skill_row->image);
                }
                $file_name_with_ext = $request->file('skill_image')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('skill_image')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('skill_image')->storeAs('public/images/skill_section', $file_name_to_store);        
                $skill_row->image = $file_name_to_store;
            }
    
            if($request->has("skill_status") && $skill_row->status == 'DRAFT'){
                $skill_row->status = "PUBLISHED";                
                $skill_row_pub->status = "DRAFT";
                $skill_row_pub->save();            
            }
    
            $skill_row->save();
            \DB::commit();
            if(!$request->has("skill_status") && $skill_row->status == 'PUBLISHED'){
                return redirect()->back()->with('warning', 'To unpublish this row, please publish some other row first. The rest of your changes are saved.');
            }
            return redirect()->back()->with('success', 'Your changes are saved in the skill section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the skill section');
        }


        
    }

    public function show_backend_sitem(){
        $sitem_sec_rows = SitemSec::orderBy('created_at', 'desc')->get();
        return view("backend.sitem")->with([
            "title" => "skill_item",
            "sitem_rows" => $sitem_sec_rows,
        ]);
    }

    public function add_backend_sitem(Request $request){
        \DB::beginTransaction();
        try{
            $sitem_row = new SitemSec();
            $sitem_row_pub = SitemSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
            if($request->has("sitem_status")){
                $sitem_row->status = "PUBLISHED";           
                $sitem_row_pub->status = "DRAFT";
                $sitem_row_pub->save();               
            }
            else{
                $sitem_row->status = "DRAFT";
            }
    
            $sitem_row->heading_1 = $request->input('sitem_heading_1');    
            $sitem_row->description_1 = $request->input('sitem_description_1');
            $sitem_row->heading_2 = $request->input('sitem_heading_2');    
            $sitem_row->description_2 = $request->input('sitem_description_2');

            $data_array = [];
            foreach( explode(",",$request->input("sitem_items_1")) as $item ){
                $item_data = explode(":", $item);            
                array_push($data_array, [preg_replace('!\s+!', '', $item_data[0]), preg_replace('!\s+!', '', $item_data[1])]);      
            }
            $sitem_row->items_1 = $data_array;
            
            $data_array = [];
            foreach( explode(",",$request->input("sitem_items_2")) as $item ){
                $item_data = explode(":", $item);            
                array_push($data_array, [preg_replace('!\s+!', '', $item_data[0]), preg_replace('!\s+!', '', $item_data[1])]);       
            }
            $sitem_row->items_2 = $data_array;
            $sitem_row->save();
    
            \DB::commit();
            return redirect()->back()->with('success', 'Your data is saved in the skill section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the skill section');
        }
    }

    public function delete_backend_sitem($id){

        $sitem_row = SitemSec::find($id);
        if($sitem_row->status == 'DRAFT'){
            $sitem_row->delete();
            return redirect()->back()->with('success', 'The selected row is deleted');
        }
        else{
            return redirect()->back()->with('error', 'The row is currently published. Please select another row as published before deleting.');
        }
    }

    public function edit_backend_sitem(Request $request, $id){        
        \DB::beginTransaction();
        try{
            $sitem_row = SitemSec::find($id); 
            $sitem_row_pub = SitemSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
    
            $sitem_row->heading_1 = $request->input('sitem_heading_1');    
            $sitem_row->description_1 = $request->input('sitem_description_1');
            $sitem_row->heading_2 = $request->input('sitem_heading_2');    
            $sitem_row->description_2 = $request->input('sitem_description_2');
    
            $data_array = [];
            foreach( explode(",",$request->input("sitem_items_1")) as $item ){
                $item_data = explode(":", $item);            
                array_push($data_array, [preg_replace('!\s+!', '', $item_data[0]), preg_replace('!\s+!', '', $item_data[1])]);       
            }
            
            $sitem_row->items_1 = $data_array;
            
            $data_array = [];
            foreach( explode(",",$request->input("sitem_items_2")) as $item ){
                $item_data = explode(":", $item);            
                array_push($data_array, [preg_replace('!\s+!', '', $item_data[0]), preg_replace('!\s+!', '', $item_data[1])]);      
            }
            $sitem_row->items_2 = $data_array;         
    
            if($request->has("sitem_status") && $sitem_row->status == 'DRAFT'){
                $sitem_row->status = "PUBLISHED";                
                $sitem_row_pub->status = "DRAFT";
                $sitem_row_pub->save();            
            }
    
            $sitem_row->save();
            \DB::commit();
            if(!$request->has("sitem_status") && $sitem_row->status == 'PUBLISHED'){
                return redirect()->back()->with('warning', 'To unpublish this row, please publish some other row first. The rest of your changes are saved.');
            }
            return redirect()->back()->with('success', 'Your changes are saved in the sitem section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the sitem section');
        }            
    }

}
