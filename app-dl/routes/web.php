<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\Auth\AuthController;//
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PresController;

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


Route::group(['middleware' => ['guest']], function () {//未　ログイン

    //top disp : 
    //Route::get('/', [AuthController::class, 'showTop'])->name('showTop');

    //pre form ー> disp : pre
    Route::get('/pre' , [PresController::class, 'showPre'])->name('showPre');
    Route::post('/pre', [PresController::class, 'exeStore'])->name('storePre');

    //register ー> form disp : register
    Route::get('/register/{token}' ,[PresController::class, 'showRegister'])->name('showRegister')->where('token','[A-Za-z0-9]+');
    Route::post('/register',[AuthController::class, 'exeStore'])->name('storeRegister');
    //'/register/?urltoken={token}'

    //login form ー> disp : login
    Route::get('/login', [AuthController::class , 'showLogin'])->name('showLogin');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

});


Route::group(['middleware' => ['auth']], function () {//ログイン成功時
    //mypage ー> disp : logout
    Route::get('/mypage', [AuthController::class , 'showMypage'])->name('showMypage');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //setting ー> disp : usernickname update : password update
    Route::get('/setting', [AuthController::class, 'showSetting'])->name('showSetting');
    Route::post('/name/update', [AuthController::class, 'nameupdate'])->name('nameupdate');
    Route::post('/pass/update', [AuthController::class, 'passupdate'])->name('passupdate');


    //brog_form ー> disp : create
    Route::get('/blog', [BlogsController::class, 'showCreate'])->name('create');
    Route::post('/blog', [BlogsController::class, 'exeStore'])->name('store');
    //blog edit form  ー>　disp : update 
    Route::get('/blog/edit/{id}',[BlogsController::class, 'showEdit'])->name('edit');
    Route::post('/blog/update/{blog}',[BlogsController::class, 'exeUpdate'])->name('update');
    //blog ー>  delete 
    Route::post('/blog/delete/{blog}',[BlogsController::class, 'exeDelete'])->name('delete');//postはexeをつける


    //list disp
    Route::get('/list', [BlogsController::class, 'showList'])->name('blogs');


    //blog ditaile disp & comment_form disp
    Route::get('/blog/{id}',[BlogsController::class, 'showDetail'])->name('showBlogs');
    //comment : store
    Route::post('/blog/{id}', [CommentsController::class, 'exeStore'])->name('storeComment');//


    //comment edit form disp : update
    Route::get('/comment/edit/{id}',[CommentsController::class, 'showEdit'])->name('editComment');
    Route::post('/comment/update/{blog}',[CommentsController::class, 'exeUpdate'])->name('updateComment');
    //comment : delete 
    Route::post('/comment/delete/{blog}',[CommentsController::class, 'exeDelete'])->name('deleteComment');//postはexeをつける


});

