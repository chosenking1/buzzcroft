<?php
use App\Http\Controllers\{
    HomepageController,
    TestController,
   };
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomepageController::class, 'index'])->name('homepage');
Route::get('test',[TestController::class, 'index'])->name('header');

