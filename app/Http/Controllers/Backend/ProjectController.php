<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\PitemSec;
use App\TitemSec;

class ProjectController extends Controller
{
    public function show_backend_pitem(){
        $pitem_sec_rows = PitemSec::orderBy('created_at', 'desc')->get();
        return view("backend.pitem")->with([
            "title" => "project",
            "pitem_rows" => $pitem_sec_rows
        ]);
    }

    public function add_backend_pitem(Request $request){
        $pitem_row = new PitemSec();            
        if($request->has("pitem_status")){
            $pitem_row->status = "PUBLISHED";                         
        }
        else{
            $pitem_row->status = "DRAFT";
        }

        $pitem_row->watermark = $request->input('pitem_watermark');
        $pitem_row->title = $request->input('pitem_title');
        $pitem_row->description = $request->input('pitem_description');
        $pitem_row->detail = $request->input('pitem_detail');
        $category_data = explode(",",$request->input('pitem_category'));
        $pitem_row->category = $category_data;
        $pitem_row->client = $request->input('pitem_client');
        $pitem_row->skill = $request->input('pitem_skill');
        $pitem_row->location = $request->input('pitem_location');

        $pitem_row->date = [$request->input('pitem_day'), $request->input('pitem_month'), $request->input('pitem_year')];

        
        if( $request->hasFile('pitem_images') ){
            $images_data = [];
            foreach($request->file('pitem_images') as $key=>$pitem_image){

                $file_name_with_ext = $pitem_image->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $pitem_image->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $pitem_image->storeAs('public/images/pitem_section', $file_name_to_store);        
                $images_data[$key] = $file_name_to_store;
            }   
            $pitem_row->images = $images_data;  

        }        


        if($pitem_row->save()){
            return redirect()->back()->with('success', 'Your data is saved in the project section');
        }            
        return redirect()->back()->with('error', 'Your data could not be saved in the project section'); 
    }

    public function delete_backend_pitem($id){
        \DB::beginTransaction();

        try{
            $pitem_row = PitemSec::find($id);
            $titem_row = TitemSec::where('project_id', $id)->get()->first();
            if(isset($titem_row))
                $titem_row->delete();  

            if(isset($pitem_row->images)){
                foreach($pitem_row->images as $image){                
                    \Storage::delete('public/images/pitem_section/'.$image);
                }
            }
            $pitem_row->delete();
            \DB::commit();
            return redirect()->back()->with('success', 'The selected row is deleted');
        }
        catch(Exception $ex){
            \DB::rollBack();
            return redirect()->back()->with('error', 'The selected row could not be deleted');
        }     
        
    }

    public function edit_backend_pitem(Request $request, $id){  
        \DB::beginTransaction();
        try{
            $pitem_row = PitemSec::find($id);    
            $pitem_row->watermark = $request->input('pitem_watermark');
            $pitem_row->title = $request->input('pitem_title');
            $pitem_row->description = $request->input('pitem_description');
            $pitem_row->detail = $request->input('pitem_detail');
            $category_data = explode(",",$request->input('pitem_category'));
            $pitem_row->category = $category_data;
            $pitem_row->client = $request->input('pitem_client');
            $pitem_row->skill = $request->input('pitem_skill');
            $pitem_row->location = $request->input('pitem_location');
    
            $pitem_row->date = [$request->input('pitem_day'), $request->input('pitem_month'), $request->input('pitem_year')];
    
            if( $request->hasFile('pitem_images') ){
                $images_data = [];
                foreach($request->file('pitem_images') as $key=>$pitem_image){
    
                    if(isset($pitem_row->images)){
                        foreach($pitem_row->images as $single_img){
                            \Storage::delete('public/images/pitem_section/'.$single_img);
                        }
                    }
    
                    $file_name_with_ext = $pitem_image->getClientOriginalName();
                    $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                    $extension = $pitem_image->getClientOriginalExtension();
                    $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                    $path = $pitem_image->storeAs('public/images/pitem_section', $file_name_to_store);        
                    $images_data[$key] = $file_name_to_store;
                }   
                $pitem_row->images = $images_data;  
    
            }
    
            if($request->has("pitem_status")){
                $pitem_row->status = "PUBLISHED";                           
            }
            else{
                $pitem_row->status = "DRAFT";     
            }
            
            $titem_row = TitemSec::where('project_id', $id)->get()->first();
            if(isset($titem_row)){
                $titem_row->status = $pitem_row->status;
                $titem_row->save();
            }

            $pitem_row->save();

            \DB::commit();
            return redirect()->back()->with('success', 'Your changes are saved in the project section');    
        }   
        catch(Exception $ex){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the project section');        
        }   

    }
}
