<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    function index(){
        return view('Instructor.index');
    }
    function classes(){
        return view('Instructor.classes');
    }
    function coursefile(){
        return view('Instructor.coursefile');
    }
    function discussionforum(){
        return view('forum');
    }
    function coursegrades(){
        return view('Instructor.coursegrades');
    }
    function grades(){
        return view('Instructor.grades');
    }
    function studentlist(){
        return view('Instructor.studentlist');
    }
    function profilesettings(){
        return view('Instructor.profilesettings');
    }
    function security(){
        return view('Instructor.security');
    }
    function myaccount(){
        return view('Instructor.myaccount');
    }
    function myinbox(){
        return view('Instructor.myinbox');
    }
}
