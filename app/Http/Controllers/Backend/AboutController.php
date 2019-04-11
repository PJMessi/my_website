<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\AboutSec;
use App\AitemSec;

class AboutController extends Controller
{
    public function show_backend_about(){
        $about_sec_rows = AboutSec::orderBy('created_at', 'desc')->get();
        return view("backend.about")->with([
            "title" => "about",
            "about_rows" => $about_sec_rows
        ]);
    }

    public function add_backend_about(Request $request){
        \DB::beginTransaction();
        try{
            $about_row = new AboutSec();
            $about_row_pub = AboutSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
            if($request->has("about_status")){
                $about_row->status = "PUBLISHED";               
                $about_row_pub->status = "DRAFT";
                $about_row_pub->save();               
            }
            else{
                $about_row->status = "DRAFT";
            }
            $about_row->watermark = $request->input('about_watermark');
            $about_row->heading_1 = $request->input('about_heading_1');
            $about_row->heading_2 = $request->input('about_heading_2');
            $about_row->description = $request->input('about_description');
            $about_row->image_label = $request->input('about_image_label');
            $about_row->button = [$request->input('about_button_link'), $request->input('about_button_txt')];

            if( $request->hasFile('about_image') ){
                $file_name_with_ext = $request->file('about_image')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('about_image')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('about_image')->storeAs('public/images/about_section', $file_name_to_store);        
                $about_row->image = $file_name_to_store;
            }
            $about_row->save();
            \DB::commit();
            return redirect()->back()->with('success', 'Your data is saved in the about section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the about section');
        }
    }

    public function delete_backend_about($id){
        $about_row = AboutSec::find($id);
        if($about_row->status == 'DRAFT'){
            $about_row->delete();
            if( isset($about_row->image)){
                \Storage::delete('public/images/about_section/'.$about_row->image);
            }
            return redirect()->back()->with('success', 'The selected row is deleted');
        }
        else{
            return redirect()->back()->with('error', 'The row is currently published. Please select another row as published before deleting.');
        }
    }

    public function edit_backend_about(Request $request, $id){
        \DB::beginTransaction();
        try{
            $about_row = AboutSec::find($id);
            $about_row_pub = AboutSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
    
            $about_row->watermark = $request->input("about_watermark");
            $about_row->heading_1 = $request->input("about_heading_1");
            $about_row->heading_2 = $request->input("about_heading_2");
            $about_row->description = $request->input("about_description");
            $about_row->image_label = $request->input("about_image_label");
            $about_row->button = [$request->input('about_button_link'), $request->input('about_button_txt')];

            if( $request->hasFile('about_image') ){
                if( isset($about_row->image)){
                    \Storage::delete('public/images/about_section/'.$about_row->image);
                }
                $file_name_with_ext = $request->file('about_image')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('about_image')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('about_image')->storeAs('public/images/about_section', $file_name_to_store);        
                $about_row->image = $file_name_to_store;
            }
    
            if($request->has("about_status") && $about_row->status == 'DRAFT'){
                $about_row->status = "PUBLISHED";                
                $about_row_pub->status = "DRAFT";
                $about_row_pub->save();            
            }
    
            $about_row->save();
            \DB::commit();
            if(!$request->has("about_status") && $about_row->status == 'PUBLISHED'){
                return redirect()->back()->with('warning', 'To unpublish this row, please publish some other row first. The rest of your changes are saved.');
            }
            return redirect()->back()->with('success', 'Your changes are saved in the about section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the about section');
        }


        
    }


    public function show_backend_aitem(){
        $aitem_sec_rows = AitemSec::orderBy('created_at', 'desc')->get();
        return view("backend.aitem")->with([
            "title" => "about_item",
            "aitem_rows" => $aitem_sec_rows,
        ]);
    }

    public function add_backend_aitem(Request $request){
        $aitem_row = new AitemSec();            
        if($request->has("aitem_status")){
            $aitem_row->status = "PUBLISHED";                         
        }
        else{
            $aitem_row->status = "DRAFT";
        }
        $aitem_row->icon = $request->input('aitem_icon');
        $aitem_row->heading = $request->input('aitem_heading');
        $aitem_row->description = $request->input('aitem_description');

        if($aitem_row->save()){
            return redirect()->back()->with('success', 'Your data is saved in the about section');
        }            
        return redirect()->back()->with('error', 'Your data could not be saved in the about section'); 
    }

    public function delete_backend_aitem($id){
        $aitem_row = AitemSec::find($id);
        
        if($aitem_row->delete()){
            return redirect()->back()->with('success', 'The selected row is deleted');
        }  
        return redirect()->back()->with('error', 'The selected row could not be deleted');
    }

    public function edit_backend_aitem(Request $request, $id){        
        $aitem_row = AitemSec::find($id);    
        $aitem_row->icon = $request->input("aitem_icon");
        $aitem_row->heading = $request->input("aitem_heading");
        $aitem_row->description = $request->input("aitem_description");

        if($request->has("aitem_status")){
            $aitem_row->status = "PUBLISHED";                           
        }
        else{
            $aitem_row->status = "DRAFT";     
        }

        if($aitem_row->save()){
            return redirect()->back()->with('success', 'Your changes are saved in the about section');
        }

        return redirect()->back()->with('error', 'Your data could not be saved in the about section');      
    }

}
