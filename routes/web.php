<?php

use App\Http\Controllers\Patient\ProfileController as PatientProfileController;
use App\Http\Controllers\Admin\SpecialityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Doctor\HomeController as DoctorHomeController;
use App\Http\Controllers\Doctor\AppointmentController as  DoctorAppointmentController;
use App\Http\Controllers\Patient\HomeController as PatientHomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PatientAppointmentController;
use App\Http\Controllers\Admin\AppointmentController;
use  App\Http\Controllers\Admin\UserController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::get("/",[HomeController::class,"index"]);
Route::get("/about",[HomeController::class,"about"]);
Route::get("/contact",[HomeController::class,"contact"]);

Route::group(['middleware'=>'auth'],function(){
    Route::get("category/{id}/delete",[CategoryController::class,"destroy"])->name('category.delete');
    Route::resource("category",CategoryController::class);

    Route::get("post/{id}/delete",[PostController::class,"destroy"])->name('post.delete');
    Route::resource("post",PostController::class);
    Route::get("/change",[AdminHomeController::class,"change"])->name('admin.change');
    Route::post("/changePassword",[AdminHomeController::class,"changePassword"])->name('admin.changepass');



});

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get("/lang/{lang}",[HomeController::class,"lang"])->name('lang');
    
Route::group(['middleware'=>['auth','role:admin','admin_link_permission'],'prefix'=>'admin'],function(){
    Route::get("/",[AdminHomeController::class,"index"])->name('admin.home');
   
    Route::get("speciality/{id}/delete",[SpecialityController::class,"destroy"])->name('speciality.delete');
    Route::resource("speciality",SpecialityController::class);
    Route::get("patient/{id}/delete",[PatientController::class,"destroy"])->name('patient.delete');
    Route::resource("patient",PatientController::class);
    Route::get("appointment/{id}/delete",[AppointmentController::class,"destroy"])->name('appointment.delete');
    Route::get("appointment/status",[AppointmentController::class,"updateStatus"])->name('appointment.status');
    Route::resource("appointment",AppointmentController::class);
    Route::resource("patient-appointment",PatientAppointmentController::class);
    Route::get("doctor/{id}/delete",[DoctorController::class,"destroy"])->name('doctor.delete');
    Route::resource("doctor",DoctorController::class);

    Route::get("user/{id}/links",[UserController::class,"links"])->name('user.links');
    Route::post("user/{id}/links",[UserController::class,"postLinks"])->name('user.post-links');

    Route::get("user/{id}/delete",[UserController::class,"destroy"])->name('user.delete');
    Route::resource("user",UserController::class);
    
});

Route::group(['middleware'=>['auth','role:doctor'],'prefix'=>'doctor'],function(){
    Route::get("/apponitment",[DoctorAppointmentController::class,"index"])->name('doctor.apponitment');
    Route::get("/",[DoctorHomeController::class,"index"])->name('home');
    Route::resource("profile",DoctorProfileController::class);
    Route::get("profile/{id}/delete",[DoctorProfileController::class,'destroy'])->name("profile.delete");
    Route::get("/",[DoctorHomeController::class,"index"]);
});

Route::group(['middleware'=>['auth','role:patient'],'prefix'=>'patient'],function(){
    Route::get("/",[PatientHomeController::class,"index"])->name('home');
    Route::resource("profile",PatientProfileController::class);
    //Route::get("profile",[PatientProfileController::class,'index'])->name("patient-profile");
//    Route::post("profile",[PatientProfileController::class,'store'])->name("profile.store");
//    Route::put("profile",[PatientProfileController::class,'update'])->name("patient.profile.update");
    Route::get("profile/{id}/delete",[PatientProfileController::class,'destroy'])->name("profile.delete");
    Route::get("/",[PatientHomeController::class,"index"]);
});

Route::get("doctor-register",[RegisterController::class,"doctorRegister"]);
Route::post("doctor-register",[RegisterController::class,'postDoctorRegister'])->name('doctor-register');

Route::get("patient-register",[RegisterController::class,'patientRegister']);
Route::post('patient-register',[RegisterController::class,'postPatientRegister'])->name('patient-register');

require __DIR__.'/auth.php';
