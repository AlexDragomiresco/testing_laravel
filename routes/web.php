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

Route::get('/', 'ContentsController@home');
Route::get('/clients', 'ClientsController@index');
Route::get('/clients/new', 'ClientsController@newClient');
Route::post('/clients/new', 'ClientsController@create');
Route::get('/clients/{client_id}', 'ClientsController@show');
Route::post('/clients/{client_id}', 'ClientsController@modify');

Route::get('/reservations/{client_id}', 'ReservationsController@checkAvailableRooms');
Route::post('/reservations/{client_id}', 'ReservationsController@checkAvailableRooms');

Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom');


Route::get('/about', function () {
    $response_arr = array();
    $response_arr['author']='Bp';
    $response_arr['version']='0.1.0';
    return $response_arr;

});

Route::get('/home', function () {
    $data = array();
    $data['version']= '0.1.0';
    return view('welcome', $data);
});

Route::get('/showTitle', 'ClientController@showTitle');

Route::get('/facade', function () {
    return DB::select(); //not configured
});

Route::get('/facade/encrypt', function () {
    return Crypt::encrypt('password');
});

Route::get('/facade/decrypt', function () {
    return Crypt::decrypt('eyJpdiI6IkszWXNJbm5jUDlPT0RCVVB3Q3pzdXc9PSIsInZhbHVlIjoiS1ZSY0hnNXZaTkMwbzRhSkNLTTRsUT09IiwibWFjIjoiYmY3ZmNkOTEzZTUwNDJlMjY0Y2FiOGQ5N2ZhNTU5ZGNiYzlhMzQ0OTMyZDNjOThjZTU1NGQ3NTZlYTdhZmFlZiJ9');
});