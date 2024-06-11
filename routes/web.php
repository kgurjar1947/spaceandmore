<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CSVController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[WebsiteController::class,'index']);
Route::get('/residential_details/{id}',[WebsiteController::class,'residential_details']);
Route::get('/commercial_details/{id}',[WebsiteController::class,'commercial_details']);
Route::get('/basic_details/{id}',[WebsiteController::class,'basic_details']);

Route::match(['get','post'],'/propertie_enq',[WebsiteController::class,'propertie_enq'])->name('propertie.enq');

Route::match(['get','post'],'/propertie_form',[WebsiteController::class,'propertie_form'])->name('propertie.form');

Route::match(['get','post'],'/new_propertie_form',[WebsiteController::class,'new_propertie_form'])->name('new.propertie.form');

Route::match(['get','post'],'/enquiryform',[WebsiteController::class,'enquiryform'])->name('enquiryform');

Route::match(['get','post'],'/propertie_form_new',[WebsiteController::class,'propertie_form_new'])->name('propertie_form_new');


Route::get('/aboutus',[WebsiteController::class,'aboutus']);
Route::get('/business-parks',[WebsiteController::class,'business_parks']);
Route::get('/property-management',[WebsiteController::class,'propertie_management']);
Route::get('/property-consulting',[WebsiteController::class,'property_consulting']);
Route::match(['get','post'],'/contactus',[WebsiteController::class,'contactus'])->name('contactus');
Route::get('/viewcatsub/{id}/{id2}',[WebsiteController::class,'viewcatsub']);
Route::get('/viewsub/{id}/{id2}',[WebsiteController::class,'new_subview']);
Route::get('/city/{id}/{id2?}',[WebsiteController::class,'viewcity'])->name('viewcity');
Route::get('/statusofproperty/{id?}/{id2?}',[WebsiteController::class,'viewstatusofproperty'])->name('viewstatusofproperty');

Route::match(['get','post'],'/fitters/{id}',[WebsiteController::class,'viewfitter'])->name('viewfitter');
// Route::get('/admin',[AdminController::class,'adminlogin']);
// Route::get('/setsession/{id}',[AdminController::class,'setsession']);
// Route::get('/logout',[AdminController::class,'logout']);

Route::get('/login', function () { return redirect('auth.login')->name('login');});
Route::get('forget-password', [ForgotPasswordController::class, 'ForgetPassword'])->name('ForgetPasswordGet');
Route::post('forget-password', [ForgotPasswordController::class, 'ForgetPasswordStore'])->name('ForgetPasswordPost');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'ResetPassword'])->name('ResetPasswordGet');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('ResetPasswordPost');

Auth::routes();
//Route::get('/logout', function (){ auth()->logout(); Session()->flush(); return Redirect::to('/');})->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::match(['get','post'],'/export-csv/{id}',[CSVController::class,'exportCSV'])->name('admin.export.csv');
Route::match(['get','post'],'/approve-property-export-csv',[CSVController::class,'approval_exportCSV'])->name('admin.approve_property.csv');

Route::match(['get','post'],'/favourites-property-export-csv',[CSVController::class,'host_exportCSV'])->name('admin.favourites.csv');

Route::post('/disable-property-export-csv',[CSVController::class,'disableproperty'])->name('admin.disable.csv');

Route::post('/admin-all-export-csv',[CSVController::class,'allproperty'])->name('admin.all.export.csv');

Route::post('/admin-enquires-csv',[CSVController::class,'enquires'])->name('admin.enquires.export.csv');

Route::post('/admin-contacts-csv',[CSVController::class,'contacts'])->name('admin.contacts.export.csv');
/*------------------------------------------
--------------------------------------------
All  Super Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' => 'super-admin', 'middleware' => ['auth', 'user-access:super_admin']], function(){
Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/category',[AdminController::class,'category'])->name('admin.category');
Route::get('/add_category',[AdminController::class,'add_category'])->name('admin.add.category');
Route::get('/edit_category/{id}',[AdminController::class,'edit_category'])->name('admin.edit.category');
Route::get('/delete_category/{id}',[AdminController::class,'delete_category'])->name('admin.delete.category');
Route::get('/delete_sub_category/{id}',[AdminController::class,'delete_sub_category'])->name('admin.delete.sub.category');

Route::get('/add_property',[AdminController::class,'add_property'])->name('admin.add.property');
Route::get('/approve_property',[AdminController::class,'edit_property'])->name('admin.approve.property');
Route::get('/update_property/{id}/{id2}',[AdminController::class,'update_property'])->name('admin.update.property');
Route::post('/status_favourites_property',[AdminController::class,'status_favourites_property'])->name('admin.status.favourites.property');

/*------------------------------------------------------------*/
Route::post('/add_residential_property',[AdminController::class,'SubmitResidential'])->name('admin.add.residential');
Route::post('/add_commercial_property',[AdminController::class,'SubmitCommercial'])->name('admin.add.commercial');
Route::post('/add_basic_property',[AdminController::class,'SubmitBasic'])->name('admin.add.basic');

/* ----------------------------------------------------------*/

Route::post('/status_property',[AdminController::class,'status_property'])->name('admin.status.property');
Route::post('/status_approval_property',[AdminController::class,'status_approval_property'])->name('admin.approval.property');

Route::post('/add_propertycatsub',[AdminController::class,'add_propertycatsub'])->name('admin.cat.sub.property');
Route::get('/enquires',[AdminController::class,'enquires'])->name('admin.enquires');

Route::get('/delete_enquires/{id}',[AdminController::class,'delete_enquires'])->name('admin.delete.enquires');
Route::get('/delete_restore/{id}',[AdminController::class,'delete_restore'])->name('admin.delete.restore');
Route::get('/delete_permanently/{id}',[AdminController::class,'delete_permanently'])->name('admin.delete.permanently');

Route::get('/delete_sub_restore/{id}',[AdminController::class,'delete_sub_restore'])->name('admin.delete.sub.restore');
Route::get('/delete_sub_permanently/{id}',[AdminController::class,'delete_sub_permanently'])->name('admin.delete.sub.permanently');

Route::get('/contacts',[AdminController::class,'contacts'])->name('admin.contacts');
Route::get('/delete_contacts/{id}',[AdminController::class,'delete_contacts'])->name('admin.delete.contacts');
Route::get('/listing',[AdminController::class,'listing'])->name('admin.list.property');
Route::get('/viewproperty/{id}',[AdminController::class,'viewproperty'])->name('admin.view.property');
Route::get('/viewpropertydetails/{id}/{id2}',[AdminController::class,'viewpropertydetails'])->name('admin.details.property');
Route::get('/favourites',[AdminController::class,'favouritesproperty'])->name('admin.favourites.property');
Route::get('/disable',[AdminController::class,'disableproperty'])->name('admin.disable.property');

Route::get('/delete-image/{id}/{id2}/{id3}',[AdminController::class,'delete_image'])->name('admin.image.delete');
Route::get('/delete-file/{id}/{id2}/{id3}',[AdminController::class,'delete_file'])->name('admin.file.delete');


Route::get('/location',[AdminController::class,'location'])->name('admin.location');
Route::get('/add_location',[AdminController::class,'add_location'])->name('admin.add.location');
Route::get('/edit_location/{id}',[AdminController::class,'edit_location'])->name('admin.edit.location');
Route::get('/delete_location/{id}',[AdminController::class,'delete_location'])->name('admin.delete.location');


Route::get('/executive_name',[AdminController::class,'executive_name'])->name('admin.executive.name');
Route::get('/add_executive_name',[AdminController::class,'add_executive_name'])->name('admin.add.executive.name');
Route::get('/edit_executive_name/{id}',[AdminController::class,'edit_executive_name'])->name('admin.edit.executive.name');
Route::get('/delete_executive_name/{id}',[AdminController::class,'delete_executive_name'])->name('admin.delete.executive.name');


Route::get('/restore-list',[AdminController::class,'restorelist'])->name('admin.restore.list');

Route::get('/bhk',[AdminController::class,'bhk'])->name('admin.bhk');
Route::get('/add_bhk',[AdminController::class,'add_bhk'])->name('admin.add.bhk');
Route::get('/edit_bhk/{id}',[AdminController::class,'edit_bhk'])->name('admin.edit.bhk');
Route::get('/delete_bhk/{id}',[AdminController::class,'delete_bhk'])->name('admin.delete.bhk');

Route::get('/floor',[AdminController::class,'floor'])->name('admin.floor');
Route::get('/add_floor',[AdminController::class,'add_floor'])->name('admin.add.floor');
Route::get('/edit_floor/{id}',[AdminController::class,'edit_floor'])->name('admin.edit.floor');
Route::get('/delete_floor/{id}',[AdminController::class,'delete_floor'])->name('admin.delete.floor');

Route::get('/facing',[AdminController::class,'facing'])->name('admin.facing');
Route::get('/add_facing',[AdminController::class,'add_facing'])->name('admin.add.facing');
Route::get('/edit_facing/{id}',[AdminController::class,'edit_facing'])->name('admin.edit.facing');
Route::get('/delete_facing/{id}',[AdminController::class,'delete_facing'])->name('admin.delete.facing');



Route::match(['get','post'],'/add-agent',[AgentController::class,'add'])->name('admin.add.agent');
Route::match(['get','post'],'/submit-agent',[AgentController::class,'create_agent'])->name('admin.submit.agent');
Route::get('/agent-edit/{id}',[AgentController::class,'edit_agent'])->name('admin.edit.agent');
Route::match(['get','post'],'/agent-submit-edit/{id}',[AgentController::class,'edit_submit_agent'])->name('admin.submit.edit.agent');
Route::get('/agent-list',[AgentController::class,'index'])->name('admin.agent.list');

Route::get('/agent-delete/{id}',[AgentController::class,'destroy'])->name('admin.delete.agent');
});

Route::group(['prefix' => 'user-admin', 'middleware' => ['auth', 'user-access:admin']], function(){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('user.admin.dashboard');   
    Route::get('/category',[AdminController::class,'category'])->name('user.admin.category');
    Route::get('/add_category',[AdminController::class,'add_category'])->name('user.admin.add.category');
    Route::get('/edit_category/{id}',[AdminController::class,'edit_category'])->name('user.admin.edit.category');
    Route::get('/delete_category/{id}',[AdminController::class,'delete_category'])->name('user.admin.delete.category');

    Route::get('/add_property',[AdminController::class,'add_property'])->name('user.admin.add.property');
Route::get('/edit_property',[AdminController::class,'edit_property'])->name('user.admin.edit.property');
Route::get('/update_property/{id}/{id2}',[AdminController::class,'update_property'])->name('user.admin.update.property');
Route::post('/status_favourites_property',[AdminController::class,'status_favourites_property'])->name('user.admin.status.favourites.property');

Route::post('/status_property',[AdminController::class,'status_property'])->name('user.admin.status.property');
Route::post('/add_propertycatsub',[AdminController::class,'add_propertycatsub'])->name('user.admin.cat.sub.property');

Route::get('/listing',[AdminController::class,'listing'])->name('user.admin.list.property');
Route::get('/viewproperty/{id}',[AdminController::class,'viewproperty'])->name('user.admin.view.property');
Route::get('/viewpropertydetails/{id}/{id2}',[AdminController::class,'viewpropertydetails'])->name('user.admin.details.property');
Route::get('/favourites',[AdminController::class,'favouritesproperty'])->name('user.admin.favourites.property');

Route::get('/delete-image/{id}/{id2}/{id3}',[AdminController::class,'delete_image'])->name('user.admin.image.delete');
Route::get('/delete-file/{id}/{id2}/{id3}',[AdminController::class,'delete_file'])->name('user.admin.file.delete');
Route::get('/disable',[AdminController::class,'disableproperty'])->name('user.disable.property');

/*------------------------------------------------------------*/
Route::post('/add_residential_property',[AdminController::class,'SubmitResidential'])->name('user.add.residential');
Route::post('/add_commercial_property',[AdminController::class,'SubmitCommercial'])->name('user.add.commercial');
Route::post('/add_basic_property',[AdminController::class,'SubmitBasic'])->name('user.add.basic');

/* ----------------------------------------------------------*/


});
/*Route::get('/subcategory',[AdminController::class,'subcategory']);
Route::get('/add_sub_category',[AdminController::class,'add_sub_category']);*/

/*------------------------------------------
--------------------------------------------
End  Super Admin Routes List
--------------------------------------------
--------------------------------------------*/


