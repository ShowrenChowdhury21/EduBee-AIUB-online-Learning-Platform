<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
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
use App\Sender;
use App\Receiver;
use App\profiles;
use Image;


class AdminController extends Controller
{
    function index(){
        return view('Admin.index');
    }

    function moderatormanagement(){
      $moderator = Http::get('http://localhost:3000/home/moderatormanagement');
      $users = $moderator->json();
      return view('Admin.moderatormanagement')->with('users', $users);
    }
    public function addmoderator(Request $request){
      $request->validate([
        'id' => 'required',
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'password' => 'required'
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

      return redirect()->route('Admin.moderatormanagement');
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
      $usershere = Http::get('http://localhost:3000/home/usermanagement');
      $users = $usershere->json();
      return view('Admin.usermanagement')->with('users', $users);      
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

      return redirect()->route('Admin.usermanagement');
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

      return redirect()->route('Admin.coursemanagement');
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
        $stdnts = DB::table('users')->where('type', 'student')->select('id','name','email')->get();
        $courses = DB::table('courses')->select('id','name')->get();
        return view('Admin.courseforstudent')->with('crsforstdnt', $crsforstdnt)
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

        return redirect()->route('Admin.courseforstudent');
    }

    public function updatecourseforstudent($id, Request $request){
      $request->validate([
        'section' => 'required'
      ]);
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
    function printcourseforstudent(){
      $crsforstdnt = DB::table('courseforstudents')->get();
      $stdnts = DB::table('users')->where('type', 'student')->select('id','name','email')->get();
      $courses = DB::table('courses')->select('id','name')->get();
      $pdf = PDF::loadView('Admin.printcourseforstudent', ['crsforstdnt' => $crsforstdnt,
                                                  'stdnts' => $stdnts,
                                                  'courses' => $courses]);

      return $pdf->download('student course allocation list.pdf');
    }

    function instructorallocation(){
        $instructor = DB::table('instructorforcourses')->get();
        $faculty = DB::table('users')->where('type', 'instructor')->select('id','name')->get();
        $courses = DB::table('courses')->select('id','name')->get();
        return view('Admin.instructorallocation')->with('instructor', $instructor)
                                                  ->with('faculty', $faculty)
                                                  ->with('courses', $courses);
    }
    function printinstructorallocation(){
      $instructor = DB::table('instructorforcourses')->get();
      $faculty = DB::table('users')->where('type', 'instructor')->select('id','name')->get();
      $courses = DB::table('courses')->select('id','name')->get();
      $pdf = PDF::loadView('Admin.printinstructorallocation', ['instructor' => $instructor,
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

        return redirect()->route('Admin.instructorallocation');
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
      $users = DB::table('logins')->get();

      $recvmail = DB::table('receivers')->get();
      return view('Admin.myinbox')->with(['recvmail'=>$recvmail,'users'=>$users]);

    }


    public function storemail(Request $request)
    {
        $this->validate($request,[
          'subject'=>'required',
          'email_body'=>'required'

        ]);


        $send = new Sender();
        $send->subject =$request->input('subject');
        $send->email_body =$request->input('email_body');
        $send->sender_email = $request->session()->get('email');
        $send->receiver_email = $request->input('to');
        $send->save();

        $rc = new Receiver();
        $rc->subject =$request->input('subject');
        $rc->email_body =$request->input('email_body');
        $rc->sender_email = $request->session()->get('email');
        $rc->receiver_email =$request->input('to');
        $rc->save();

        $recvmail = DB::table('receivers')->get();
        return redirect('/admin/myinbox')->with('recvmail', $recvmail);


    }
    public function storereply(Request $request)
    {
        $this->validate($request,[
          'subject'=>'required',
          'email_body'=>'required'

        ]);


        $send = new Sender();
        $send->subject =$request->input('subject');
        $send->email_body =$request->input('email_body');
        $send->sender_email = $request->session()->get('email');
        $send->receiver_email = $request->input('to');
        $send->save();

        $rc = new Receiver();
        $rc->subject =$request->input('subject');
        $rc->email_body =$request->input('email_body');
        $rc->sender_email = $request->session()->get('email');
        $rc->receiver_email =$request->input('to');
        $rc->save();

        $recvmail = DB::table('receivers')->get();
        return redirect('/admin/myinbox')->with('recvmail', $recvmail);


    }

    public function deleteemail($id)
    {
        $mail= DB::table('receivers')->where('email_body', $id)->get();
        Receiver::destroy($mail[0]->id);
        $recvmail = DB::table('receivers')->get();
        return redirect('/admin/myinbox')->with('recvmail', $recvmail);

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
        
        return redirect()->route('Admin.index');
    }

}
