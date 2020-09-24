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
use App\Note;
use App\Video;
use App\Assignment;

class StudentController extends Controller
{
    function index(){
        return view('Student.index');
    }
    function consultation(Request $request){
      $courselist = DB::table('courseforstudents')->where('id', $request->session()->get('id'))->get();
      $instructor = DB::table('instructorforcourses')->where('coursename', $courselist[0]->coursename)->get();
      return view('Student.consultation')->with(['courselist' => $courselist, 'instructor' => $instructor]);
    }
    function coursefile(Request $request,$coursename,$section){
      $faculty = DB::table('instructorforcourses')->where('coursename', $coursename)
                                                  ->where('section', $section)->pluck('name');
      $notelist = DB::table('notes')->where('coursename', $coursename)
                                    ->where('section', $section)->get();
      $videolist = DB::table('videos')->where('coursename', $coursename)
                                      ->where('section', $section)->get();
      $assignmentlist = DB::table('assignments')->where('coursename', $coursename)
                                                ->where('section', $section)->get();
      return view('Student.coursefile')->with(['coursename' => $coursename,
                                               'section' => $section])
                                        ->with('notelist', $notelist)
                                        ->with('videolist', $videolist)
                                        ->with('assignmentlist', $assignmentlist)
                                        ->with('faculty',$faculty);
    }

    function mycourse(Request $request){
      $courselist = DB::table('courseforstudents')->where('id', $request->session()->get('id'))->get();
      return view('Student.mycourse')->with('courselist', $courselist);
    }
    function discussionforum(){
        return view('forum');
    }
    function mygrades(Request $request){
      $courselist = DB::table('courseforstudents')->where('id', $request->session()->get('id'))->get();
        return view('Student.mygrades')->with('courselist', $courselist);
    }
    function profilesettings(){
        return view('Student.profilesettings');
    }
    function saveprofilesettings(Request $request){
      $user = User::find($request->session()->get('id'));
      //$user->name         = Session::get('username');
      $user->email        = $request->email;
      //$user->address      = $request->address;
      //$user->phone         = $request->phone;
      $user->save();

      $userlogin = Login::find($request->session()->get('id'));
      $userlogin->email         = $request->email;
      $userlogin->save();

      $request->session()->put('email', $request->email);

      return redirect()->route('Student.myaccount');
    }
    function security(){
        return view('Student.security')->with(['password_does_not_match' => '', 'old_password_not_match' => '']);
    }
    function savesecurity(Request $request){
      if($request->current_password == $request->session()->get('password')){
        if($request->new_password == $request->confirm_password){
          $userlogin = Login::find($request->session()->get('id'));
          $userlogin->password         = $request->confirm_password;
          $userlogin->save();

          return redirect()->route('Student.myaccount');
        }
        else{
          return view('Student.security')->with(['password_does_not_match' => 'password does not match', 'old_password_not_match' => '']);
        }
      }
      else{
        return view('Student.security')->with(['password_does_not_match' => '', 'old_password_not_match' => 'password does not match with old password']);
      }
    }
    function myaccount(){
        return view('Student.myaccount');
    }
    function myinbox(){
        return view('Student.myinbox');
    }
}
