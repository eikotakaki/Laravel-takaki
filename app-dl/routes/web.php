<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;

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

//一覧画面を表示
Route::get('/', [BlogsController::class, 'showList'])->name('blogs');

//記事詳細を表示
Route::get('/blog/{id}',//{id}は$idを入れれる
[BlogsController::class, 'showDetail'])->name('show');

//記事投稿フォーム表示
Route::get('/blog', [BlogsController::class, 'showCreate'])->name('create');

//記事登録
Route::post('/blog', [BlogsController::class, 'exeStore'])->name('store');

//編集画面を表示
Route::get('/blog/edit/{id}',[BlogsController::class, 'showEdit'])->name('edit');
Route::post('/blog/update/{blog}',[BlogsController::class, 'exeUpdate'])->name('update');

//記事削除 
Route::post('/blog/delete/{blog}',[BlogsController::class, 'exeDelete'])->name('delete');//postはexeをつける

