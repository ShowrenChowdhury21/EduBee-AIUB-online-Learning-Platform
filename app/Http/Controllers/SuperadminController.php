<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperadminController extends Controller
{
    function index(){
        return view('Superadmin.index');
    }
    

    //adminmanagement
    function adminmanagement(){
        return view('Superadmin.adminmanagement');
    }

    function addadmin(){

    }

    function updateadmin(){
        
    }

    function deleteadmin(){
        
    }

    function showadmin(){
        
    }


    //moderatormanagement
    function moderatormanagement(){
        return view('Superadmin.moderatormanagement');
    }


    //usermanagement
    function usermanagement(){
        return view('Superadmin.usermanagement');
    }


    //departmentmanagement
    function departmentmanagement(){
        return view('Superadmin.departmentmanagement');
    }


    //coursemanagement
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
