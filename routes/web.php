<?php
use App\Http\Controllers\{
    HomepageController,
    TestController,
    ArticleController,
    UserController,
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
Route::get('/add-article', [ArticleController::class,'create'])->name('add_article');
Route::post('/api/articles', [ArticleController::class,'store'])->name('articles_store');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register_view');
Route::post('/api/user', [UserController::class,'register'])->name('register');

