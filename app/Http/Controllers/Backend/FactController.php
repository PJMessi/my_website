<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\FactSec;
use App\FitemSec;

class FactController extends Controller
{
    public function show_backend_fact(){
        $fact_sec_rows = FactSec::orderBy('created_at', 'desc')->get();
        return view("backend.fact")->with([
            "title" => "fact",
            "fact_rows" => $fact_sec_rows
        ]);
    }

    public function add_backend_fact(Request $request){
        \DB::beginTransaction();
        try{
            $fact_row = new FactSec();
            $fact_row_pub = FactSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
            if($request->has("fact_status")){
                $fact_row->status = "PUBLISHED";               
                $fact_row_pub->status = "DRAFT";
                $fact_row_pub->save();               
            }
            else{
                $fact_row->status = "DRAFT";
            }
            $fact_row->heading = $request->input('fact_heading');
            $fact_row->description = $request->input('fact_description');        

            if( $request->hasFile('fact_image') ){
                $file_name_with_ext = $request->file('fact_image')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('fact_image')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('fact_image')->storeAs('public/images/fact_section', $file_name_to_store);        
                $fact_row->image = $file_name_to_store;
            }
            $fact_row->save();
            \DB::commit();
            return redirect()->back()->with('success', 'Your data is saved in the fact section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the fact section');
        }
    }

    public function delete_backend_fact($id){
        $fact_row = FactSec::find($id);
        if($fact_row->status == 'DRAFT'){
            $fact_row->delete();
            if( isset($fact_row->image)){
                \Storage::delete('public/images/fact_section/'.$fact_row->image);
            }
            return redirect()->back()->with('success', 'The selected row is deleted');
        }
        else{
            return redirect()->back()->with('error', 'The row is currently published. Please select another row as published before deleting.');
        }
    }

    public function edit_backend_fact(Request $request, $id){
        \DB::beginTransaction();
        try{
            $fact_row = FactSec::find($id);
            $fact_row_pub = FactSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft

            $fact_row->heading = $request->input("fact_heading");
            $fact_row->description = $request->input("fact_description");
  
            if( $request->hasFile('fact_image') ){
                if( isset($fact_row->image)){
                    \Storage::delete('public/images/fact_section/'.$fact_row->image);
                }
                $file_name_with_ext = $request->file('fact_image')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('fact_image')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('fact_image')->storeAs('public/images/fact_section', $file_name_to_store);        
                $fact_row->image = $file_name_to_store;
            }
    
            if($request->has("fact_status") && $fact_row->status == 'DRAFT'){
                $fact_row->status = "PUBLISHED";                
                $fact_row_pub->status = "DRAFT";
                $fact_row_pub->save();            
            }
    
            $fact_row->save();
            \DB::commit();
            if(!$request->has("fact_status") && $fact_row->status == 'PUBLISHED'){
                return redirect()->back()->with('warning', 'To unpublish this row, please publish some other row first. The rest of your changes are saved.');
            }
            return redirect()->back()->with('success', 'Your changes are saved in the fact section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the fact section');
        }


        
    }

    public function show_backend_fitem(){
        $fitem_sec_rows = FitemSec::orderBy('created_at', 'desc')->get();
        return view("backend.fitem")->with([
            "title" => "fact_item",
            "fitem_rows" => $fitem_sec_rows
        ]);
    }

    public function add_backend_fitem(Request $request){
        $fitem_row = new FitemSec();            
        if($request->has("fitem_status")){
            $fitem_row->status = "PUBLISHED";                         
        }
        else{
            $fitem_row->status = "DRAFT";
        }
        $fitem_row->heading = $request->input('fitem_heading');
        $fitem_row->amount = $request->input('fitem_amount');

        if($fitem_row->save()){
            return redirect()->back()->with('success', 'Your data is saved in the fact section');
        }            
        return redirect()->back()->with('error', 'Your data could not be saved in the fact section'); 
    }

    public function delete_backend_fitem($id){
        $fitem_row = FitemSec::find($id);
        
        if($fitem_row->delete()){
            return redirect()->back()->with('success', 'The selected row is deleted');
        }  
        return redirect()->back()->with('error', 'The selected row could not be deleted');
    }

    public function edit_backend_fitem(Request $request, $id){        
        $fitem_row = FitemSec::find($id);    
        $fitem_row->heading = $request->input("fitem_heading");
        $fitem_row->amount = $request->input("fitem_amount");

        if($request->has("fitem_status")){
            $fitem_row->status = "PUBLISHED";                           
        }
        else{
            $fitem_row->status = "DRAFT";     
        }

        if($fitem_row->save()){
            return redirect()->back()->with('success', 'Your changes are saved in the fact section');
        }

        return redirect()->back()->with('error', 'Your data could not be saved in the fact section');      
    }
    
}
