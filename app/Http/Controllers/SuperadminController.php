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


class SuperadminController extends Controller
{
    public function index(){
        return view('Superadmin.index');
    }
    

    //adminmanagement
    public function adminmanagement(){
        $users = DB::table('admins')->get();
        return view('Superadmin.adminmanagement')->with('users', $users);
    }

    public function addadmin(Request $request){
        $user = new Admin();
        $user->id           = $request->id;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->address      = $request->address;
        $user->phone         = $request->phone;
        $user->save();

        $userlogin = new Login();
        $userlogin->id           = $request->id;
        $userlogin->name         = $request->name;
        $userlogin->password     = $request->password;
        $userlogin->type         = "admin";
        $userlogin->save();

        return redirect()->route('Superadmin.adminmanagement');
    }

    public function updateadmin($id, Request $request){
        $user = Admin::find($id);
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->address      = $request->address;
        $user->phone         = $request->phone;
        $user->save();
        
        $userlogin = Login::find($id);
        $userlogin->name         = $request->name;
        $userlogin->save();

        return redirect()->route('Superadmin.adminmanagement');
    }

    public function deleteadmin($id, Request $request){
        if(Admin::destroy($id)){
            Login::destroy($id);
            return redirect()->route('Superadmin.adminmanagement');
        }
    }

    public function searchadmin(Request $request){
        $users = Admin::where('id','like','%'.$request->get('search').'%')
                      ->orWhere('name','like','%'.$request->get('search').'%')
                      ->get();

        return json_encode($users);
    }


    //moderatormanagement
    function moderatormanagement(){
        $users = DB::table('moderators')->get();
        return view('Superadmin.moderatormanagement')->with('users', $users);
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
        $userlogin->password     = $request->password;
        $userlogin->type         = "moderator";
        $userlogin->save();

        return redirect()->route('Superadmin.moderatormanagement');
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
  
        return redirect()->route('Superadmin.moderatormanagement');
    }

    public function deletemoderator($id, Request $request){
        if(Moderator::destroy($id)){
            Login::destroy($id);
            return redirect()->route('Superadmin.moderatormanagement');
        }
    }

    public function searchmoderator(Request $request){
        $users = Moderator::where('id','like','%'.$request->get('search').'%')
                      ->orWhere('name','like','%'.$request->get('search').'%')
                      ->get();

        return json_encode($users);
    }

    //usermanagement
    function usermanagement(){
        $users = DB::table('users')->get();
        return view('Superadmin.usermanagement')->with('users', $users);
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
        $userlogin->password     = $request->password;
        $userlogin->type         = $request->type;
        $userlogin->save();

        return redirect()->route('Superadmin.usermanagement');
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
  
        return redirect()->route('Superadmin.usermanagement');
    }

    public function deleteuser($id, Request $request){
        if(User::destroy($id)){
            Login::destroy($id);
            return redirect()->route('Superadmin.usermanagement');
        }
    }


    //departmentmanagement
    function departmentmanagement(){
        $depts = DB::table('departments')->get();
        return view('Superadmin.departmentmanagement')->with('depts', $depts);
    }

    public function adddept(Request $request){
        $user = new Department();
        $user->id           = $request->id;
        $user->name         = $request->name;
        $user->tag        = $request->tag;
        $user->save();

        return redirect()->route('Superadmin.departmentmanagement');
    }

    public function updatedept($id, Request $request){
        $user = Department::find($id);
        $user->name         = $request->name;
        $user->tag        = $request->tag;
        $user->save();
  
        return redirect()->route('Superadmin.departmentmanagement');
    }

    public function deletedept($id, Request $request){
        if(Department::destroy($id)){
            return redirect()->route('Superadmin.departmentmanagement');
        }
    }

    public function departmentPdf(){
        $depts = DB::table('departments')->get();
        $pdf = PDF::loadView('Superadmin.departmentmanagement', compact('depts'));
        return $pdf->download('department_list.pdf');
    }

    //coursemanagement
    function coursemanagement(){
        $course = DB::table('courses')->get();
        return view('Superadmin.coursemanagement')->with('course', $course);
    }

    public function addcourse(Request $request){
        $user = new Course();
        $user->id           = $request->id;
        $user->name         = $request->name;
        $user->department   = $request->department;
        $user->save();

        return redirect()->route('Superadmin.coursemanagement');
    }

    public function updatecourse($id, Request $request){
        $user = Course::find($id);
        $user->name         = $request->name;
        $user->department   = $request->department;
        $user->save();
  
        return redirect()->route('Superadmin.coursemanagement');
    }

    public function deletecourse($id, Request $request){
        if(Course::destroy($id)){
            return redirect()->route('Superadmin.coursemanagement');
        }
    }

    public function coursePdf(){
        $course = DB::table('courses')->get();
        $pdf = PDF::loadView('Superadmin.coursemanagement', compact('course'));
        return $pdf->download('courses-list.pdf');
    }

    //courseforstudent
    function courseforstudent(){
        $crsforstdnt = DB::table('courseforstudents')->get();
        return view('Superadmin.courseforstudent')->with('crsforstdnt', $crsforstdnt);
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

        return redirect()->route('Superadmin.courseforstudent');
    }

    public function updatecourseforstudent($id, Request $request){
        $user = CourseforStudent::find($id);
        $user->section      = $request->section;
        $user->save();
  
        return redirect()->route('Superadmin.courseforstudent');
    }

    public function deletecourseforstudent($id, Request $request){
        if(CourseforStudent::destroy($id)){
            return redirect()->route('Superadmin.courseforstudent');
        }
    }


    //instructorallocation
    function instructorallocation(){
        $instructor = DB::table('instructorforcourses')->get();
        return view('Superadmin.instructorallocation')->with('instructor', $instructor);
    }

    public function addinstructor(Request $request){
        $user = new Instructorforcourses();
        $user->id           = $request->id;
        $user->name         = $request->name;
        $user->courseid     = $request->courseid;
        $user->coursename   = $request->coursename;
        $user->section      = $request->section;
        $user->save();

        return redirect()->route('Superadmin.instructorallocation');
    }

    public function updateinstructor($id, Request $request){
        $user = Instructorforcourses::find($id);
        $user->courseid     = $request->courseid;
        $user->coursename   = $request->coursename;
        $user->section      = $request->section;
        $user->save();
  
        return redirect()->route('Superadmin.instructorallocation');
    }

    public function deleteinstructor($id, Request $request){
        if(Instructorforcourses::destroy($id)){
            return redirect()->route('Superadmin.instructorallocation');
        }
    }

    //announcements
    function announcements(){
        $notice = DB::table('announcements')->get();
        return view('Superadmin.announcements')->with('notice', $notice);
    }

    public function addannouncement(Request $request){
        $user = new Announcement();
        $user->title        = $request->title;
        $user->details      = $request->details;

        $user->save();

        return redirect()->route('Superadmin.announcements');
    }


    function profilesettings(){
        return view('Superadmin.profilesettings');
    }
    function security(){
        return view('Superadmin.security');
    }
    function myaccount(){
        return view('Superadmin.myaccount');
    }
    function myinbox(){
        return view('Superadmin.myinbox');
    }

    
}
