<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MainSec;

class MainController extends Controller
{
    public function show_backend_main(){
        $main_sec_rows = MainSec::orderBy('created_at', 'desc')->get();
        return view("backend.main")->with([
            "title" => "main",
            "main_rows" => $main_sec_rows,
        ]);
    }

    public function add_backend_main(Request $request){
        \DB::beginTransaction();
        try{
            $main_row = new MainSec();
            $main_row_pub = MainSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
            if($request->has("main_status")){
                $main_row->status = "PUBLISHED";           
                $main_row_pub->status = "DRAFT";
                $main_row_pub->save();
               
            }
            else{
                $main_row->status = "DRAFT";
            }
            $main_row->heading_1 = $request->input('main_heading_1');
            $main_row->heading_2 = $request->input('main_heading_2');
            $main_row->button = [$request->input('main_button_link'), $request->input('main_button_txt')];
            if( $request->hasFile('main_image') ){
                $file_name_with_ext = $request->file('main_image')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('main_image')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('main_image')->storeAs('public/images/main_section', $file_name_to_store);        
                $main_row->image = $file_name_to_store;
            }
            $main_row->save();
            \DB::commit();
            return redirect()->back()->with('success', 'Your data is saved in the main section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the main section');
        }

    }

    public function delete_backend_main($id){
        $main_row = MainSec::find($id);
        if($main_row->status == 'DRAFT'){
            $main_row->delete();
            if( isset($main_row->image)){
                \Storage::delete('public/images/main_section/'.$main_row->image);
            }
            return redirect()->back()->with('success', 'The selected row is deleted');
        }
        else{
            return redirect()->back()->with('error', 'The row is currently published. Please select another row as published before deleting.');
        }
    }

    public function edit_backend_main(Request $request, $id){
        \DB::beginTransaction();
        try{
            $main_row = MainSec::find($id);
            $main_row_pub = MainSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
    
            $main_row->heading_1 = $request->input("main_heading_1");
            $main_row->heading_2 = $request->input("main_heading_2");
            $main_row->button = [$request->input('main_button_link'), $request->input('main_button_txt')];
            if( $request->hasFile('main_image') ){
                if( isset($main_row->image)){
                    \Storage::delete('public/images/main_section/'.$main_row->image);
                }
                $file_name_with_ext = $request->file('main_image')->getClientOriginalName();
                $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
                $extension = $request->file('main_image')->getClientOriginalExtension();
                $file_name_to_store = $file_name.'_'.time().'.'.$extension;
                $path = $request->file('main_image')->storeAs('public/images/main_section', $file_name_to_store);        
                $main_row->image = $file_name_to_store;
            }
    
            if($request->has("main_status") && $main_row->status == 'DRAFT'){
                $main_row->status = "PUBLISHED";                
                $main_row_pub->status = "DRAFT";
                $main_row_pub->save();            
            }
    
            $main_row->save();
            \DB::commit();
            if(!$request->has("main_status") && $main_row->status == 'PUBLISHED'){
                return redirect()->back()->with('warning', 'To unpublish this row, please publish some other row first. The rest of your changes are saved.');
            }
            return redirect()->back()->with('success', 'Your changes are saved in the main section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the main section');
        }


        
    }
    
}
