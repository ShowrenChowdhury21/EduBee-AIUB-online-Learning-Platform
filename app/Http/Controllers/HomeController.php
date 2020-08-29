<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        return view('Home.index');
    }
    function login(){
        return view('Login.index');
    }
}
