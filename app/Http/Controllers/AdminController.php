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

class AdminController extends Controller
{
    function index(){
        return view('Admin.index');
    }

    function moderatormanagement(){
      $users = DB::table('moderators')->get();
      return view('Admin.moderatormanagement')->with('users', $users);
    }
    public function addmoderator(Request $request){
        $user = new Moderator();
        $user->id           = $request->id;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->address      = $request->address;
        $user->phone        = $request->phone;
        $user->save();

        $userlogin = new Login();
        $userlogin->id           = $request->id;
        $userlogin->name         = $request->name;
        $userlogin->email         = $request->email;
        $userlogin->password     = $request->password;
        $userlogin->type         = "moderator";
        $userlogin->save();

        return redirect()->route('Admin.moderatormanagement');
    }
    public function updatemoderator($id, Request $request){
        $user = Moderator::find($id);
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->address      = $request->address;
        $user->phone         = $request->phone;
        $user->save();

        $userlogin = Login::find($id);
        $userlogin->name      = $request->name;
        $userlogin->save();

        return redirect()->route('Admin.moderatormanagement');
    }
    public function deletemoderator($id, Request $request){
        if(Moderator::destroy($id)){
            Login::destroy($id);
            return redirect()->route('Admin.moderatormanagement');
        }
    }
    public function searchmoderator(Request $request){
        $users = Moderator::where('id','like','%'.$request->get('search').'%')
                      ->orWhere('name','like','%'.$request->get('search').'%')
                      ->get();

        return json_encode($users);
    }

    function usermanagement(){
      $users = DB::table('users')->get();
      return view('Admin.usermanagement')->with('users', $users);
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

        return redirect()->route('Admin.usermanagement');
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

        return redirect()->route('Admin.usermanagement');
    }
    public function deleteuser($id, Request $request){
        if(User::destroy($id)){
            Login::destroy($id);
            return redirect()->route('Admin.usermanagement');
        }
    }

    function coursemanagement(){
        $course = DB::table('courses')->get();
        return view('Admin.coursemanagement')->with('course', $course);
    }
    public function addcourse(Request $request){
        $user = new Course();
        $user->id           = $request->id;
        $user->name         = $request->name;
        $user->department   = $request->department;
        $user->save();

        return redirect()->route('Admin.coursemanagement');
    }
    public function updatecourse($id, Request $request){
        $user = Course::find($id);
        $user->name         = $request->name;
        $user->department   = $request->department;
        $user->save();

        return redirect()->route('Admin.coursemanagement');
    }
    public function deletecourse($id, Request $request){
        if(Course::destroy($id)){
            return redirect()->route('Admin.coursemanagement');
        }
    }
    public function coursePdf(){
        $course = DB::table('courses')->get();
        $pdf = PDF::loadView('Admin.coursemanagement', compact('course'));
        return $pdf->download('courses-list.pdf');
    }

    function courseforstudent(){
        $crsforstdnt = DB::table('courseforstudents')->get();
        return view('Admin.courseforstudent')->with('crsforstdnt', $crsforstdnt);
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

        return redirect()->route('Admin.courseforstudent');
    }

    public function updatecourseforstudent($id, Request $request){
        $user = CourseforStudent::find($id);
        $user->section      = $request->section;
        $user->save();

        return redirect()->route('Admin.courseforstudent');
    }

    public function deletecourseforstudent($id, Request $request){
        if(CourseforStudent::destroy($id)){
            return redirect()->route('Admin.courseforstudent');
        }
    }
    function instructorallocation(){
        $instructor = DB::table('instructorforcourses')->get();
        return view('Admin.instructorallocation')->with('instructor', $instructor);
    }

    public function addinstructor(Request $request){
        $user = new Instructorforcourses();
        $user->id           = $request->id;
        $user->name         = $request->name;
        $user->courseid     = $request->courseid;
        $user->coursename   = $request->coursename;
        $user->section      = $request->section;
        $user->save();

        return redirect()->route('Admin.instructorallocation');
    }

    public function updateinstructor($id, Request $request){
        $user = Instructorforcourses::find($id);
        $user->courseid     = $request->courseid;
        $user->coursename   = $request->coursename;
        $user->section      = $request->section;
        $user->save();

        return redirect()->route('Admin.instructorallocation');
    }

    public function deleteinstructor($id, Request $request){
        if(Instructorforcourses::destroy($id)){
            return redirect()->route('Admin.instructorallocation');
        }
    }

    function announcements(){
      $notice = DB::table('announcements')->get();
      return view('Admin.announcements')->with('notice', $notice);
    }
    public function addannouncement(Request $request){
        $user = new Announcement();
        $user->title        = $request->title;
        $user->details      = $request->details;

        $user->save();

        return redirect()->route('Admin.announcements');
    }

    function profilesettings(){
        return view('Admin.profilesettings');
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

      return redirect()->route('Admin.myaccount');
    }

    function security(){
      return view('Admin.security')->with(['password_does_not_match' => '', 'old_password_not_match' => '']);
    }
    function savesecurity(Request $request){
      if($request->current_password == $request->session()->get('password')){
        if($request->new_password == $request->confirm_password){
          $userlogin = Login::find($request->session()->get('id'));
          $userlogin->password         = $request->confirm_password;
          $userlogin->save();

          return redirect()->route('Admin.myaccount');
        }
        else{
          return view('Admin.security')->with(['password_does_not_match' => 'password does not match', 'old_password_not_match' => '']);
        }
      }
      else{
        return view('Admin.security')->with(['password_does_not_match' => '', 'old_password_not_match' => 'password does not match with old password']);
      }
    }

    function myaccount(){
        return view('Admin.myaccount');
    }

    function myinbox(){
        return view('Admin.myinbox');
    }
}
