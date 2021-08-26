<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\web\ApiWebController;
use App\Http\Controllers\dashboard\TagController;
use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\dashboard\CategoryController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\dashboard\PostCommentController;

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
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dashboard/post', PostController::class);
Route::post('dashboard/post/{post}/image', [PostController::class,'image'])->name('post.image');
Route::resource('dashboard/category', CategoryController::class);
Route::resource('dashboard/tag', TagController::class);
Route::resource('dashboard/user', UserController::class);

Route::resource('dashboard/contact', ContactController::class)->only([
    'index','show','destroy',
]);
Route::resource('dashboard/archivo', ArchivoController::class)->except([
    'edit','update','show',
]);
Route::resource('dashboard/post-comment', PostCommentController::class)->only([
    'index','show','destroy',
]);

Route::get('dashboard/archivo/download/{archivo}', [ArchivoController::class, 'download'])->name('archivo.download');
Route::get('dashboard/archivo/{post}/post',[ArchivoController::class,'post'])->name('archivo.post');

Route::get('dashboard/post-comment/{post}/post',[PostCommentController::class,'post'])->name('post-comment.post');
Route::post('dashboard/post-comment/process/{postComment}',[PostCommentController::class,'process']);

Route::get('/home', [ApiWebController::class,'index'])->name('index');
Route::get('/home/detail/{id}', [ApiWebController::class,'detail']);
Route::get('home/detail/{archivo}', [ArchivoController::class, 'download']);
Route::get('/home/post-category/{id}', [ApiWebController::class,'post_category']);
Route::get('/home/contact', [ApiWebController::class,'contact']);
Route::get('/home/categories', [ApiWebController::class,'categories']);

Auth::routes(['verify' => true]);

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('login/social/{provider}', [LoginController::class, 'redirectToProvider']);
//Route::get('login/social/callback/{provider}', [LoginController::class, 'handleProviderCallback']);
