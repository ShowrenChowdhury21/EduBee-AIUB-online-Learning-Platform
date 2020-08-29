<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    function index(){
        return view('Superadmin.index');
    }
    function adminmanagement(){
        return view('Superadmin.adminmanagement');
    }
    function moderatormanagement(){
        return view('Superadmin.moderatormanagement');
    }
    function usermanagement(){
        return view('Superadmin.usermanagement');
    }
    function departmentmanagement(){
        return view('Superadmin.departmentmanagement');
    }
    function coursemanagement(){
        return view('Superadmin.coursemanagement');
    }
    function courseforstudent(){
        return view('Superadmin.courseforstudent');
    }
    function instructorallocation(){
        return view('Superadmin.instructorallocation');
    }
    function announcements(){
        return view('Superadmin.announcements');
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
