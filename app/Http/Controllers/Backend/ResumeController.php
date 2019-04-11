<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ResumeSec;
use App\RitemSec;

class ResumeController extends Controller
{
    public function show_backend_resume(){
        $resume_sec_rows = ResumeSec::orderBy('created_at', 'desc')->get();
        return view("backend.resume")->with([
            "title" => "resume",
            "resume_rows" => $resume_sec_rows,
        ]);
    }

    public function add_backend_resume(Request $request){
        \DB::beginTransaction();
        try{
            $resume_row = new ResumeSec();
            $resume_row_pub = ResumeSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
            if($request->has("resume_status")){
                $resume_row->status = "PUBLISHED";           
                $resume_row_pub->status = "DRAFT";
                $resume_row_pub->save();               
            }
            else{
                $resume_row->status = "DRAFT";
            }
            $resume_row->watermark = $request->input('resume_watermark');
            $resume_row->heading_1 = $request->input('resume_heading_1');
            $resume_row->heading_2 = $request->input('resume_heading_2');
            $resume_row->description = $request->input('resume_description');      
            $resume_row->button = [$request->input('resume_button_link'), $request->input('resume_button_txt')];    
            $resume_row->save();

            \DB::commit();
            return redirect()->back()->with('success', 'Your data is saved in the resume section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the resume section');
        }

    }

    public function delete_backend_resume($id){
        $resume_row = ResumeSec::find($id);
        if($resume_row->status == 'DRAFT'){
            $resume_row->delete();            
            return redirect()->back()->with('success', 'The selected row is deleted');
        }
        else{
            return redirect()->back()->with('error', 'The row is currently published. Please select another row as published before deleting.');
        }
    }

    public function edit_backend_resume(Request $request, $id){
        \DB::beginTransaction();
        try{
            $resume_row = ResumeSec::find($id);
            $resume_row_pub = ResumeSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
    
            $resume_row->watermark = $request->input("resume_watermark");
            $resume_row->heading_1 = $request->input("resume_heading_1");
            $resume_row->heading_2 = $request->input("resume_heading_2");
            $resume_row->description = $request->input("resume_description");  
            $resume_row->button = [$request->input('resume_button_link'), $request->input('resume_button_txt')];              
    
            if($request->has("resume_status") && $resume_row->status == 'DRAFT'){
                $resume_row->status = "PUBLISHED";                
                $resume_row_pub->status = "DRAFT";
                $resume_row_pub->save();            
            }
    
            $resume_row->save();
            \DB::commit();
            if(!$request->has("resume_status") && $resume_row->status == 'PUBLISHED'){
                return redirect()->back()->with('warning', 'To unpublish this row, please publish some other row first. The rest of your changes are saved.');
            }
            return redirect()->back()->with('success', 'Your changes are saved in the resume section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the resume section');
        }        
    }


    public function show_backend_ritem(){
        $ritem_sec_rows = RitemSec::orderBy('created_at', 'desc')->get();
        return view("backend.ritem")->with([
            "title" => "resume_item",
            "ritem_rows" => $ritem_sec_rows,
        ]);
    }

    public function add_backend_ritem(Request $request){
        $ritem_row = new RitemSec();            
        if($request->has("ritem_status")){
            $ritem_row->status = "PUBLISHED";                         
        }
        else{
            $ritem_row->status = "DRAFT";
        }

        $ritem_row->icon = $request->input('ritem_icon');
        $ritem_row->heading = $request->input('ritem_heading');
        $ritem_row->interval = $request->input('ritem_interval');
        $ritem_row->description = $request->input('ritem_description');
        
        if( $request->hasFile('ritem_image') ){
            $file_name_with_ext = $request->file('ritem_image')->getClientOriginalName();
            $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
            $extension = $request->file('ritem_image')->getClientOriginalExtension();
            $file_name_to_store = $file_name.'_'.time().'.'.$extension;
            $path = $request->file('ritem_image')->storeAs('public/images/ritem_section', $file_name_to_store);        
            $ritem_row->image = $file_name_to_store;        
        }        


        if($ritem_row->save()){
            return redirect()->back()->with('success', 'Your data is saved in the resume section');
        }            
        return redirect()->back()->with('error', 'Your data could not be saved in the resume section'); 
    }

    public function delete_backend_ritem($id){
        $ritem_row = RitemSec::find($id);
        if( isset($ritem_row->image)){
            \Storage::delete('public/images/ritem_section/'.$ritem_row->image);
        }
        if($ritem_row->delete()){
            return redirect()->back()->with('success', 'The selected row is deleted');
        }  
        return redirect()->back()->with('error', 'The selected row could not be deleted');
    }

    public function edit_backend_ritem(Request $request, $id){        
        $ritem_row = RitemSec::find($id); 
           
        $ritem_row->icon = $request->input("ritem_icon");
        $ritem_row->heading = $request->input("ritem_heading");
        $ritem_row->interval = $request->input("ritem_interval");
        $ritem_row->description = $request->input("ritem_description");

        if($request->has("ritem_image_enable")){
            if( $request->hasFile('ritem_image') ){

                if(isset($ritem_row->image)){
                    \Storage::delete('public/images/ritem_section/'.$ritem_row->image);
                }
                $file_name_with_ext = $request->file('ritem_image')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('ritem_image')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('ritem_image')->storeAs('public/images/ritem_section', $file_name_to_store);        
                $ritem_row->image = $file_name_to_store;        
            } 
        }
        else{
            if(isset($ritem_row->image)){
                \Storage::delete('public/images/ritem_section/'.$ritem_row->image);
                $ritem_row->image = null;
            }
        }

        if($request->has("ritem_status")){
            $ritem_row->status = "PUBLISHED";                           
        }
        else{
            $ritem_row->status = "DRAFT";     
        }

        if($ritem_row->save()){
            return redirect()->back()->with('success', 'Your changes are saved in the resume section');
        }

        return redirect()->back()->with('error', 'Your data could not be saved in the resume section');      
    }
}
