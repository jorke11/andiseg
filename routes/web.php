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

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::resource('/courses', 'Administration\CoursesController');
Route::resource('/parameters', 'Administration\ParametersController');
Route::resource('/schedules', 'Administration\SchedulesController');
Route::resource('/clients', 'Clients\ClientsController');
Route::resource('/email', 'Administration\EmailController');

Route::post('/email/detail', 'Administration\EmailController@storeDetail');
Route::put('/email/detail/{id}', 'Administration\EmailController@updateDetail');
Route::get('/email/detail/{id}/edit', 'Administration\EmailController@editDetail');
Route::delete('/email/detail/{id}', 'Administration\EmailController@destroyDetail');


Route::resource('/users', 'Security\UsersController');

Route::resource('/traicing', 'Clients\TraicingController');
Route::put('/traicing/biografic/{id}', 'Clients\TraicingController@updateBiografic');
Route::put('/traicing/biograficOk/{id}', 'Clients\TraicingController@updateBiograficOk');

Route::get('/traicing/academic/{id}', 'Clients\TraicingController@editAcademic');
Route::post('/traicing/academic', 'Clients\TraicingController@storeAcademic');
Route::delete('/traicing/academic/{id}', 'Clients\TraicingController@destroyAcademic');
Route::put('/traicing/academicOk/{id}', 'Clients\TraicingController@updateAcademicOk');

Route::get('/traicing/juridic/{id}', 'Clients\TraicingController@editJuridic');
Route::post('/traicing/juridic', 'Clients\TraicingController@storeJuridic');
Route::delete('/traicing/juridic/{id}', 'Clients\TraicingController@destroyJuridic');
Route::put('/traicing/juridicOk/{id}', 'Clients\TraicingController@updateJuridicOk');

Route::get('/traicing/anotations/{id}', 'Clients\TraicingController@editAnotations');
Route::post('/traicing/anotations', 'Clients\TraicingController@storeAnotations');
Route::delete('/traicing/anotations/{id}', 'Clients\TraicingController@destroyAnotations');
Route::put('/traicing/anotationsOk/{id}', 'Clients\TraicingController@updateAnotationsOk');

Route::get('/traicing/laboral/{id}', 'Clients\TraicingController@editLaboral');
Route::post('/traicing/laboral', 'Clients\TraicingController@storeLaboral');
Route::delete('/traicing/laboral/{id}', 'Clients\TraicingController@destroyLaboral');
Route::put('/traicing/laboralOk/{id}', 'Clients\TraicingController@updateLaboralOk');

Route::get('/traicing/domicile/{id}', 'Clients\TraicingController@editDomicile');
Route::put('/traicing/domicile/{id}', 'Clients\TraicingController@updateDomicile');

Route::get('/traicing/photo/{id}', 'Clients\TraicingController@editPhoto');
Route::delete('/traicing/photo/{id}', 'Clients\TraicingController@deletePhoto');
Route::post('/traicing/photo', 'Clients\TraicingController@storePhoto');
Route::put('/traicing/photoOk/{id}', 'Clients\TraicingController@updatePhotoOk');
Route::put('/traicing/finish/{id}', 'Clients\TraicingController@updateFinish');
Route::get('/traicing/preview/{id}', 'Clients\TraicingController@preview');
Route::post('/traicing/send', 'Clients\TraicingController@send');
Route::get('/traicing/getEmails/{id}', 'Clients\TraicingController@getEmails');

Route::get('/traicing/polygraphy/{id}', 'Clients\TraicingController@editPoligraphy');
Route::post('/traicing/poligrafia', 'Clients\TraicingController@updatePoligraphy');

Route::resource('/cities', 'Administration\CitiesController');
Route::resource('/department', 'Administration\DepartmentController');

Route::post('/schedules/detail', 'Administration\SchedulesController@storeDetail');
Route::get('/schedules/{id}/editDetail', 'Administration\SchedulesController@getDetail');
Route::delete('/schedules/detail/{id}', 'Administration\SchedulesController@destroyItem');

Route::resource('/orders', 'Clients\OrdersController');
Route::put('/orders/associate/{order_id}', 'Clients\OrdersController@updateAssociate');


Route::get('/api/listEmail', function() {
    return Datatables::eloquent(App\Models\Administration\Email::query())->make(true);
});


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

Route::get('/api/listClients', function() {
    $query = DB::table("vclient");
    if (Auth::user()->role_id != 1) {
        $query->where("executive_id", Auth::user()->id);
    }
    return Datatables::queryBuilder($query)->make(true);
});
Route::get('/api/listUsers', function() {
    $query = DB::table("vusers");

    if (Auth::user()->role_id != 1) {
        $query->where("id", Auth::user()->id);
    }

    return Datatables::queryBuilder($query)->make(true);
});

Route::get('/api/listDepartment', function() {
    return Datatables::eloquent(\App\Models\Administration\Department::query())->make(true);
});
Route::get('/api/listOrders', function() {
    $sql = DB::table("vorders");


    /* if (Auth::user()->role_id == 2) {
      $sql->where("executive_id", Auth::user()->id);
      } */

    if (Auth::user()->role_id == 4) {
        $sql->where("insert_id", Auth::user()->id);
    }

    return Datatables::queryBuilder($sql)->make(true);
});
Route::get('/api/listTraicing', function() {
    $sql = DB::table("vtraicing");

    if (Auth::user()->role_id == 3) {
        $sql->where("status_id", 2);
    }

    return Datatables::queryBuilder($sql)->make(true);
});


Route::get('/api/getCity', 'Administration\SeekController@getCity');
Route::get('/api/getDepartment', 'Administration\SeekController@getDepartment');
