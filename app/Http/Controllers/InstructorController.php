<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
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

class InstructorController extends Controller
{
    function index(){
        return view('Instructor.index');
    }
    function classes(Request $request){
      $courselist = DB::table('instructorforcourses')->where('id', $request->session()->get('id'))->get();
      return view('Instructor.classes')->with('courselist', $courselist);
    }
    function coursefile($coursename, $section){
      $courselist = DB::table('courseforstudents')->where('coursename', $coursename)->where('section', $section)->get();
      return view('Instructor.coursefile')->with(['courselist' => $courselist,
                                                    'coursename' => $coursename,
                                                    'section' => $section]);
    }
    function discussionforum(){
        return view('forum');
    }
    function coursegrades($coursename, $section){
      $courselist = DB::table('courseforstudents')->where('coursename', $coursename)->where('section', $section)->get();
      return view('Instructor.coursegrades')->with(['courselist' => $courselist,
                                                    'coursename' => $coursename,
                                                    'section' => $section]);
    }
    function grades(Request $request){
      $courselist = DB::table('instructorforcourses')->where('id', $request->session()->get('id'))->get();
      return view('Instructor.grades')->with('courselist', $courselist);
    }
    public function updatecourseforstudent($coursename, $section, $id,  Request $request){
      $user = CourseforStudent::find($id);
      $user->marks      = $request->marks;
      $user->grades      = $request->grades;
      $user->save();

      $courselist = DB::table('courseforstudents')->where('coursename', $coursename)->where('section', $section)->get();
      return redirect()->route('Instructor.coursegrades', ['coursename'=> $courselist[0]->coursename, 'section'=> $courselist[0]->section]);
    }
    function studentlist($coursename, $section){
      $courselist = DB::table('courseforstudents')->where('coursename', $coursename)->where('section', $section)->get();
      return view('Instructor.studentlist')->with(['courselist' => $courselist,
                                                    'coursename' => $coursename,
                                                    'section' => $section]);
    }
    function printstudentlist($coursename, $section){
      $courselist = DB::table('courseforstudents')->where('coursename', $coursename)->where('section', $section)->get();
      $pdf = PDF::loadView('Instructor.printstudentlist', ['courselist' => $courselist,
                                                    'coursename' => $coursename,
                                                    'section' => $section]);
      return $pdf->download('student list.pdf');
    }

    function profilesettings(){
        return view('Instructor.profilesettings');
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

      return redirect()->route('Instructor.myaccount');
    }

    function security(){
        return view('Instructor.security')->with(['password_does_not_match' => '', 'old_password_not_match' => '']);
    }
    function savesecurity(Request $request){
      if($request->current_password == $request->session()->get('password')){
        if($request->new_password == $request->confirm_password){
          $userlogin = Login::find($request->session()->get('id'));
          $userlogin->password         = $request->confirm_password;
          $userlogin->save();

          return redirect()->route('Instructor.myaccount');
        }
        else{
          return view('Instructor.security')->with(['password_does_not_match' => 'password does not match', 'old_password_not_match' => '']);
        }
      }
      else{
        return view('Instructor.security')->with(['password_does_not_match' => '', 'old_password_not_match' => 'password does not match with old password']);
      }
    }
    function myaccount(){
        return view('Instructor.myaccount');
    }
    function myinbox(){
        return view('Instructor.myinbox');
    }
}
