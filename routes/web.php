<?php

use App\Http\Controllers\ProfileController;
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

Route::view('/', 'home')->name('home');

Route::view('/about', 'about')->name('about');

Route::get('/clients', [\App\Http\Controllers\ClientsController::class, 'clients'])->name('clients');

Route::post('/clients', [\App\Http\Controllers\ClientsController::class, 'search'])->name('clients.search');

Route::view('/news', 'news')->name('news');

Route::view('/contact', 'contact')->name('contact');

Route::get('/faq', [\App\Http\Controllers\FAQController::class, 'getFAQ'])->name('faq');

Route::get('/dashboard', [\App\Http\Controllers\dashboardController::class, 'getUser'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/adminedit', [\App\Http\Controllers\EditController::class, 'index'])->name('edit');
Route::post('/adminedit-sc', [\App\Http\Controllers\EditController::class, 'searchClients'])->name('edit.search.clients');
Route::post('/adminedit-sf', [\App\Http\Controllers\EditController::class, 'searchFAQ'])->name('edit.search.faq');
Route::delete('/adminedit-dc/{id}', [\App\Http\Controllers\EditController::class, 'deleteClient'])->name('edit.delete.clients');
Route::delete('/adminedit-df/{id}', [\App\Http\Controllers\EditController::class, 'deleteFAQ'])->name('edit.delete.faq');
Route::post('/adminedit-ac', [\App\Http\Controllers\EditController::class, 'addClient'])->name('edit.add.clients');
Route::post('/adminedit-af', [\App\Http\Controllers\EditController::class, 'addFAQ'])->name('edit.add.faq');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/todolist', [\App\Http\Controllers\TodoController::class, 'index'])->name('todolist');
    Route::post('/todolist', [\App\Http\Controllers\TodoController::class, 'store'])->name('addTask');
    Route::delete('/todolist-delete/{id}', [\App\Http\Controllers\TodoController::class, 'destroy'])->name('deleteTask');

    Route::middleware('admin')->group(function() {
        Route::get('/adminedit', [\App\Http\Controllers\EditController::class, 'index'])->name('edit');
        Route::post('/adminedit-sc', [\App\Http\Controllers\EditController::class, 'searchClients'])->name('edit.search.clients');
        Route::post('/adminedit-sf', [\App\Http\Controllers\EditController::class, 'searchFAQ'])->name('edit.search.faq');
        Route::delete('/adminedit-dc/{id}', [\App\Http\Controllers\EditController::class, 'deleteClient'])->name('edit.delete.clients');
        Route::delete('/adminedit-df/{id}', [\App\Http\Controllers\EditController::class, 'deleteFAQ'])->name('edit.delete.faq');
        Route::post('/adminedit-ac', [\App\Http\Controllers\EditController::class, 'addClient'])->name('edit.add.clients');
        Route::post('/adminedit-af', [\App\Http\Controllers\EditController::class, 'addFAQ'])->name('edit.add.faq');
    });
    
});


require __DIR__.'/auth.php';
