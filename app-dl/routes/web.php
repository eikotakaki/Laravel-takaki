<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\Auth\AuthController;//

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


Route::group(['middleware' => ['guest']], function () {//ログイン失敗時
    //ログインフォームの表示/ログイン処理
    Route::get('/', [AuthController::class, 'showLogin'])->name('showLogin');
    Route::post('/', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth']], function () {//ログイン成功時
    //マイページ表示/ログアウト
    Route::get('/mypage', [AuthController::class, 'showMypage'])->name('showMypage');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

//一覧画面を表示
Route::get('/list', [BlogsController::class, 'showList'])->name('blogs');


//記事詳細を表示
Route::get('/blog/{id}',[BlogsController::class, 'showDetail'])->name('show');


//記事投稿フォーム表示/記事登録
Route::get('/blog', [BlogsController::class, 'showCreate'])->name('create');
Route::post('/blog', [BlogsController::class, 'exeStore'])->name('store');


//編集画面を表示/更新情報登録/記事削除 
Route::get('/blog/edit/{id}',[BlogsController::class, 'showEdit'])->name('edit');
Route::post('/blog/update/{blog}',[BlogsController::class, 'exeUpdate'])->name('update');
Route::post('/blog/delete/{blog}',[BlogsController::class, 'exeDelete'])->name('delete');//postはexeをつける

