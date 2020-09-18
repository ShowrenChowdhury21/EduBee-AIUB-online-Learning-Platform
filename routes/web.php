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

Route::get('/superadmin/adminmanagement', 'SuperadminController@adminmanagement')->name('Superadmin.adminmanagement');
Route::post('/superadmin/adminmanagement/addadmin', 'SuperadminController@addadmin');
Route::post('/superadmin/adminmanagement/updateadmin/{id}', 'SuperadminController@updateadmin');
Route::post('/superadmin/adminmanagement/deleteadmin/{id}', 'SuperadminController@deleteadmin');
Route::post('/superadmin/adminmanagement/searchadmin', 'SuperadminController@searchadmin')->name('Superadmin.searchadmin');

Route::get('/superadmin/moderatormanagement', 'SuperadminController@moderatormanagement')->name('Superadmin.moderatormanagement');
Route::post('/superadmin/moderatormanagement/addmoderator', 'SuperadminController@addmoderator');
Route::post('/superadmin/moderatormanagement/updatemoderator/{id}', 'SuperadminController@updatemoderator');
Route::post('/superadmin/moderatormanagement/deletemoderator/{id}', 'SuperadminController@deletemoderator');
Route::post('/superadmin/adminmanagement/searchmoderator', 'SuperadminController@searchmoderator')->name('Superadmin.searchmoderator');

Route::get('/superadmin/usermanagement', 'SuperadminController@usermanagement')->name('Superadmin.usermanagement');
Route::post('/superadmin/usermanagement/adduser', 'SuperadminController@adduser');
Route::post('/superadmin/usermanagement/updateuser/{id}', 'SuperadminController@updateuser');
Route::post('/superadmin/usermanagement/deleteuser/{id}', 'SuperadminController@deleteuser');

Route::get('/superadmin/departmentmanagement', 'SuperadminController@departmentmanagement')->name('Superadmin.departmentmanagement');
Route::post('/superadmin/departmentmanagement/adddept', 'SuperadminController@adddept');
Route::post('/superadmin/departmentmanagement/updatedept/{id}', 'SuperadminController@updatedept');
Route::post('/superadmin/departmentmanagement/deletedept/{id}', 'SuperadminController@deletedept');
Route::get('/superadmin/departmentmanagement/downloadDept', 'SuperadminController@departmentPdf');

Route::get('/superadmin/coursemanagement', 'SuperadminController@coursemanagement')->name('Superadmin.coursemanagement');
Route::post('/superadmin/coursemanagement/addcourse', 'SuperadminController@addcourse');
Route::post('/superadmin/coursemanagement/updatecourse/{id}', 'SuperadminController@updatecourse');
Route::post('/superadmin/coursemanagement/deletecourse/{id}', 'SuperadminController@deletecourse');
Route::get('/superadmin/coursemanagement/downloadCourse', 'SuperadminController@coursePdf');

Route::get('/superadmin/courseforstudent', 'SuperadminController@courseforstudent')->name('Superadmin.courseforstudent');
Route::post('/superadmin/courseforstudent/addcourseforstudent', 'SuperadminController@addcourseforstudent');
Route::post('/superadmin/courseforstudent/updatecourseforstudent/{id}', 'SuperadminController@updatecourseforstudent');
Route::post('/superadmin/courseforstudent/deletecourseforstudent/{id}', 'SuperadminController@deletecourseforstudent');

Route::get('/superadmin/instructorallocation', 'SuperadminController@instructorallocation')->name('Superadmin.instructorallocation');
Route::post('/superadmin/instructorallocation/addinstructor', 'SuperadminController@addinstructor');
Route::post('/superadmin/instructorallocation/updateinstructor/{id}', 'SuperadminController@updateinstructor');
Route::post('/superadmin/instructorallocation/deleteinstructor/{id}', 'SuperadminController@deleteinstructor');

Route::get('/superadmin/announcements', 'SuperadminController@announcements')->name('Superadmin.announcements');
Route::post('/superadmin/announcements/addannouncement', 'SuperadminController@addannouncement');

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