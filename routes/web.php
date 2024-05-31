<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

// Router untuk Homepage dan show undangan
Route::get('/', [Controllers\HomeController::class, 'index']);
Route::get('/show/{id}', [Controllers\HomeController::class, 'show'])->name('show');
// Router Buat Ucapan
Route::post('/show/{id}', [Controllers\HomeController::class, 'storeUcapan'])->name('storeUcapan');

//Router RegisterController
Route::get('/register', [Controllers\UserController::class, 'create'])->middleware('guest');
Route::post('/register', [Controllers\UserController::class, 'store']);

//Router LoginController & Logout
Route::get('login', [Controllers\LoginController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('login', [Controllers\LoginController::class, 'authenticate'])->name('login.auth');
Route::post('logout', Controllers\LogoutController::class)->name('logout')->middleware('auth');

//Router Dasboard Undangan
Route::get('undangan', Controllers\DasboardController::class)->name('undangan')->middleware('auth');
Route::get('/undangan', [Controllers\DasboardController::class, 'userInvitationsCount'])->middleware('auth');
Route::delete('/undangan/{id}', [Controllers\DasboardController::class, 'deleteUserInvitations'])->name('undangan.delete')->middleware('auth');

//Router Undangan Controller Untuk membuat undangan
Route::post('/undangan', [Controllers\UndanganController::class, 'store'])->name('undangan.store');

//Router mengarahke setting per-undangan yang di buat oleh user
Route::get('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}', [Controllers\UndanganController::class, 'index'])->name('dashboard.index')->middleware('auth');

//Router MempelaiPria
Route::get('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/Mpria', [Controllers\MpriaController::class, 'create'])->name('mPria')->middleware('auth');
Route::post('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/Mpria', [Controllers\MpriaController::class, 'store'])->name('mPria.store');
Route::put('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/Mpria', [Controllers\MpriaController::class, 'update'])->name('mPria.update');

// Router MempelaiWanita
Route::get('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/Mwanita', [Controllers\MwanitaController::class, 'create'])->name('mWanita')->middleware('auth');
Route::post('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/Mwanita', [Controllers\MwanitaController::class, 'store'])->name('mWanita.store');
Route::put('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/Mwanita', [Controllers\MwanitaController::class, 'update'])->name('mWanita.update');

// Router Acara
Route::get('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/Acara', [Controllers\AcaraController::class, 'create'])->name('acara')->middleware('auth');
Route::post('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/Acara', [Controllers\AcaraController::class, 'store'])->name('acara.store');
Route::put('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/Acara', [Controllers\AcaraController::class, 'update'])->name('acara.update');

//Route Dokumentasi
Route::get('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/Dokumentasi', [Controllers\DocumentationsController::class, 'create'])->name('dokumentasi')->middleware('auth');
Route::post('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/Dokumentasi', [Controllers\DocumentationsController::class, 'store'])->name('dokumentasi.store');
Route::put('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/Dokumentasi', [Controllers\DocumentationsController::class, 'update'])->name('dokumentasi.update');

// Route Story
Route::get('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/story', [Controllers\StoryController::class, 'create'])->name('story')->middleware('auth');
Route::post('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/story', [Controllers\StoryController::class, 'store'])->name('story.store');
Route::put('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/story', [Controllers\StoryController::class, 'update'])->name('story.update');
Route::delete('/undangan/{id}_{nPanggilPria}&{nPanggilWanita}/story', [Controllers\StoryController::class, 'destroy'])->name('story.destroy');


// Route Admin
Route::get('/admin', [Controllers\AdminController::class, 'index'])->name('admin')->middleware('auth');
Route::put('/admin/updatedPria', [Controllers\AdminController::class, 'updatedPria'])->name('updated.pria');
Route::put('/admin/updatedWanita', [Controllers\AdminController::class, 'updatedWanita'])->name('updated.wanita');
Route::put('/admin/updatedAcara', [Controllers\AdminController::class, 'updatedAcara'])->name('updated.acara');
Route::get('/admin/story/{id}', [Controllers\AdminController::class, 'showStory'])->name('show.story');
Route::put('/admin/story/{id}', [Controllers\AdminController::class, 'updatedStory'])->name('updated.story');
Route::post('/admin/storeUser', [Controllers\AdminController::class, 'storeUser'])->name('store.user');
Route::put('/admin/updatedUser/{id}', [Controllers\AdminController::class, 'updatedUser'])->name('updatedUser');
Route::delete('/admin/deletedUser/{id}', [Controllers\AdminController::class, 'deletedUser'])->name('deletedUser');
Route::delete('/admin/deletedUndangan/{id}', [Controllers\AdminController::class, 'deletedUndangan'])->name('deletedUndangan');
