<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModeratorController extends Controller
{
    function index(){
        return view('Moderator.index');
    }
    function usermanagement(){
        return view('Moderator.usermanagement');
    }
    function useractivity(){
        return view('Moderator.useractivity');
    }
    function courseforstudent(){
        return view('Moderator.courseforstudent');
    }
    function discussionforum(){
        return view('forum');
    }
    function instructorallocation(){
        return view('Moderator.instructorallocation');
    }
    function profilesettings(){
        return view('Moderator.profilesettings');
    }
    function security(){
        return view('Moderator.security');
    }
    function myaccount(){
        return view('Moderator.myaccount');
    }
    function myinbox(){
        return view('Moderator.myinbox');
    }
}
