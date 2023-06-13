<?php

use App\Http\Livewire\FooterComponent;
use App\Http\Livewire\Pages\Admin\Book;
use App\Http\Livewire\Pages\Admin\BookAdd;
use App\Http\Livewire\Pages\Admin\BookChap as AdminBookChap;
use App\Http\Livewire\Pages\Admin\BookChapAdd;
use App\Http\Livewire\Pages\Admin\BookEdit;
use App\Http\Livewire\Pages\Admin\Cate;
use App\Http\Livewire\Pages\Admin\Home as AdminHome;
use App\Http\Livewire\Pages\AdminLogin;
use App\Http\Livewire\Pages\Book\BookAbout;
use App\Http\Livewire\Pages\Book\BookCate;
use App\Http\Livewire\Pages\Book\BookChap;
use App\Http\Livewire\Pages\Book\Bookmark;
use App\Http\Livewire\Pages\Book\BookSearch;
use App\Http\Livewire\Pages\Book\Home;
use App\Http\Livewire\Pages\Book\Postblog;
use App\Http\Livewire\Pages\Login;
use App\Http\Livewire\Pages\Post\CreatePost;
use App\Http\Livewire\Pages\PostBookmark;
use App\Http\Livewire\Pages\Profileuser;
use App\Http\Livewire\Pages\Register;
use App\Http\Livewire\Pages\User\ChangePassword;
use App\Http\Livewire\Pages\User\Profile;
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
Route::get('/', Home::class);
Route::get('/sach/{slug}', BookAbout::class)->name('book.about');
Route::get('/sach/{bookSlug}/{slug}', BookChap::class)->name('book.chap');
Route::get('/profileuser', Profileuser::class)->name('profileuser');
Route::get('/postblog', Postblog::class)->name('postblog');
Route::get('/the-loai/{slug}', BookCate::class)->name('book.cate');
Route::get('/tim-kiem-sach', BookSearch::class)->name('book.search');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/danh-dau', Bookmark::class)->name('book.bookmark');
    Route::get('/trang-ca-nhan', Profile::class)->name('user.profile');
    Route::get('/doi-mat-khau', ChangePassword::class)->name('user.changepass');

    Route::get('/bai-viet-moi', CreatePost::class)->name('post.create');
});



// admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('', AdminHome::class)->name('admin.home');
    Route::get('/cate', Cate::class)->name('admin.cate');
    Route::get('/book', Book::class)->name('admin.book');
    Route::get('/book/edit/{id}', BookEdit::class)->name('admin.book.edit');
    Route::get('/book/chap/edit/{id}', AdminBookChap::class)->name('admin.book.chap.edit');
    Route::get('/book/add', BookAdd::class)->name('admin.book.add');
    Route::get('/book/chap/add/{book_id}', BookChapAdd::class)->name('admin.book.chap.add');
});
