<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TestmonialSec;
use App\TitemSec;

class TestmonialController extends Controller
{
    public function show_backend_testmonial(){
        $testmonial_sec_rows = TestmonialSec::orderBy('created_at', 'desc')->get();
        return view("backend.testmonial")->with([
            "title" => "testmonial",
            "testmonial_rows" => $testmonial_sec_rows
        ]);
    }

    public function add_backend_testmonial(Request $request){
        \DB::beginTransaction();
        try{
            $testmonial_row = new TestmonialSec();
            $testmonial_row_pub = TestmonialSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
            if($request->has("testmonial_status")){
                $testmonial_row->status = "PUBLISHED";           
                $testmonial_row_pub->status = "DRAFT";
                $testmonial_row_pub->save();               
            }
            else{
                $testmonial_row->status = "DRAFT";
            }
            $testmonial_row->watermark = $request->input('testmonial_watermark');
            $testmonial_row->heading_1 = $request->input('testmonial_heading_1');
            $testmonial_row->heading_2 = $request->input('testmonial_heading_2');
            $testmonial_row->description = $request->input('testmonial_description');      
            $testmonial_row->save();

            \DB::commit();
            return redirect()->back()->with('success', 'Your data is saved in the testmonial section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the testmonial section');
        }

    }

    public function delete_backend_testmonial($id){
        $testmonial_row = TestmonialSec::find($id);
        if($testmonial_row->status == 'DRAFT'){
            $testmonial_row->delete();            
            return redirect()->back()->with('success', 'The selected row is deleted');
        }
        else{
            return redirect()->back()->with('error', 'The row is currently published. Please select another row as published before deleting.');
        }
    }

    public function edit_backend_testmonial(Request $request, $id){
        \DB::beginTransaction();
        try{
            $testmonial_row = TestmonialSec::find($id);
            $testmonial_row_pub = TestmonialSec::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
    
            $testmonial_row->watermark = $request->input("testmonial_watermark");
            $testmonial_row->heading_1 = $request->input("testmonial_heading_1");
            $testmonial_row->heading_2 = $request->input("testmonial_heading_2");
            $testmonial_row->description = $request->input("testmonial_description");  
    
            if($request->has("testmonial_status") && $testmonial_row->status == 'DRAFT'){
                $testmonial_row->status = "PUBLISHED";                
                $testmonial_row_pub->status = "DRAFT";
                $testmonial_row_pub->save();            
            }
    
            $testmonial_row->save();
            \DB::commit();
            if(!$request->has("testmonial_status") && $testmonial_row->status == 'PUBLISHED'){
                return redirect()->back()->with('warning', 'To unpublish this row, please publish some other row first. The rest of your changes are saved.');
            }
            return redirect()->back()->with('success', 'Your changes are saved in the testmonial section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the testmonial section');
        }        
    }

    public function show_backend_titem(){
        $titem_sec_rows = TitemSec::orderBy('created_at', 'desc')->get();
        return view("backend.titem")->with([
            "title" => "testmonial_item",
            "titem_rows" => $titem_sec_rows,
        ]);
    }

    public function delete_backend_titem($id){
        $titem_row = TitemSec::find($id);        
        if($titem_row->delete()){
            return redirect()->back()->with('success', 'The selected row is deleted');
        }  
        return redirect()->back()->with('error', 'The selected row could not be deleted');
    }

    public function edit_backend_titem(Request $request, $id){
        $titem_row = TitemSec::find($id);    
        $message = ["success", "Your changes are saved in the testmonial section"];
        if($request->has("titem_status")){
            if($titem_row->portfolio->status == "PUBLISHED"){
                $titem_row->status = "PUBLISHED";                           
            }
            else{
                $message = ["error", "This testmonial can't be published because, its corresponding portfolio is not published. Publish that portfolio to publish this testmonial."];
            }
        }
        else{
            $titem_row->status = "DRAFT";     
        }

        if($titem_row->save()){
            return redirect()->back()->with($message[0], $message[1]);
        }

        return redirect()->back()->with('error', 'Your data could not be saved in the testmonial section'); 
    }
}
