<?php

use App\Http\Controllers\auth\LogInUserController;
use App\Http\Controllers\auth\LogOutUserController;
use App\Http\Controllers\auth\RegisterUserController;
use App\Http\Controllers\Category\CreateCategoryController;
use App\Http\Controllers\Category\DeleteCategoryController;
use App\Http\Controllers\Category\GetAllCategoryController;
use App\Http\Controllers\Category\SearchCategoryController;
use App\Http\Controllers\Category\UpdateCategoryController;
use App\Http\Controllers\Pet\CreatePetController;
use App\Http\Controllers\Pet\DeletePetController;
use App\Http\Controllers\Pet\GetAllPetController;
use App\Http\Controllers\Pet\SearchPetController;
use App\Http\Controllers\Pet\UpdatePetController;
use App\Http\Controllers\Status\CreateStatusController;
use App\Http\Controllers\Status\DeleteStatusController;
use App\Http\Controllers\Status\GetAllStatusController;
use App\Http\Controllers\Status\SearchStatusController;
use App\Http\Controllers\Status\UpdateStatusController;
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

Route::middleware(['api', 'auth:sanctum'])->group(function () {
  Route::get('/user', function (Request $request) {
    return $request->user();
  });
  Route::post('/auth/logout', LogOutUserController::class)->name('auth.logout');

  Route::get('/pets', GetAllPetController::class)->name('pet.get_all');
  Route::get('/pets/{pet}', SearchPetController::class)->name('pet.search');
  Route::post('/pets', CreatePetController::class)->name('pet.create');
  Route::patch('/pets/{pet}', UpdatePetController::class)->name('pet.update');
  Route::delete('/pets/{pet}', DeletePetController::class)->name('pet.delete');

  Route::get('/statuses', GetAllStatusController::class)->name('status.get_all');
  Route::get('/statuses/{status}', SearchStatusController::class)->name('status.search');
  Route::post('/statuses', CreateStatusController::class)->name('status.create');
  Route::patch('/statuses/{status}', UpdateStatusController::class)->name('status.update');
  Route::delete('/statuses/{status}', DeleteStatusController::class)->name('status.delete');

  Route::get('/categories', GetAllCategoryController::class)->name('category.get_all');
  Route::get('/categories/{category}', SearchCategoryController::class)->name('category.search');
  Route::post('/categories', CreateCategoryController::class)->name('category.create');
  Route::patch('/categories/{category}', UpdateCategoryController::class)->name('category.update');
  Route::delete('/categories/{category}', DeleteCategoryController::class)->name('pet.delete');
});

Route::middleware(['api'])->group(function () {
  Route::post('/auth/register', RegisterUserController::class)->name('auth.register');
  Route::post('/auth/login', LogInUserController::class)->name('auth.login');
});
