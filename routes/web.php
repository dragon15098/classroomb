<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMessageController;
use App\Models\User;
use App\Models\Job;

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

// USER

Route::redirect('/', '/login');

Route::get('/login', function () {
    return view('user.login');
});

Route::post('/create_user', [UserController::class, 'createNewUser']);

Route::post('login', [UserController::class, 'authenticate']);

Route::post('/user/update', [UserController::class, 'updateInfo']);

Route::post('/change_password', [UserController::class, 'updatePassword']);

Route::get('/delete_user/{id}', [UserController::class, 'deleteUser']);

Route::get('/create_user', function(){
    return view('user.add_user');
});

Route::get('/user', function(){
    return view('user.user',  ['users' => User::all() ]);
});

Route::get('/user/{id}', function($id){
    return view('user.user_detail',  ['user' => User::find($id)]);
});

Route::get('/change_password/{id}',function($id){
    return view('user.update_password', ['id'=> $id]);
});


// MESSAGE

Route::get('/user/message/{id}', [UserMessageController::class, 'getUserMessage']);

Route::post('/user/message/create', [UserMessageController::class, 'createNewUserMessage']);

Route::post('/user/message/update', [UserMessageController::class, 'updateMessage']);

Route::post('/user/message/delete', [UserMessageController::class, 'deleteMessage']);

// JOB

Route::get('/job/{id}', [JobController::class, 'showJobDetail']);


Route::get('/job/download/{jobId}', [JobController::class, 'downloadJobFile']);

Route::get('/create/job', function(){
    return view('job.create_job');
});

Route::post('/job/create', [JobController::class, 'createNewJob']);

Route::post('/job/submit', [JobController::class, 'submitJob']);

Route::get('/user_file/download_my_file/{jobId}', [JobController::class, 'downloadMyFile']);

Route::get('/user_file/download/{jobId}/{userId}', [JobController::class, 'downloadUserFile']);

Route::get('/job', function(){
    return view('job.job', ['jobs' => Job::all()]);
});

// CHALLENGE

Route::get('/challenge',  function(){
    return view('challenge.challenge');
});

Route::get('/challenge/{id}',  function(){
    return view('challenge.challenge_detail');
});

Route::get('/create/challenge/',  function(){
    return view('challenge.create/challenge');
});
