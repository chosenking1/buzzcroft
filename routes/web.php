<?php
use App\Http\Controllers\{
    HomepageController,
    TestController,
    ArticleController,
    UserController,
    AdminController,
    CommentController,
};
use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


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
Route::post('/api/register_user', [UserController::class,'register'])->name('register');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login_view');
Route::post('/api/login_user', [UserController::class,'login'])->name('login');


Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('admin/register', [AdminController::class,'create'])->name('admin.register')->middleware('isAdmin');
Route::post('admin/register_admin', [AdminController::class,'store'])->name('admin.register.store')->middleware('isAdmin');
Route::get('/admin_login', [AdminController::class,'showAdminLoginForm'])->name('admin.login_view');
Route::post('/admin/login_admin', [AdminController::class,'adminLogin'])->name('admin.login')->middleware('isAdmin');

Route::get('admin/removeAdmin/{user}', [AdminController::class,'removeAdmin'])->name('admin.removeAdmin')->middleware('isAdmin');

Route::post('/add_comment', [CommentController::class, 'create_comment'])->name('comments.store')->middleware('web');;
// Route::post('/add_comment','CommentController@create_comment')->name('comments.store');