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
    return view('auth.login');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

//DASHBOARD ROUTES -- START

Route::get('/dashboard', 'dashboardController@index');

//DASHBOARD ROUTES -- END


//Patient ROUTES -- START
Route::post('/addPatient', 'studentController@addPatient')->name('addPatient');
Route::get('/patients', 'studentController@index');
Route::get('patients/{id}','studentController@patient');
Route::get('/makatiStudent', 'studentController@makati');
Route::get('/prescription/{id}', 'studentController@prescription');
Route::get('/deletePatient', 'studentController@deletePatient');
Route::get('/Patientdetails', 'studentController@Patientdetails');
Route::post('/editPatient', 'studentController@editPatient');
Route::post('/addPrescription', 'profileController@addPrescription');
Route::get('/deletePrescription', 'studentController@deletePrescription');
Route::get('/prescriptionDetails', 'profileController@prescriptionDetails');
Route::post('/updatePrescription', 'profileController@updatePrescription');
Route::post('/deletePrescription', 'profileController@deletePrescription');
//STUDENT ROUTES -- END


//EMPLOYEE ROUTES -- START

Route::get('/doctors', 'employeeController@index');
Route::get('/doctorView', 'employeeController@doctorView');
Route::post('/addDoctor', 'employeeController@addDoctor');
Route::get('/doctorDetails', 'employeeController@doctorDetails');
Route::get('/deleteDoctor', 'employeeController@deleteDoctor');
Route::post('/updateDoctor', 'employeeController@updateDoctor');
Route::get('/makatiEmployee', 'employeeController@makatiEmployee');
Route::get('/userProfile', 'profileController@index');
Route::post('/updateUser', 'profileController@updateUser');

//EMPLOYEE ROUTES -- END

Route::post('sendMessage','profileController@sendMessage');