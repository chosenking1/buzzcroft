<?php
use App\Http\Controllers\{
 HomepageController,
 ArticleController,
 CommentController,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/api/articles', 'ArticleController@store');
Route::post('/add_comment', [CommentController::class, 'create_comment'])->name('comments.store');

// Route::get('/',[HomepageController::class, 'index'])->name('homepage');
