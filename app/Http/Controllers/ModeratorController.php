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
use App\profiles;
use Image;


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
      $request->validate([
        'id' => 'required',
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'type' => 'required',
        'department' => 'required',
        'password' => 'required'
      ]);
        $user = new User();
        $user->id           = $request->id;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->type         = $request->type;
        $user->department        = $request->department;
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
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'department' => 'required'
      ]);
        $user = User::find($id);
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->department        = $request->department;
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
        $stdnts = DB::table('users')->where('type', 'student')->select('id','name','email')->get();
        $courses = DB::table('courses')->select('id','name')->get();
        return view('Moderator.courseforstudent')->with('crsforstdnt', $crsforstdnt)
                                                  ->with('stdnts', $stdnts)
                                                  ->with('courses', $courses);
    }
    public function addcourseforstudent(Request $request){
      $request->validate([
        'id' => 'required',
        'name' => 'required',
        'email' => 'required',
        'cgpa' => 'required',
        'coursename' => 'required',
        'section' => 'required'
      ]);
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
      $request->validate([
        'section' => 'required'
      ]);
      $user = CourseforStudent::find($id);
      $user->section      = $request->section;
      $user->save();

      return redirect()->route('Moderator.courseforstudent');
    }
    public function deletecourseforstudent($id, Request $request){
        if(CourseforStudent::destroy($id)){
            return redirect()->route('Moderator.courseforstudent');
        }
    }
    function printcourseforstudent(){
      $crsforstdnt = DB::table('courseforstudents')->get();
      $stdnts = DB::table('users')->where('type', 'student')->select('id','name','email')->get();
      $courses = DB::table('courses')->select('id','name')->get();
      $pdf = PDF::loadView('moderator.printcourseforstudent', ['crsforstdnt' => $crsforstdnt,
                                                  'stdnts' => $stdnts,
                                                  'courses' => $courses]);

      return $pdf->download('student course allocation list.pdf');
    }

     public function addinstructor(Request $request){
       $request->validate([
         'id' => 'required',
         'name' => 'required',
         'courseid' => 'required',
         'coursename' => 'required',
         'section' => 'required'
       ]);
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
      $request->validate([
        'courseid' => 'required',
        'coursename' => 'required',
        'section' => 'required'
      ]);
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
        $faculty = DB::table('users')->where('type', 'instructor')->select('id','name')->get();
        $courses = DB::table('courses')->select('id','name')->get();
        return view('Moderator.instructorallocation')->with('instructor', $instructor)
                                                  ->with('faculty', $faculty)
                                                  ->with('courses', $courses);
    }
    function printinstructorallocation(){
      $instructor = DB::table('instructorforcourses')->get();
      $faculty = DB::table('users')->where('type', 'instructor')->select('id','name')->get();
      $courses = DB::table('courses')->select('id','name')->get();
      $pdf = PDF::loadView('Moderator.printinstructorallocation', ['instructor' => $instructor,
                                                                'faculty' => $faculty,
                                                                'courses' => $courses]);

      return $pdf->download('instructor allocation list.pdf');
    }
    function profilesettings(){
        return view('Moderator.profilesettings');
    }
    function saveprofilesettings(Request $request){
      $user = Admin::find($request->session()->get('id'));
      $request->validate([
        'email' => 'required'
      ]);
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

    public function store(Request $request)
    {
       $request->validate([
        'avata' => 'required'
      ]); 
        $profiles = new profiles;
        $profiles->id = $request->session()->get('id');
 
        if ( $request->avata )
        {
            $image = $request->file('avata');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('upload/img/' . $img);
            Image::make($image)->save($location);
            $profiles->avata = $img; 
            
        }
        $profiles->save();
        
        return redirect()->route('Moderator.index');
    }

}
