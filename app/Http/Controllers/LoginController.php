<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
  function index(Request $request){
    $request->session()->flush('key');
    return view('login.index');
  }

  function verify(Request $request){
    $data = DB::table('logins')
                  ->where('name', $request->userid)
                  ->where('password', $request->password)
                  ->get();

    if(count($data) > 0 ){
          $profile = DB::table('profiles')
                  ->where('id', $data[0]->id)
                  ->get();
          if(count($profile) > 0){
            $request->session()->put('picture', $profile[0]->avata);
          }
          else{
            $request->session()->put('picture',"");
          }
          $request->session()->put('id', $data[0]->id);
          $request->session()->put('username', $data[0]->name);
          $request->session()->put('email', $data[0]->email);
          $request->session()->put('password', $data[0]->password);
          $request->session()->put('type', $data[0]->type);

          if($data[0]->type == "superadmin"){
              return redirect()->route('Superadmin.index');
          }
          elseif($data[0]->type == "admin"){
              return redirect()->route('Admin.index');
          }
          elseif($data[0]->type == "moderator"){
              return redirect()->route('Moderator.index');
          }
          elseif($data[0]->type == "instructor"){
              return redirect()->route('Instructor.index');
          }
          elseif($data[0]->type == "student"){
              return redirect()->route('Student.index');
          }
        }
    else{
      $request->session()->flash('msg', 'invalid username/password');
      return view('login.index');
        }
      }
}
