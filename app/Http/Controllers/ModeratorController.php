<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\Admin;
use App\Moderator;
use App\User;
use App\Login;
use App\Department;
use App\Course;
use App\CourseforStudent;
use App\Instructorforcourses;
use App\Announcement;


class ModeratorController extends Controller
{
    function index(){
        return view('Moderator.index');
    }
    function usermanagement(){
        $users = DB::table('users')->get();
        return view('Moderator.usermanagement')->with('users', $users);
        //return view('Moderator.usermanagement');
    }
    public function adduser(Request $request){
        $user = new User();
        $user->id           = $request->id;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->type         = $request->type;
        $user->save();

        $userlogin = new Login();
        $userlogin->id           = $request->id;
        $userlogin->name         = $request->name;
        $userlogin->email         = $request->email;
        $userlogin->password     = $request->password;
        $userlogin->type         = $request->type;
        $userlogin->save();

        return redirect()->route('Moderator.usermanagement');
    }
    public function updateuser($id, Request $request){
        $user = User::find($id);
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->save();

        $userlogin = Login::find($id);
        $userlogin->name     = $request->name;
        $userlogin->save();

        return redirect()->route('Moderator.usermanagement');
    }

    public function deleteuser($id, Request $request){
        if(User::destroy($id)){
            Login::destroy($id);
            return redirect()->route('Moderator.usermanagement');
        }
    }
    function useractivity(){
        return view('Moderator.useractivity');
    }
    function courseforstudent(){
        $crsforstdnt = DB::table('courseforstudents')->get();
        return view('Moderator.courseforstudent')->with('crsforstdnt', $crsforstdnt);
        //return view('Moderator.courseforstudent');
    }
    public function addcourseforstudent(Request $request){
        $user = new CourseforStudent();
        $user->id           = $request->id;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->cgpa         = $request->cgpa;
        $user->courseid     = $request->courseid;
        $user->coursename   = $request->coursename;
        $user->section      = $request->section;
        $user->save();

        return redirect()->route('Moderator.courseforstudent');
    }
    public function updatecourseforstudent($id, Request $request){
        $user = CourseforStudent::find($id);
        $user->section      = $request->section;
        $user->save();

        return redirect()->route('Moderator.courseforstudent');
    }
//instructorallocation
    public function deletecourseforstudent($id, Request $request){
        if(CourseforStudent::destroy($id)){
            return redirect()->route('Moderator.courseforstudent');
        }
    }
     public function addinstructor(Request $request){
        $user = new Instructorforcourses();
        $user->id           = $request->id;
        $user->name         = $request->name;
        $user->courseid     = $request->courseid;
        $user->coursename   = $request->coursename;
        $user->section      = $request->section;
        $user->save();

        return redirect()->route('Moderator.instructorallocation');
    }

    public function updateinstructor($id, Request $request){
        $user = Instructorforcourses::find($id);
        $user->courseid     = $request->courseid;
        $user->coursename   = $request->coursename;
        $user->section      = $request->section;
        $user->save();

        return redirect()->route('Moderator.instructorallocation');
    }

    public function deleteinstructor($id, Request $request){
        if(Instructorforcourses::destroy($id)){
            return redirect()->route('Moderator.instructorallocation');
        }
    }
    function discussionforum(){
        return view('forum');
    }
    function instructorallocation(){
        $instructor = DB::table('instructorforcourses')->get();
        return view('Moderator.instructorallocation')->with('instructor', $instructor);
        //return view('Moderator.instructorallocation');
    }
    function profilesettings(){
        return view('Moderator.profilesettings');
    }
    function saveprofilesettings(Request $request){
      $user = Admin::find($request->session()->get('id'));
      //$user->name         = Session::get('username');
      $user->email        = $request->email;
      //$user->address      = $request->address;
      //$user->phone         = $request->phone;
      $user->save();

      $userlogin = Login::find($request->session()->get('id'));
      $userlogin->email         = $request->email;
      $userlogin->save();

      $request->session()->put('email', $request->email);

      return redirect()->route('Moderator.myaccount');
    }

    function security(){
        return view('Moderator.security')->with(['password_does_not_match' => '', 'old_password_not_match' => '']);
        //return view('Moderator.security');
    }
    function savesecurity(Request $request){
      if($request->current_password == $request->session()->get('password')){
        if($request->new_password == $request->confirm_password){
          $userlogin = Login::find($request->session()->get('id'));
          $userlogin->password         = $request->confirm_password;
          $userlogin->save();

          return redirect()->route('Moderator.myaccount');
        }
        else{
          return view('Moderator.security')->with(['password_does_not_match' => 'password does not match', 'old_password_not_match' => '']);
        }
      }
      else{
        return view('Moderator.security')->with(['password_does_not_match' => '', 'old_password_not_match' => 'password does not match with old password']);
      }
    }
    function myaccount(){
        return view('Moderator.myaccount');
    }
    function myinbox(){
        return view('Moderator.myinbox');
    }
}
