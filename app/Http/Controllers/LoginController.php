<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
  function index(){
    return view('login.index');
  }

  function verify(Request $request){
      $data = DB::table('logins')
                  ->where('name', $request->userid)
                  ->where('password', $request->password)
                  ->get();
    if(count($data) > 0 ){
          $request->session()->put('id', $data[0]->id);
          $request->session()->put('username', $data[0]->name);
          $request->session()->put('email', $data[0]->email);
          $request->session()->put('password', $data[0]->password);
          $request->session()->put('type', $data[0]->type);

          if($data[0]->type == "superadmin"){
              return redirect('/superadmin');
          }
          elseif($data[0]->type == "admin"){
              return redirect('/admin');
          }
          elseif($data[0]->type == "moderator"){
              return redirect('/moderator');
          }
          elseif($data[0]->type == "instructor"){
              return redirect('/instructor');
          }
          elseif($data[0]->type == "student"){
              return redirect('/student');
          }
          else{
          $request->session()->flash('msg', 'invalid username/password');
          return redirect('/login');
          }
        }
      }
}
