<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GenreController;


Route::redirect('/','/home');
Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/about',[HomeController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact',[ContactController::class, 'send'])->name('contact.send');
Route::get('/author',[HomeController::class,'author'])->name('author');


Route::middleware('isGuest')->group(function(){
    Route::get('/login',[AuthController::class,'loginForm'])->name('login');
    Route::post('/login',[AuthController::class, 'login'])->name('doLogin');
    Route::get('/register',[AuthController::class, 'registerForm'])->name('register');
    Route::post('/register',[AuthController::class, 'register'])->name('doRegister');
});

Route::middleware('isLoggedIn')->group(function(){
    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

    Route::get('/cart',[CartController::class,'get'])->name('cart');
    Route::post("/cart/adjustQuantity", [CartController::class, "adjustQuantity"]);
    Route::delete("/cart/{bookId}", [CartController::class, "remove"]);
    Route::get('/cart/checkout',[CartController::class, 'checkout'])->name('checkout');


    Route::middleware('isAdmin')->group(function(){
        Route::get('/admin',[AdminController::class,'index'])->name('admin.home');

        Route::get('/admin/products',[AdminController::class,'products'])->name('admin.products');

        Route::get('/admin/users',[AdminController::class,'users'])->name('admin.users');
        Route::delete('admin/users/{user}',[AdminController::class,'destroy_user'])->name('admin.users.delete');

        Route::get('/admin/genres',[GenreController::class,'index'])->name('admin.genres');
        Route::get('admin/genres/{genre}/edit',[GenreController::class, 'edit'])->name('admin.genres.edit');
        Route::get('admin/genres/create',[GenreController::class, 'create'])->name('admin.genres.create');
        Route::post('admin/genres',[GenreController::class, 'store'])->name('admin.genres.store');
        Route::put('admin/genres/{genre}',[GenreController::class, 'update'])->name('admin.genres.update');
        Route::delete('admin/genres/{genre}',[GenreController::class, 'destroy'])->name('admin.genres.delete');

        Route::get('/admin/messages',[AdminController::class,'messages'])->name('admin.messages');
    });

});
Route::post('/cart',[CartController::class,'index']);
Route::get('/books/json',[BookController::class,'get_json']);
Route::resource('books',BookController::class);

