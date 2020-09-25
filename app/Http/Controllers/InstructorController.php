<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\Login;
use App\Course;
use App\CourseforStudent;
use App\Instructorforcourses;
use App\Note;
use App\Video;
use App\Assignment;
use App\profiles;
use Image;
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
      $notelist = DB::table('notes')->where('coursename', $coursename)->where('section', $section)->get();
      $videolist = DB::table('videos')->where('coursename', $coursename)->where('section', $section)->get();
      $assignmentlist = DB::table('assignments')->where('coursename', $coursename)->where('section', $section)->get();
      return view('Instructor.coursefile')->with(['courselist' => $courselist,
                                                  'coursename' => $coursename,
                                                  'section' => $section])
                                          ->with('notelist', $notelist)
                                          ->with('videolist', $videolist)
                                          ->with('assignmentlist', $assignmentlist);
    }

    public function coursefilenotes(Request $request, $coursename, $section){
      if($request->hasFile('notes'))
      {
        $notes = $request->file('notes');
        $filename = $notes->getClientOriginalName();
        $request->file('notes')->storeAs('uploads', $filename, 'public');

        $file = new Note();
        $file->coursename   = $coursename;
        $file->section      = $section;
        $file->filename     = $filename;
        $file->save();

        $courselist = DB::table('courseforstudents')->where('coursename', $coursename)->where('section', $section)->get();
        $notelist = DB::table('notes')->where('coursename', $coursename)->where('section', $section)->get();
        $videolist = DB::table('videos')->where('coursename', $coursename)->where('section', $section)->get();
        $assignmentlist = DB::table('assignments')->where('coursename', $coursename)->where('section', $section)->get();
        return view('Instructor.coursefile')->with(['courselist' => $courselist,
                                                  'coursename' => $coursename,
                                                  'section' => $section])
                                          ->with('notelist', $notelist)
                                          ->with('videolist', $videolist)
                                          ->with('assignmentlist', $assignmentlist);
      }
    }

    public function coursefilevideos(Request $request, $coursename, $section){
      if($request->hasFile('videos'))
      {
        $notes = $request->file('videos');
        $filename = $notes->getClientOriginalName();
        $request->file('videos')->storeAs('uploads', $filename, 'public');

        $file = new Video();
        $file->coursename   = $coursename;
        $file->section      = $section;
        $file->filename     = $filename;
        $file->save();

        $courselist = DB::table('courseforstudents')->where('coursename', $coursename)->where('section', $section)->get();
        $notelist = DB::table('notes')->where('coursename', $coursename)->where('section', $section)->get();
        $videolist = DB::table('videos')->where('coursename', $coursename)->where('section', $section)->get();
        $assignmentlist = DB::table('assignments')->where('coursename', $coursename)->where('section', $section)->get();
        return view('Instructor.coursefile')->with(['courselist' => $courselist,
                                                  'coursename' => $coursename,
                                                  'section' => $section])
                                          ->with('notelist', $notelist)
                                          ->with('videolist', $videolist)
                                          ->with('assignmentlist', $assignmentlist);
      }
    }

    public function coursefileassignments(Request $request, $coursename, $section){
      if($request->hasFile('assignments'))
      {
        $notes = $request->file('assignments');
        $filename = $notes->getClientOriginalName();
        $request->file('assignments')->storeAs('uploads', $filename, 'public');

        $file = new Assignment();
        $file->coursename   = $coursename;
        $file->section      = $section;
        $file->filename     = $filename;
        $file->save();

        $courselist = DB::table('courseforstudents')->where('coursename', $coursename)->where('section', $section)->get();
        $notelist = DB::table('notes')->where('coursename', $coursename)->where('section', $section)->get();
        $videolist = DB::table('videos')->where('coursename', $coursename)->where('section', $section)->get();
        $assignmentlist = DB::table('assignments')->where('coursename', $coursename)->where('section', $section)->get();
        return view('Instructor.coursefile')->with(['courselist' => $courselist,
                                                  'coursename' => $coursename,
                                                  'section' => $section])
                                          ->with('notelist', $notelist)
                                          ->with('videolist', $videolist)
                                          ->with('assignmentlist', $assignmentlist);
      }
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
      $request->validate([
        'email' => 'required'
      ]);
      $user->email        = $request->email;
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
        
        return redirect()->route('Instructor.index');
    }
}
