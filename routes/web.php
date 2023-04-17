<?php

use App\Http\Controllers\SimpleExcelController;
use App\Http\Controllers\SocialiteController;
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

# Socialite URLs

// La page où on présente les liens de redirection vers les providers
Route::get("/", [SocialiteController::class, 'loginRegister']);

// La redirection vers le provider
Route::get("redirect/{provider}", [SocialiteController::class, 'redirect'])->name('socialite.redirect');

// Le callback du provider
Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');

Route::get('dashboard', [SocialiteController::class, 'home'])->name('home');

// Importer un fichier Excel
Route::post("simple-excel/import", [SimpleExcelController::class, 'import'])->name('excel.import');

// Exporter un fichier Excel
Route::post("simple-excel/export", [SimpleExcelController::class, 'export'])->name('excel.export');
