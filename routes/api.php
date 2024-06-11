<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/adminlogin',[AdminController::class,'login']);
Route::match(['get','post'],'/addnewcategory',[AdminController::class,'addnewcategory']);

Route::match(['get','post'],'/addnewlocation',[AdminController::class,'addnewlocation']);
Route::match(['get','post'],'/addnewexecutive_name',[AdminController::class,'addnewexecutive_name']);

Route::match(['get','post'],'/addnewbhk',[AdminController::class,'addnewbhk']);

Route::match(['get','post'],'/addnewfloor',[AdminController::class,'addnewfloor']);

Route::match(['get','post'],'/addnewfacing',[AdminController::class,'addnewfacing']);


Route::post('/addnewsubcategory',[AdminController::class,'addnewsubcategory']);
Route::post('/getsubcategory',[AdminController::class,'getsubcategory']);
Route::post('/addnewproperty',[AdminController::class,'addnewproperty']);
Route::post('/addbasicproperty',[AdminController::class,'addbasicproperty']);

Route::post('/addnewpropertycom',[AdminController::class,'addnewpropertycom']);

/*
  property Edit controller Route
*/
Route::post('/editnewproperty',[AdminController::class,'editnewproperty']);
Route::post('/editbasicproperty',[AdminController::class,'editbasicproperty']);
Route::post('/editnewpropertycom',[AdminController::class,'editnewpropertycom']);

Route::post('/editbhknow',[AdminController::class,'editbhknow']);
Route::post('/editfloornow',[AdminController::class,'editfloornow']);
Route::post('/editfacingnow',[AdminController::class,'editfacingnow']);

/*
  End property Edit controller Route*/

Route::post('/delete_subcategory',[AdminController::class,'delete_subcategory']);

Route::post('/delete_location',[AdminController::class,'delete_location']);

Route::post('/editcategorynow',[AdminController::class,'editcategorynow']);

Route::post('/editlocationnow',[AdminController::class,'editlocationnow']);

Route::post('/editexecutive_namenow',[AdminController::class,'editexecutive_namenow']);

Route::post('/getproperty',[AdminController::class,'getproperty']);

Route::post('/enquiryform',[AdminController::class,'enquiryform']);



