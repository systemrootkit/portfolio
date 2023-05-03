<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[IndexController::class,'index'])->name('index.index');
Route::get('/login',[UserAuthController::class,'sign_in'])->name('user.sign_in');
Route::get('/auth',[UserAuthController::class,'AuthenticateUser'])->name('user.sign_in');
Route::post('contact/send',[AdminController::class,'contactSend'])->name('awards.send');

Route::group((['middleware'=>['auth','isAdmin']]),function(){
    Route::get('dashboard',[AdminController::class,'dashboard']);
    Route::get('dashboard/logout',[UserAuthController::class,'logout'])->name('user.logout');
    Route::get('dashboard/profile',[AdminController::class,'profileData'])->name('user.profileData');
    Route::post('dashboard/addData',[AdminController::class,'addData'])->name('user.addData');
    Route::get('dashboard/socialmedia',[AdminController::class,'showCommunityLinks'])->name('user.showCommunityLinks');
    Route::post('dashboard/links',[AdminController::class,'community_links'])->name('user.links');
    Route::get('experienceDetails',[AdminController::class,'experienceDetails'])->name('user.experienceDetails');
    Route::post('experienceStore',[AdminController::class,'experienceStore'])->name('user.experienceStore');
    Route::get('educationDetails',[AdminController::class,'educationDetails'])->name('user.educationDetails');
    Route::post('education/store',[AdminController::class,'educationStore'])->name('user.educationStore');
    Route::get('experience/data',[AdminController::class,'experienceData'])->name('user.experience_data');
    Route::get('experience/update',[AdminController::class,'experienceUpdate'])->name('user.experience_update');
    Route::get('experience/delete',[AdminController::class,'experienceDelete'])->name('user.delete');
    Route::get('education/data',[AdminController::class,'educationData'])->name('user.education_data');
    Route::get('education/update',[AdminController::class,'educationUpdate'])->name('user_edu.education_update');
    Route::get('education/delete',[AdminController::class,'educationDelete'])->name('user_edu.delete');
    Route::get('skills/add',[AdminController::class,'skillsAdd']);
    Route::post('skills/addData',[AdminController::class,'skillsAdded'])->name('skill.add');
    Route::get('skills/remove',[AdminController::class,'skillsRemove'])->name('skill.remove');
    Route::get('interest/show',[AdminController::class,'interestData'])->name('interest.show');
    Route::post('interest/add',[AdminController::class,'interestDataAdd'])->name('interest.add');
    Route::get('awards/add',[AdminController::class,'awards'])->name('awards.add');
    Route::post('awards/create',[AdminController::class,'addAwards'])->name('awards.create');
    Route::get('awards/show',[AdminController::class,'addShow'])->name('awards.show');
    Route::get('awards/update',[AdminController::class,'awardUpdate'])->name('awards.update');
    Route::get('awards/delete',[AdminController::class,'awardDelete'])->name('awards.delete');
    Route::get('awards/contact',[AdminController::class,'contactUs'])->name('awards.contact');
    Route::get('contact/del',[AdminController::class,'delBtn'])->name('contact.del');
    Route::get('map',[AdminController::class,'addMap'])->name('map.add');

});
