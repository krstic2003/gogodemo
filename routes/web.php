<?php

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



Route::get('/', function () {
    return view('welcome');
});

Route::get('/pomoc', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/books/{book}/images', [App\Http\Controllers\ImageController::class, 'store' ]);
Route::patch('/books/{book}/images/{id}', [App\Http\Controllers\ImageController::class, 'update' ]);
Route::delete('/books/{book}/images/{id}', [App\Http\Controllers\ImageController::class, 'delete' ]);

Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/users', [App\Http\Controllers\UserController::class, 'indexDataTable'])->name('users')->middleware('role');
    Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit-user')->middleware('role');
    Route::post('/user/{id}/update', [App\Http\Controllers\UserController::class, 'update'])->middleware('role');
    Route::get('/user/{id}/delete', [App\Http\Controllers\UserController::class, 'destroy'])->middleware('role');

    Route::get('/prices', [App\Http\Controllers\PriceController::class, 'index'])->name('prices')->middleware('role');
    Route::get('/price-cover/{id}', [App\Http\Controllers\PriceController::class, 'editPriceCover'])->name('price-cover')->middleware('role');
    Route::post('/price-cover/{id}/update', [App\Http\Controllers\PriceController::class, 'updatePriceCover'])->middleware('role');
    Route::get('/price-page/{id}', [App\Http\Controllers\PriceController::class, 'editPricePage'])->name('price-page')->middleware('role');
    Route::post('/price-page/{id}/update', [App\Http\Controllers\PriceController::class, 'updatePricePage'])->middleware('role');

    Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books');
    Route::get('/create-book', [App\Http\Controllers\BookController::class, 'createForm'])->name('create-book');
    Route::post('/create-book', [App\Http\Controllers\BookController::class, 'create']);
    Route::get('/edit-book/{id}', [App\Http\Controllers\BookController::class, 'editForm'])->name('edit-book');
    Route::post('/edit-book/{id}', [App\Http\Controllers\BookController::class, 'edit']);
    Route::get('/delete-book/{id}', [App\Http\Controllers\BookController::class, 'delete'])->name('delete-book');

    Route::get('/books-admin', [App\Http\Controllers\BookController::class, 'indexAdmin'])->name('books-admin')->middleware('role');
    Route::get('/open-book/{id}', [App\Http\Controllers\BookController::class, 'show'])->name('open-book');

    Route::get('/pixie-book/{book}', [App\Http\Controllers\BookEditorController::class, 'show'])->name('book-editor');
    //Route::get('/Strut/app/{id}', [App\Http\Controllers\BookController::class, 'pixieBook'])->name('pixie-book');

    Route::get('/order-book/{id}', [App\Http\Controllers\BookController::class, 'orderBook'])->name('order-book');
    Route::post('/order-submit/{id}', [App\Http\Controllers\BookController::class, 'orderSubmit']);

    Route::get('/generate-ips/{bid}/{oid}', [App\Http\Controllers\BookController::class, 'generateIps'])->name('generate-ips');

    Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'getSettings'])->name('settings')->middleware('role');
    Route::post('/settings/{id}', [App\Http\Controllers\SettingsController::class, 'updateSettings'])->middleware('role');
});

require __DIR__.'/auth.php';

//Auth::routes(['verify' => true]);
