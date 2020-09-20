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
Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@verify');

//superadmin
Route::get('/superadmin', 'SuperadminController@index')->name('Superadmin.index');

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

Route::get('/superadmin/profilesettings', 'SuperadminController@profilesettings')->name('Superadmin.profilesettings');
Route::post('/superadmin/profilesettings', 'SuperadminController@saveprofilesettings');

Route::get('/superadmin/security', 'SuperadminController@security')->name('Superadmin.security');
Route::post('/superadmin/security', 'SuperadminController@savesecurity');

Route::get('/superadmin/myaccount', 'SuperadminController@myaccount')->name('Superadmin.myaccount');
Route::get('/superadmin/myinbox', 'SuperadminController@myinbox');


//admin
Route::get('/admin', 'AdminController@index')->name('Admin.index');

Route::get('/admin/moderatormanagement', 'AdminController@moderatormanagement')->name('Admin.moderatormanagement');
Route::post('/admin/moderatormanagement/addmoderator', 'AdminController@addmoderator');
Route::post('/admin/moderatormanagement/updatemoderator/{id}', 'AdminController@updatemoderator');
Route::post('/admin/moderatormanagement/deletemoderator/{id}', 'AdminController@deletemoderator');
Route::post('/admin/adminmanagement/searchmoderator', 'AdminController@searchmoderator')->name('Admin.searchmoderator');

Route::get('/admin/usermanagement', 'AdminController@usermanagement')->name('Admin.usermanagement');
Route::post('/admin/usermanagement/adduser', 'AdminController@adduser');
Route::post('/admin/usermanagement/updateuser/{id}', 'AdminController@updateuser');
Route::post('/admin/usermanagement/deleteuser/{id}', 'AdminController@deleteuser');

Route::get('/admin/coursemanagement', 'AdminController@coursemanagement');
Route::get('/admin/coursemanagement', 'AdminController@coursemanagement')->name('Admin.coursemanagement');
Route::post('/admin/coursemanagement/addcourse', 'AdminController@addcourse');
Route::post('/admin/coursemanagement/updatecourse/{id}', 'AdminController@updatecourse');
Route::post('/admin/coursemanagement/deletecourse/{id}', 'AdminController@deletecourse');
Route::get('/admin/coursemanagement/downloadCourse', 'AdminController@coursePdf');

Route::get('/admin/courseforstudent', 'AdminController@courseforstudent')->name('Admin.courseforstudent');
Route::post('/admin/courseforstudent/addcourseforstudent', 'AdminController@addcourseforstudent');
Route::post('/admin/courseforstudent/updatecourseforstudent/{id}', 'AdminController@updatecourseforstudent');
Route::post('/admin/courseforstudent/deletecourseforstudent/{id}', 'AdminController@deletecourseforstudent');

Route::get('/admin/instructorallocation', 'AdminController@instructorallocation')->name('Admin.instructorallocation');
Route::post('/admin/instructorallocation/addinstructor', 'AdminController@addinstructor');
Route::post('/admin/instructorallocation/updateinstructor/{id}', 'AdminController@updateinstructor');
Route::post('/admin/instructorallocation/deleteinstructor/{id}', 'AdminController@deleteinstructor');

Route::get('/admin/announcements', 'AdminController@announcements')->name('Admin.announcements');

Route::get('/admin/profilesettings', 'AdminController@profilesettings')->name('Admin.profilesettings');
Route::post('/admin/profilesettings', 'AdminController@saveprofilesettings');

Route::get('/admin/security', 'AdminController@security')->name('Admin.security');
Route::post('/admin/security', 'AdminController@savesecurity');

Route::get('/admin/myaccount', 'AdminController@myaccount')->name('Admin.myaccount');

Route::get('/admin/myinbox', 'AdminController@myinbox');


//moderator
Route::get('/moderator', 'ModeratorController@index')->name('Moderator.index');
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
Route::get('/instructor', 'InstructorController@index')->name('Instructor.index');
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
Route::get('/student', 'StudentController@index')->name('Student.index');
Route::get('/student/consultation', 'StudentController@consultation');
Route::get('/student/coursefile', 'StudentController@coursefile');
//Route::get('/discussionforum', 'StudentController@discussionforum');
Route::get('/student/mycourse', 'StudentController@mycourse');
Route::get('/student/mygrades', 'StudentController@mygrades');
Route::get('/student/profilesettings', 'StudentController@profilesettings');
Route::get('/student/security', 'StudentController@security');
Route::get('/student/myaccount', 'StudentController@myaccount');
Route::get('/student/myinbox', 'StudentController@myinbox');
