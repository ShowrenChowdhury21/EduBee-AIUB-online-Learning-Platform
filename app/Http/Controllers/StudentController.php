<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    function index(){
        return view('Student.index');
    }
    function consultation(){
        return view('Student.consultation');
    }
    function coursefile(){
        return view('Student.coursefile');
    }
    function mycourse(){
        return view('Student.mycourse');
    }
    function discussionforum(){
        return view('forum');
    }
    function mygrades(){
        return view('Student.mygrades');
    }
    function profilesettings(){
        return view('Student.profilesettings');
    }
    function security(){
        return view('Student.security');
    }
    function myaccount(){
        return view('Student.myaccount');
    }
    function myinbox(){
        return view('Student.myinbox');
    }
}
