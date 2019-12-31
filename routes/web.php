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

Route::get('/', 'loginController@isLoggedinRole');

Route::post("/", [
    'uses'=>'loginController@isLoggedinRole',
    'as'=>'login.custom'
])->middleware('userauth');
Route::get('viewuser', 'loginController@store');
Route::get('viewteachers', 'TeachersController@viewTeachers')->middleware('school');
Route::post('viewteachers', 'TeachersController@info_Teachers');
Route::post('update/{id}', 'TeachersController@updateTeacher');
Route::delete('viewteachers/{id}', 'TeachersController@deleteTeachers');
Route::get('addteachers', 'TeachersController@addTeachers')->middleware('school');
Route::get('viewteachers/{name}', function($name){
    $teacher_name =['profilename'=>strtoupper($name[0]).substr($name, 1)];
    return view('teacherProfile', $teacher_name);
})->middleware('school');
Route::post('addteachers', 'TeachersController@addMultiTeachers');

Route::get('/admin', function(){
    echo "you have access";
})->middleware('admin');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
