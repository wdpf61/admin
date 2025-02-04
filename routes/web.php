<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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


   // return view('dashboard');
})->middleware('checkage');;



// Route::prefix('student')->group(function(){
//     Route::get('/', [StudentController::class,'index']);
//     Route::get('create', [StudentController::class,'create']);
//     Route::post('create', [StudentController::class,'store']);
//     Route::get('update/{id}', [StudentController::class,'edit']);
//     Route::post('update', [StudentController::class,'update']);
//     Route::get('delete/{id}', [StudentController::class,'destroy_view']);
//     Route::post('delete', [StudentController::class,'destroy']);
//     Route::post('search', [StudentController::class,'search']);
//     Route::get('show/{id}', [StudentController::class,'show']);
// });
Route::post('student/search', [StudentController::class,'search']);
Route::resource('student', StudentController::class);





