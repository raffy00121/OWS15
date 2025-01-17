<?php
// all external routes are put here

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/student.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// test route only
Route::get('/test', [GoogleAuthController::class, 'showTest'])
    ->name('test');

// google sso route
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])
    ->name('google_redirect');
Route::get('/student/auth/google/callback', [GoogleAuthController::class, 'callback'])
    ->name('google_callback');

// other external routes
Route::get('/data-privacy', [Controller::class, 'showDataPrivacyPolicy'])
    ->name('data_privacy');
Route::get('/terms-conditions', [Controller::class, 'showTermsAndConditions'])
    ->name('terms_conditions');
