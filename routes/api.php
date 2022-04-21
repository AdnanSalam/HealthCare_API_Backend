<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientAPIController;
use App\Http\Controllers\DoctorAPIController;
use App\Http\Controllers\ReceptionistAPIController;
use App\Http\Controllers\AccessoryAPIController;
use App\Http\Controllers\NeedyAPIController;
use App\Http\Controllers\ComplaintAPIController;
use App\Http\Controllers\PagesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Patient
Route::get('/patient/all',[PatientAPIController::class,'getAllPatient']);
Route::post('/patient/add',[PatientAPIController::class,'addPatient']);
Route::get('/patient/get/{id}',[PatientAPIController::class,'getPatient']);
Route::post('/patient/update/{id}',[PatientAPIController::class,'updatePatient']);
Route::post('/patient/delete/{id}',[PatientAPIController::class,'deletePatient']);


//Doctor
Route::get('/doctor/all',[DoctorAPIController::class,'getAllDoctor']);
Route::post('/doctor/add',[DoctorAPIController::class,'addDoctor']);
Route::get('/doctor/get/{did}',[DoctorAPIController::class,'getDoctor']);
Route::post('/doctor/update/{did}',[DoctorAPIController::class,'updateDoctor']);
Route::post('/doctor/delete/{did}',[DoctorAPIController::class,'deleteDoctor']);

//Receptionist
Route::get('/receptionist/all',[ReceptionistAPIController::class,'getAllReceptionist']);

Route::get('/receptionist/get/{rid}',[ReceptionistAPIController::class,'getReceptionist']);
Route::post('/receptionist/update/{rid}',[ReceptionistAPIController::class,'updateReceptionist']);
Route::post('/receptionist/delete/{rid}',[ReceptionistAPIController::class,'deleteReceptionist']);

//Accessory
Route::get('/accessory/all',[AccessoryAPIController::class,'getAllAccessory']);
Route::post('/accessory/add',[AccessoryAPIController::class,'addAccessory']);
Route::get('/accessory/get/{aid}',[AccessoryAPIController::class,'getAccessory']);
Route::post('/accessory/update/{aid}',[AccessoryAPIController::class,'updateAccessory']);
Route::post('/accessory/delete/{aid}',[AccessoryAPIController::class,'deleteAccessory']);

//needyPatient
Route::get('/needy/all',[NeedyAPIController::class,'getAllNeedy']);
Route::post('/needy/add',[NeedyAPIController::class,'addNeedy']);
Route::get('/needy/get/{nid}',[NeedyAPIController::class,'getNeedy']);
Route::post('/needy/update/{nid}',[NeedyAPIController::class,'updateNeedy']);
Route::post('/needy/delete/{nid}',[NeedyAPIController::class,'deleteNeedy']);

//complaint
Route::get('/complaint/all',[ComplaintAPIController::class,'getAllComplaint']);
Route::post('/complaint/add',[ComplaintAPIController::class,'addComplaint']);
Route::get('/complaint/get/{nid}',[ComplaintAPIController::class,'getComplaint']);
Route::post('/complaint/update/{nid}',[ComplaintAPIController::class,'updateComplaint']);
Route::post('/complaint/delete/{nid}',[ComplaintAPIController::class,'deleteComplaint']);


//Login
Route::post('/login',[PagesController::class,'login']);
//Mail
Route::post('/mail',[PagesController::class,'mail']);

//registration
Route::post('/registration',[ReceptionistAPIController::class,'registration']);