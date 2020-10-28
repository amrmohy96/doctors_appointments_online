<?php

use Illuminate\Support\Facades\Route;


// language
Route::get('language/{lang}', function ($lang) {
    Session::has('lang') ? Session::forget('lang') : null;
    $lang == 'ar' ? Session::put('lang', 'ar') : Session::put('lang', 'en');
    return back();
})->name('language');

Auth::routes();
Route::get('/','FrontController@index')->name('front.index');
//Route::get('/',function (){
//    return date('m-d-yy');
//});
Route::get('/appointment/{appointment_id}/{doctor_id}/{date}','FrontController@show')->name('front.show');
Route::post('/book/appointments','FrontController@store')->name('appointment.book');


// dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('doctors', 'DoctorController');
});

Route::middleware(['auth', 'doctor'])->group(function () {
    Route::resource('appointments', 'AppointmentController');
});
Route::get('/home', 'HomeController@index')->name('home');
