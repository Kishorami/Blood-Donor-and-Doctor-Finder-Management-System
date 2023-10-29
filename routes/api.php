<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\DonorController;

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


Route::post("donor-register", [DonorController::class, "donorRegister"]);
Route::post("verifyregistration", [DonorController::class, "VerifyDonor"]);
Route::post("login", [DonorController::class, "login"]);

Route::post("blood-request", [DonorController::class, "bloodRequest"]);


Route::get("health-news", [DonorController::class, "healthNews"]);
Route::get("news-details", [DonorController::class, "newsDetails"]);

Route::get("get-division", [DonorController::class, "getDivision"]);
Route::post("get-district", [DonorController::class, "getDistricts"]);
Route::post("get-thana", [DonorController::class, "getThana"]);

Route::post("forget-password", [DonorController::class, "forgetPassword"]);
Route::post("update-forget-password", [DonorController::class, "updateForgetPassword"]);

Route::get("get-faqs", [DonorController::class, "getFaq"]);
Route::get("get-aboutus", [DonorController::class, "getAboutUs"]);

Route::get("doctor-speciality", [DonorController::class, "doctorSpeciality"]);
Route::post("find-doctor", [DonorController::class, "findDoctor"]);

Route::post("find-hospital", [DonorController::class, "findHospital"]);


Route::get("emergency-numbers", [DonorController::class, "emergencyNumbers"]);
Route::post("find-ambulance", [DonorController::class, "findAmbulance"]);
Route::post("find-bloodbank", [DonorController::class, "findBloodBank"]);
Route::post("find-funeralinfo", [DonorController::class, "findFuneralinfo"]);
Route::post("find-graveyardinfo", [DonorController::class, "findGraveyardinfo"]);
Route::post("find-socialinfo", [DonorController::class, "findSocialinfo"]);
Route::post("find-theraphycenterinfo", [DonorController::class, "findTheraphyCenterinfo"]);

Route::post("add-volunteer", [DonorController::class, "addVolunteer"]);
Route::post("add-donor", [DonorController::class, "addDonor"]);


Route::get("blood-info", [DonorController::class, "bloodInfo"]);
Route::get("blood-info-details", [DonorController::class, "bloodInfoDetails"]);


Route::group(["middleware" => ["auth:sanctum"]], function() {
    
    Route::get("profile", [DonorController::class, "profile"]);
    Route::get("logout", [DonorController::class, "logout"]);

    Route::post("updateProfile", [DonorController::class, "updateProfile"]);

    Route::post("donor-blog", [DonorController::class, "donorBlog"]);
    Route::post("share-feelings", [DonorController::class, "shareFeelings"]);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
