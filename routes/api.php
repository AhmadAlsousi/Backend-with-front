
<?php

use App\Http\Controllers\Category\CreateCategoryController;
use App\Http\Controllers\SubCategory\SubCategoryController;
use App\Http\Controllers\Users\LoginController;
use App\Http\Controllers\Users\RegisterController;
use App\Http\Controllers\Users\verifyAccountController;
// use App\Http\Controllers\Users\VideoController;
// use App\Http\Controllers\VideoController;

use Illuminate\Support\Facades\Route;

//Authentication::
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/verifiy',[verifyAccountController::class, 'verify']);
Route::post('/verify/whatsup', [verifyAccountController::class, 'whatsup']);
Route::get('/token', [LoginController::class, 'generateCsrfToken']);

// Category::

Route::post('/Category/Create',[CreateCategoryController::class,'create']);
Route::get('/Category',[CreateCategoryController::class,'index']);
//subcategory::
Route::post('/SubCategory/Create',[SubCategoryController::class,'create']);
Route::get('/SubCategory',[SubCategoryController::class,'index']);
Route::get('/SubCategoryTag',[SubCategoryController::class,'filter']);


// Route::post('/videos/chunk', [VideoController::class, 'store']);


// Route::post('/test', function () {
//     return 'OK';
// })->middleware('my.middleware');

//Category::

// generateCsrfToken
// Route::get('user', function () {
//     return "Hello";
// });

// Route::get('/csrf-token', function () {
//     return response()->json([
//         'token' => csrf_token(),
//     ]);
// });
