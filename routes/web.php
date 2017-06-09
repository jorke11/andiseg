<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('/courses', 'Administration\CoursesController');
Route::resource('/parameters', 'Administration\ParametersController');
Route::resource('/schedules', 'Administration\SchedulesController');
Route::resource('/traicing', 'Clients\TraicingController');
Route::resource('/cities', 'Administration\CitiesController');
Route::resource('/department', 'Administration\DepartmentController');

Route::post('/schedules/detail', 'Administration\SchedulesController@storeDetail');
Route::get('/schedules/{id}/editDetail', 'Administration\SchedulesController@getDetail');
Route::delete('/schedules/detail/{id}', 'Administration\SchedulesController@destroyItem');

Route::resource('/orders', 'Clients\OrdersController');


Route::get('/api/listParameter', function() {
    return Datatables::queryBuilder(
                    DB::table('parameters')->orderBy("id", "asc")
            )->make(true);
});

Route::get('/api/listCourses', function() {
    return Datatables::queryBuilder(DB::table("courses"))->make(true);
});
Route::get('/api/listSchedules', function(Request $request) {
    $query = DB::table("schedules");
    return Datatables::queryBuilder($query)->make(true);
});


Route::get('/api/listCity', function() {
    $query = DB::table("vcities");
    return Datatables::queryBuilder($query)->make(true);
});

Route::get('/api/listDepartment', function() {
    return Datatables::eloquent(\App\Models\Administration\Department::query())->make(true);
});


Route::get('/api/getCity', 'Administration\SeekController@getCity');
Route::get('/api/getDepartment', 'Administration\SeekController@getDepartment');
