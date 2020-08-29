<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('Admin.index');
    }
    function moderatormanagement(){
        return view('Admin.moderatormanagement');
    }
    function usermanagement(){
        return view('Admin.usermanagement');
    }
    function coursemanagement(){
        return view('Admin.coursemanagement');
    }
    function courseforstudent(){
        return view('Admin.courseforstudent');
    }
    function instructorallocation(){
        return view('Admin.instructorallocation');
    }
    function announcements(){
        return view('Admin.announcements');
    }
    function profilesettings(){
        return view('Admin.profilesettings');
    }
    function security(){
        return view('Admin.security');
    }
    function myaccount(){
        return view('Admin.myaccount');
    }
    function myinbox(){
        return view('Admin.myinbox');
    }
}
