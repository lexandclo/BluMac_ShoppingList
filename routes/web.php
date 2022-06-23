<?php

use App\Http\Controllers\ShoppingPage;
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
/* GET - Home routes */
Route::get('/', [ShoppingPage::class, 'index'])->name('shopping.index');
/* POST - create item */
Route::post('store', [ShoppingPage::class, 'store'])->name('shopping.store');
/* GET  - delete item */
Route::resource('shoppingitem', ShoppingPage::class);
//Route::get('delete_item/{shoppingitem}', [ShoppingPage::class, 'delete'])->name('shopping.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
