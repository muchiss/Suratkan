<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::fallback(function () {
    return '<h1>Sepuranya, Halaman ini Gak Enek</h1>';
});

// Route::prefix('/admin')->group(function () {
//     Route::get('/cats', function () {
//         return 'Data Kucing';
//     });
//     Route::get('/staffs', function () {
//         return 'Data Staff';
//     });
//     Route::get('/customers', function () {
//         return 'Data Customer';
//     });
// });

Route::get('/', [HalamanController::class, 'index']);
Route::get('/tentang', [HalamanController::class, 'tentang']);
Route::get('/kontak', [HalamanController::class, 'kontak']);

Route::get('/staff', [StaffController::class, 'index']);

Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);
