<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Miscellaneous;

class MiscellaneousController extends Controller
{
    public function show_backend_miscellaneous(){
        $miscellaneous_sec_rows = Miscellaneous::orderBy('created_at', 'desc')->get();
        return view("backend.miscellaneous")->with([
            "title" => "miscellaneous",
            "miscellaneous_rows" => $miscellaneous_sec_rows
        ]);
    }

    public function add_backend_miscellaneous(Request $request){
        \DB::beginTransaction();
        try{
            $miscellaneous_row = new Miscellaneous();
            $miscellaneous_row_pub = Miscellaneous::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
            if($request->has("miscellaneous_status")){
                $miscellaneous_row->status = "PUBLISHED";               
                $miscellaneous_row_pub->status = "DRAFT";
                $miscellaneous_row_pub->save();               
            }
            else{
                $miscellaneous_row->status = "DRAFT";
            }

            $miscellaneous_row->title = $request->input('miscellaneous_title');
            $miscellaneous_row->footer = $request->input('miscellaneous_footer');
            $miscellaneous_row->trButton = [$request->input('miscellaneous_trButton_text'), $request->input('miscellaneous_trButton_title')];   

            if( $request->hasFile('miscellaneous_logo') ){
                $file_name_with_ext = $request->file('miscellaneous_logo')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('miscellaneous_logo')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('miscellaneous_logo')->storeAs('public/images/', $file_name_to_store);        
                $miscellaneous_row->logo = $file_name_to_store;
            }

            if( $request->hasFile('miscellaneous_txt_logo') ){
                $file_name_with_ext = $request->file('miscellaneous_txt_logo')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('miscellaneous_txt_logo')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('miscellaneous_txt_logo')->storeAs('public/images/', $file_name_to_store);        
                $miscellaneous_row->txt_logo = $file_name_to_store;
            }

            if( $request->hasFile('miscellaneous_favicon') ){
                $file_name_with_ext = $request->file('miscellaneous_favicon')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('miscellaneous_favicon')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('miscellaneous_favicon')->storeAs('public/images/', $file_name_to_store);        
                $miscellaneous_row->favicon = $file_name_to_store;
            }

            $miscellaneous_row->save();
            \DB::commit();
            return redirect()->back()->with('success', 'Your data is saved in the miscellaneous section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the miscellaneous section');
        }
    }

    public function delete_backend_miscellaneous($id){
        $miscellaneous_row = Miscellaneous::find($id);
        if($miscellaneous_row->status == 'DRAFT'){

            $miscellaneous_row->delete();

            if( isset($miscellaneous_row->logo)){
                \Storage::delete('public/images/'.$miscellaneous_row->logo);
            }

            if( isset($miscellaneous_row->txt_logo)){
                \Storage::delete('public/images/'.$miscellaneous_row->txt_logo);
            }

            if( isset($miscellaneous_row->favicon)){
                \Storage::delete('public/images/'.$miscellaneous_row->favicon);
            }

            return redirect()->back()->with('success', 'The selected row is deleted');
        }
        else{
            return redirect()->back()->with('error', 'The row is currently published. Please select another row as published before deleting.');
        }
    }

    public function edit_backend_miscellaneous(Request $request, $id){
        \DB::beginTransaction();
        try{
            $miscellaneous_row = Miscellaneous::find($id);
            $miscellaneous_row_pub = Miscellaneous::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft

            $miscellaneous_row->title = $request->input('miscellaneous_title');
            $miscellaneous_row->footer = $request->input('miscellaneous_footer');
            $miscellaneous_row->trButton = [$request->input('miscellaneous_trButton_text'), $request->input('miscellaneous_trButton_title')];   
  
            if( $request->hasFile('miscellaneous_logo') ){
                if( isset($miscellaneous_row->logo)){
                    \Storage::delete('public/images/'.$miscellaneous_row->logo);
                }
                $file_name_with_ext = $request->file('miscellaneous_logo')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('miscellaneous_logo')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('miscellaneous_logo')->storeAs('public/images/', $file_name_to_store);        
                $miscellaneous_row->logo = $file_name_to_store;
            }

            if( $request->hasFile('miscellaneous_txt_logo') ){
                if( isset($miscellaneous_row->logo)){
                    \Storage::delete('public/images/'.$miscellaneous_row->txt_logo);
                }
                $file_name_with_ext = $request->file('miscellaneous_txt_logo')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('miscellaneous_txt_logo')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('miscellaneous_txt_logo')->storeAs('public/images/', $file_name_to_store);        
                $miscellaneous_row->logo = $file_name_to_store;
            }

            if( $request->hasFile('miscellaneous_favicon') ){
                if( isset($miscellaneous_row->logo)){
                    \Storage::delete('public/images/'.$miscellaneous_row->favicon);
                }
                $file_name_with_ext = $request->file('miscellaneous_favicon')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('miscellaneous_favicon')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('miscellaneous_favicon')->storeAs('public/images/', $file_name_to_store);        
                $miscellaneous_row->logo = $file_name_to_store;
            }

    
            if($request->has("miscellaneous_status") && $miscellaneous_row->status == 'DRAFT'){
                $miscellaneous_row->status = "PUBLISHED";                
                $miscellaneous_row_pub->status = "DRAFT";
                $miscellaneous_row_pub->save();            
            }
    
            $miscellaneous_row->save();
            \DB::commit();
            if(!$request->has("miscellaneous_status") && $miscellaneous_row->status == 'PUBLISHED'){
                return redirect()->back()->with('warning', 'To unpublish this row, please publish some other row first. The rest of your changes are saved.');
            }
            return redirect()->back()->with('success', 'Your changes are saved in the miscellaneous section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the miscellaneous section');
        }


        
    }
}
