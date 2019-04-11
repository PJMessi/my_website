<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Contact;

class ContactController extends Controller
{
    public function show_backend_contact(){
        $contact_info = Contact::orderBy('created_at', 'desc')->get();
        return view("backend.contact")->with([
            "title" => "contact",
            "contact_rows" => $contact_info
        ]);
    }

    public function add_backend_contact(Request $request){
        \DB::beginTransaction();
        try{
            $contact_row = new Contact();
            $contact_row_pub = Contact::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft
            if($request->has("contact_status")){
                $contact_row->status = "PUBLISHED";               
                $contact_row_pub->status = "DRAFT";
                $contact_row_pub->save();               
            }
            else{
                $contact_row->status = "DRAFT";
            }
            $contact_row->email = $request->input('contact_email');
            $contact_row->phone = $request->input('contact_phone');  
            $contact_row->address = $request->input('contact_address');    
            $contact_row->facebook = $request->input('contact_facebook');        
            $contact_row->linkedIn = $request->input('contact_linkedIn');        
            $contact_row->github = $request->input('contact_github');        
            $contact_row->twitter = $request->input('contact_twitter');        
            $contact_row->save();

            \DB::commit();
            return redirect()->back()->with('success', 'Your data is saved in the contact section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the contact section');
        }
    }

    public function delete_backend_contact($id){
        $contact_row = Contact::find($id);
        if($contact_row->status == 'DRAFT'){
            $contact_row->delete();            
            return redirect()->back()->with('success', 'The selected row is deleted');
        }
        else{
            return redirect()->back()->with('error', 'The row is currently published. Please select another row as published before deleting.');
        }
    }

    public function edit_backend_contact(Request $request, $id){
        \DB::beginTransaction();
        try{
            $contact_row = Contact::find($id);
            $contact_row_pub = Contact::where('status', 'PUBLISHED')->get()->first(); //to change status of other row to draft

            error_log("works1");
            error_log($contact_row_pub->id);
            error_log("works2");

            $contact_row->email = $request->input('contact_email');
            $contact_row->phone = $request->input('contact_phone');  
            $contact_row->address = $request->input('contact_address');    
            $contact_row->facebook = $request->input('contact_facebook');        
            $contact_row->linkedIn = $request->input('contact_linkedIn');        
            $contact_row->github = $request->input('contact_github');        
            $contact_row->twitter = $request->input('contact_twitter'); 

            if($request->has("contact_status") && $contact_row->status == 'DRAFT'){
                $contact_row->status = "PUBLISHED";                
                $contact_row_pub->status = "DRAFT";
                $contact_row_pub->save();            
            }
    
            $contact_row->save();
            \DB::commit();

            if(!$request->has("contact_status") && $contact_row->status == 'PUBLISHED'){
                return redirect()->back()->with('warning', 'To unpublish this row, please publish some other row first. The rest of your changes are saved.');
            }
            return redirect()->back()->with('success', 'Your changes are saved in the contact section');
        }
        catch(Exception $e){
            \DB::rollBack();
            return redirect()->back()->with('error', 'Your data could not be saved in the contact section');
        }


        
    }
}
