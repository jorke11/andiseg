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
Route::put('/traicing/biografic/{id}', 'Clients\TraicingController@updateBiografic');
Route::get('/traicing/academic/{id}', 'Clients\TraicingController@editAcademic');
Route::post('/traicing/academic', 'Clients\TraicingController@storeAcademic');

Route::get('/traicing/juridic/{id}', 'Clients\TraicingController@editJuridic');
Route::post('/traicing/juridic', 'Clients\TraicingController@storeJuridic');

Route::get('/traicing/anotations/{id}', 'Clients\TraicingController@editAnotations');
Route::post('/traicing/anotations', 'Clients\TraicingController@storeAnotations');

Route::get('/traicing/laboral/{id}', 'Clients\TraicingController@editLaboral');
Route::post('/traicing/laboral', 'Clients\TraicingController@storeLaboral');

Route::get('/traicing/domicile/{id}', 'Clients\TraicingController@editDomicile');
Route::put('/traicing/domicile/{id}', 'Clients\TraicingController@updateDomicile');

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
Route::get('/api/listOrders', function() {
    $sql = DB::table("vorders");
    return Datatables::queryBuilder($sql)->make(true);
});


Route::get('/api/getCity', 'Administration\SeekController@getCity');
Route::get('/api/getDepartment', 'Administration\SeekController@getDepartment');
