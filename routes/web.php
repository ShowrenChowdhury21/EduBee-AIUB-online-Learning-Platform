<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('Home.index');
});

Route::get('/home', 'HomeController@index');
Route::get('/login', 'HomeController@login');

//superadmin
Route::get('/superadmin', 'SuperadminController@index');
Route::get('/superadmin/adminmanagement', 'SuperadminController@adminmanagement');
Route::get('/superadmin/moderatormanagement', 'SuperadminController@moderatormanagement');
Route::get('/superadmin/usermanagement', 'SuperadminController@usermanagement');
Route::get('/superadmin/departmentmanagement', 'SuperadminController@departmentmanagement');
Route::get('/superadmin/coursemanagement', 'SuperadminController@coursemanagement');
Route::get('/superadmin/courseforstudent', 'SuperadminController@courseforstudent');
Route::get('/superadmin/instructorallocation', 'SuperadminController@instructorallocation');
Route::get('/superadmin/announcements', 'SuperadminController@announcements');
Route::get('/superadmin/profilesettings', 'SuperadminController@profilesettings');
Route::get('/superadmin/security', 'SuperadminController@security');
Route::get('/superadmin/myaccount', 'SuperadminController@myaccount');
Route::get('/superadmin/myinbox', 'SuperadminController@myinbox');


//admin
Route::get('/admin', 'AdminController@index');
Route::get('/admin/moderatormanagement', 'AdminController@moderatormanagement');
Route::get('/admin/usermanagement', 'AdminController@usermanagement');
Route::get('/admin/coursemanagement', 'AdminController@coursemanagement');
Route::get('/admin/courseforstudent', 'AdminController@courseforstudent');
Route::get('/admin/instructorallocation', 'AdminController@instructorallocation');
Route::get('/admin/announcements', 'AdminController@announcements');
Route::get('/admin/profilesettings', 'AdminController@profilesettings');
Route::get('/admin/security', 'AdminController@security');
Route::get('/admin/myaccount', 'AdminController@myaccount');
Route::get('/admin/myinbox', 'AdminController@myinbox');


//moderator
Route::get('/moderator', 'ModeratorController@index');
Route::get('/moderator/usermanagement', 'ModeratorController@usermanagement');
Route::get('/moderator/useractivity', 'ModeratorController@useractivity');
Route::get('/discussionforum', 'ModeratorController@discussionforum');
Route::get('/moderator/courseforstudent', 'ModeratorController@courseforstudent');
Route::get('/moderator/instructorallocation', 'ModeratorController@instructorallocation');
Route::get('/moderator/profilesettings', 'ModeratorController@profilesettings');
Route::get('/moderator/security', 'ModeratorController@security');
Route::get('/moderator/myaccount', 'ModeratorController@myaccount');
Route::get('/moderator/myinbox', 'ModeratorController@myinbox');

//instructor
Route::get('/instructor', 'InstructorController@index');
Route::get('/instructor/classes', 'InstructorController@classes');
Route::get('/instructor/coursefile', 'InstructorController@coursefile');
Route::get('/instructor/coursegrades', 'InstructorController@coursegrades')->name('instructor.coursegrades');;
Route::get('/instructor/grades', 'InstructorController@grades');
Route::get('/instructor/studentlist', 'InstructorController@studentlist');
Route::get('/instructor/profilesettings', 'InstructorController@profilesettings');
Route::get('/instructor/security', 'InstructorController@security');
Route::get('/instructor/myaccount', 'InstructorController@myaccount');
Route::get('/instructor/myinbox', 'InstructorController@myinbox');
Route::get('/instructor/discussionforum', 'InstructorController@discussionforum');



//student
Route::get('/student', 'StudentController@index');
Route::get('/student/consultation', 'StudentController@consultation');
Route::get('/student/coursefile', 'StudentController@coursefile');
//Route::get('/discussionforum', 'StudentController@discussionforum');
Route::get('/student/mycourse', 'StudentController@mycourse');
Route::get('/student/mygrades', 'StudentController@mygrades');
Route::get('/student/profilesettings', 'StudentController@profilesettings');
Route::get('/student/security', 'StudentController@security');
Route::get('/student/myaccount', 'StudentController@myaccount');
Route::get('/student/myinbox', 'StudentController@myinbox');