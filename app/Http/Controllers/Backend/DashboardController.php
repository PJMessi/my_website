<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Auth;

use App\User;

class DashboardController extends Controller
{
    public function show_backend_dashboard(){
        $users = User::all();
        return view("backend.dashboard")->with([
            "title" => "dashboard",
            "users" => $users,
        ]);
    }

    public function edit_user(Request $request){
        $user = Auth::user();

        if($request->input('name') == $user->name){
            $this->validate($request, [            
                'name' => 'required|string|max:255',
            ]);
        }

        if($request->input('username') != $user->username){
            $this->validate($request, [
                'username' => 'required|string|max:20|unique:users,username',
            ]);
        }

        if(!empty($request->input("password"))){
            $this->validate($request, [
                'password' => 'string|min:8|confirmed',
            ]);
            $user->password = Hash::make(  $request->input("password") );
        }

        $user->username = $request->input("username");
        $user->name = $request->input("name");

        $user->save();

        if( $request->hasFile("avatar") ){
            if($user->avatar != "default.jpg"){
                \Storage::delete('public/images/users/'.$user->avatar);
            }
            $file_name_with_ext = $request->file('avatar')->getClientOriginalName();
            $file_name = pathinfo($file_name_with_ext, PATHINFO_FILENAME);
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $file_name_to_store = $file_name.'_'.time().'.'.$extension;
            $path = $request->file('avatar')->storeAs('public/images/users', $file_name_to_store);        
            $user->avatar = $file_name_to_store;
        }
    
        if($user->save()){
            return redirect()->back()->with('success', 'Your profile is updated');
        }

        return redirect()->back()->with('error', 'There was some problem updating your profile.');      
    }

    public function delete_user($id){
        $user = User::find($id);

        if($user->avatar != "default.jpg"){
            \Storage::delete('public/images/users/'.$user->avatar);
        }
        
        if($user->delete()){
            return redirect()->back()->with('success', 'The selected user is deleted');
        }  
        return redirect()->back()->with('error', 'The selected user could not be deleted');
    }
}
