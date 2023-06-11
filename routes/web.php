<?php

use App\Http\Livewire\FooterComponent;
use App\Http\Livewire\Pages\AdminLogin;
use App\Http\Livewire\Pages\Book\BookAbout;
use App\Http\Livewire\Pages\Book\BookCate;
use App\Http\Livewire\Pages\Book\BookChap;
use App\Http\Livewire\Pages\Book\BookSearch;
use App\Http\Livewire\Pages\Book\Home;
use App\Http\Livewire\Pages\Book\Postblog;
use App\Http\Livewire\Pages\Login;
use App\Http\Livewire\Pages\Profileuser;
use App\Http\Livewire\Pages\Register;
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

// globals
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('admin/login', AdminLogin::class)->name('admin.login');




// user
Route::group([], function () {
    Route::get('/', Home::class);
    Route::get('/sach/{slug}', BookAbout::class)->name('book.about');
    Route::get('/sach/{bookSlug}/{slug}', BookChap::class)->name('book.chap');
    Route::get('/profileuser', Profileuser::class)->name('profileuser');
    Route::get('/postblog', Postblog::class)->name('postblog');
    Route::get('/the-loai/{slug}', BookCate::class)->name('book.cate');
    Route::get('/tim-kiem-sach', BookSearch::class)->name('book.search');
});


// admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('', function () {
        return view('admin');
    })->name('admin.home');
});
