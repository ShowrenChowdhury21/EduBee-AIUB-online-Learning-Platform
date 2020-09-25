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
      $request->validate([
        'id' => 'required',
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'password' => 'required',
      ]);

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
      $userlogin->email         = $request->email;
      $userlogin->password     = $request->password;
      $userlogin->type         = "admin";
      $userlogin->save();

      return redirect()->route('Superadmin.adminmanagement');
    }

    public function updateadmin($id, Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone' => 'required'
      ]);

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
      $request->validate([
        'id' => 'required',
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'password' => 'required',
      ]);

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

      return redirect()->route('Superadmin.moderatormanagement');
    }

    public function updatemoderator($id, Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone' => 'required'
      ]);
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
        $user->department   = $request->department;
        $user->save();

        $userlogin = new Login();
        $userlogin->id           = $request->id;
        $userlogin->name         = $request->name;
        $userlogin->email         = $request->email;
        $userlogin->password     = $request->password;
        $userlogin->type         = $request->type;
        $userlogin->save();

        return redirect()->route('Superadmin.usermanagement');
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
        $user->department   = $request->department;
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
      $request->validate([
        'id' => 'required',
        'name' => 'required',
        'tag' => 'required'
      ]);

      $user = new Department();
      $user->id           = $request->id;
      $user->name         = $request->name;
      $user->tag        = $request->tag;
      $user->save();

      return redirect()->route('Superadmin.departmentmanagement');
    }

    public function updatedept($id, Request $request){
      $request->validate([
        'name' => 'required',
        'tag' => 'required'
      ]);

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
      $request->validate([
        'id' => 'required',
        'name' => 'required',
        'department' => 'required'
      ]);

      $user = new Course();
      $user->id           = $request->id;
      $user->name         = $request->name;
      $user->department   = $request->department;
      $user->save();

      return redirect()->route('Superadmin.coursemanagement');
    }

    public function updatecourse($id, Request $request){
      $request->validate([
        'name' => 'required',
        'department' => 'required'
      ]);

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
        $stdnts = DB::table('users')->where('type', 'student')->select('id','name','email')->get();
        $courses = DB::table('courses')->select('id','name')->get();
        return view('Superadmin.courseforstudent')->with('crsforstdnt', $crsforstdnt)
                                                  ->with('stdnts', $stdnts)
                                                  ->with('courses', $courses);
    }

    public function addcourseforstudent(Request $request){
      $request->validate([
        'id' => 'required',
        'name' => 'required',
        'email' => 'required',
        'cgpa' => 'required',
        'courseid' => 'required',
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

      return redirect()->route('Superadmin.courseforstudent');
    }

    public function updatecourseforstudent($id, Request $request){
      $request->validate([
        'section' => 'required'
      ]);
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

    function printcourseforstudent(){
      $crsforstdnt = DB::table('courseforstudents')->get();
      $stdnts = DB::table('users')->where('type', 'student')->select('id','name','email')->get();
      $courses = DB::table('courses')->select('id','name')->get();
      $pdf = PDF::loadView('Superadmin.printcourseforstudent', ['crsforstdnt' => $crsforstdnt,
                                                  'stdnts' => $stdnts,
                                                  'courses' => $courses]);

      return $pdf->download('student course allocation list.pdf');
    }


    //instructorallocation
    function instructorallocation(){
        $instructor = DB::table('instructorforcourses')->get();
        $faculty = DB::table('users')->where('type', 'instructor')->select('id','name')->get();
        $courses = DB::table('courses')->select('id','name')->get();
        return view('Superadmin.instructorallocation')->with('instructor', $instructor)
                                                  ->with('faculty', $faculty)
                                                  ->with('courses', $courses);
    }

    function printinstructorallocation(){
      $instructor = DB::table('instructorforcourses')->get();
      $faculty = DB::table('users')->where('type', 'instructor')->select('id','name')->get();
      $courses = DB::table('courses')->select('id','name')->get();
      $pdf = PDF::loadView('Superadmin.printinstructorallocation', ['instructor' => $instructor,
                                                                'faculty' => $faculty,
                                                                'courses' => $courses]);

      return $pdf->download('instructor allocation list.pdf');
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

      return redirect()->route('Superadmin.instructorallocation');
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
    function saveprofilesettings(Request $request){
      $user = Admin::find($request->session()->get('id'));
      $request->validate([
        'email' => 'required'
      ]);
      $user->email        = $request->email;
      $user->save();

      $userlogin = Login::find($request->session()->get('id'));
      $userlogin->email         = $request->email;
      $userlogin->save();

      return redirect()->route('Superadmin.myaccount');
    }

    function security(){
      return view('Superadmin.security')->with(['password_does_not_match' => '', 'old_password_not_match' => '']);
    }
    function savesecurity(Request $request){
      if($request->current_password == $request->session()->get('password')){
        if($request->new_password == $request->confirm_password){
          $userlogin = Login::find($request->session()->get('id'));
          $userlogin->password         = $request->confirm_password;
          $userlogin->save();

          return redirect()->route('Superadmin.myaccount');
        }
        else{
          return view('Superadmin.security')->with(['password_does_not_match' => 'password does not match', 'old_password_not_match' => '']);
        }
      }
      else{
        return view('Superadmin.security')->with(['password_does_not_match' => '', 'old_password_not_match' => 'password does not match with old password']);
      }
    }
    function myaccount(){
        return view('Superadmin.myaccount');
    }
    function myinbox(){
        return view('Superadmin.myinbox');
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
        
        return redirect()->route('Superadmin.index');
    }


}
