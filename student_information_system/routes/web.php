<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('admin/admin_auth/a_register', 'Admin\RegisterController@a_register');
Route::post('admin/admin_auth/a_registered', 'Admin\RegisterController@a_registered');
Route::get('admin/admin_auth/confirmadmin', 'Admin\RegisterController@confirmadmin');
Route::post('admin/admin_auth/confirmedadmin', 'Admin\RegisterController@confirmedadmin');


Route::get('admin/coursereporter', 'AdminController@coursereporter');
Route::post('admin/coursereportered', 'AdminController@coursereportered');
Route::get('admin/feereporter', 'AdminController@feereporter');
Route::post('admin/feereportered', 'AdminController@feereportered');
Route::get('admin/resultreporter', 'AdminController@resultreporter');
Route::post('admin/resultreportered', 'AdminController@resultreportered');


Route::get('admin/reports', 'AdminController@reports');
Route::get('admin/feereport', 'AdminController@feereport');
Route::post('admin/feereported', 'AdminController@feereported');

Route::get('admin/coursereport', 'AdminController@coursereport');
Route::post('admin/coursereported', 'AdminController@coursereported');
Route::get('admin/readcourses/{id}','AdminController@readcourses');

Route::get('admin/resultreport', 'AdminController@resultreport');
Route::post('admin/resultreported', 'AdminController@resultreported');
Route::get('admin/readresults/{id}','AdminController@readresults');

Route::get('admin/changepassword', 'AdminController@changepassword');
Route::post('admin/changedpassword', 'AdminController@changedpassword');
Route::post('/searchhomebatch', 'AdminController@searchhomebatch');
Route::post('/searchhomesemester', 'AdminController@searchhomesemester');

Route::post('/searchresultname', 'AdminController@searchresultname');
Route::post('/searchfeereg', 'AdminController@searchfeereg');

Route::get('/home', 'HomeController@index');
Route::POST('/confirmation', 'HomeController@store');
Route::get('/courses', 'HomeController@courses');
Route::get('/courses2', 'HomeController@courses');
Route::get('/courses3', 'HomeController@courses');

Route::get('/editbystud', 'HomeController@editbystud');
Route::post('/editedbystud', 'HomeController@editedbystud');

Route::get('/changepasswordstud', 'HomeController@changepasswordstud');
Route::post('/changedpasswordstud', 'HomeController@changedpasswordstud');

Route::get('/addsubject','HomeController@addsubject');
Route::post('/addedsubject','HomeController@addedsubject');
Route::get('/dropsubject/{id}','HomeController@dropsubject');

Route::get('/studfee','HomeController@studfee');
Route::get('/studfee2','HomeController@studfee');
Route::get('/studfee3','HomeController@studfee');
Route::get('/fullfee', 'HomeController@fullfee');
Route::get('/installment/{data}', 'HomeController@installment');
//Route::get('/coursestatus','HomeController@coursestatus');


Route::get('/rollnoslip','HomeController@rollnoslip');
Route::get('/studresults','HomeController@studresults');


Route::get('/create','AdminController@create');
Route::post('/insert','AdminController@add');
Route::get('/update/{id}','AdminController@update');
Route::post('/edit/{id}','AdminController@edit');
Route::get('/read/{id}','AdminController@read');
Route::get('/delete/{id}','AdminController@delete');
Route::get('admin/cards','AdminController@cards');
Route::get('/generatecard/{id}','AdminController@generatecard');

Route::get('admin/managesessions','AdminController@managesessions');
Route::get('admin/deletesession/{id}','AdminController@deletesession');
Route::get('admin/addsession','AdminController@addsession');
Route::post('admin/addedsession','AdminController@addedsession');
Route::get('admin/sessioncourse/{sname}','AdminController@sessioncourse');


Route::get('admin/managecourse','AdminController@managecourse');
Route::get('admin/dropcourse/{id}','AdminController@deletecourse');
Route::get('admin/addcourse','AdminController@addcourse');
Route::post('admin/addedcourse','AdminController@addedcourse');
Route::get('admin/editcourse/{id}','AdminController@editcourse');
Route::post('admin/edittedcourse/{id}','AdminController@edittedcourse');
 
Route::get('admin/feedetails','AdminController@feedetails');
Route::get('admin/addfee','AdminController@addfee');
Route::post('admin/addedfee','AdminController@addedfee');
Route::get('admin/editfee/{id}','AdminController@editfee');
Route::post('admin/edittedfee/{id}','AdminController@edittedfee');
Route::get('admin/deletefee/{id}','AdminController@deletefee');


Route::get('admin/studentfee','AdminController@studentfee');
Route::get('admin/addstudentfee','AdminController@addstudentfee');
Route::post('admin/addedstudentfee','AdminController@addedstudentfee');
Route::get('admin/deletestudentfee/{id}','AdminController@deletestudentfee');
Route::get('admin/secondinstallment/{id}','AdminController@secondinstallment');
Route::post('admin/secondinstallmentpaid/{id}','AdminController@secondinstallmentpaid');


Route::get('admin/attendance','AdminController@attendance');
Route::get('admin/addattendance','AdminController@addattendance');
Route::post('admin/addedattendance','AdminController@addedattendance');
Route::get('admin/deleteattendance/{id}','AdminController@deleteattendance');


Route::get('admin/results','AdminController@results');
Route::get('admin/addresults/{id}','AdminController@addresults');
Route::get('admin/viewresults/{id}','AdminController@viewresults');
Route::post('admin/addedresults','AdminController@addedresults');



Route::GET('admin/home','AdminController@index');
Route::GET('admin/editor','EditorController@index');
Route::GET('admin/test','EditorController@test');
Route::GET('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin','Admin\LoginController@login');
Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');