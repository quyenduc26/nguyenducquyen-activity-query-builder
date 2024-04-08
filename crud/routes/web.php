<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sql', [PostController::class, 'getPostMySQL']);
Route::get('/pdo', [PostController::class, 'getPostPDO']);
Route::get('/updatesql/{title}/{description}', [PostController::class, 'updatePostMySQL']);
// Route::match(['get', 'post'], '/updatesql/{title}/{description}', [PostController::class, 'updatePostMySQL']);
// Route::match(['get', 'post'], '/updatesql/{title}/{description}', [PostController::class, 'updatePostMySQL']);

Route::get('/updatepdo/{title}/{description}', [PostController::class, 'updatePostPDO']);