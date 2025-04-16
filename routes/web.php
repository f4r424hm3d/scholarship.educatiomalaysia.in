<?php


use App\Http\Controllers\front\HomeFc;
use App\Http\Controllers\front\LibiaLandingPageFc;
use App\Http\Controllers\front\RegistrationFormC;
use Illuminate\Support\Facades\Artisan;
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

//Reoptimized class loader:
Route::get('/optimize', function () {
  $exitCode = Artisan::call('optimize');
  return '<h1>Reoptimized class loader</h1>';
});
Route::get('/f/optimize', function () {
  $exitCode = Artisan::call('optimize');
  return true;
});


//For MIgrate:
Route::get('/migrate', function () {
  $exitCode = Artisan::call('migrate');
  return '<h1>Migrated</h1>';
});
Route::get('/f/migrate', function () {
  $exitCode = Artisan::call('migrate');
  return true;
});


/* FRONT ROUTES */
//Route::get('/', [LibiaLandingPageFc::class, 'index'])->name('libia.page');
Route::get('/', function () {
  return redirect()->route('libia.page');
});

Route::get('/education-fair-in-libya-2025', [LibiaLandingPageFc::class, 'index'])->name('libia.page');
Route::post('/libia/register', [LibiaLandingPageFc::class, 'register'])->name('libia.register');

Route::get('/education-fair-in-libya-2025-registration', [RegistrationFormC::class, 'index'])->name('registration.form');
Route::post('/register', [RegistrationFormC::class, 'register'])->name('registration');

Route::get('registration-complete', [LibiaLandingPageFc::class, 'thankYou'])->name('thank.you');
Route::get('/download-qr', [LibiaLandingPageFc::class, 'downloadQR'])->name('download.qr');

Route::post('/libia/fetch-program', [LibiaLandingPageFc::class, 'getProgramsByUniversity'])->name('libia.fetch.program');
Route::post('/libia/fetch-courses', [LibiaLandingPageFc::class, 'getCoursesByUniversity'])->name('libia.fetch.courses');

Route::get('privacy-policy', [HomeFc::class, 'privacyPolicy'])->name('pp');
Route::get('terms-and-conditions', [HomeFc::class, 'termsConditions'])->name('tc');
//Route::get('test-popup', [HomeFc::class, 'testPopup']);
// COURSES IN MALAYSIA ROUTES END
