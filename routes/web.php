<?php

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

// Middleware mewajibkan login
Route::group(["middleware" => "auth"], function () {
    Route::get('/', function () {
        return view('home');
    });
    // Produk 
    Route::get('/produk', 'ProdukController@index');
    Route::post('/store_produk', 'ProdukController@store')->name('produk.store');
    Route::get('/delete_produk/{id}', 'ProdukController@destroy')->name('produk.delete');
    Route::get('/edit_produk/{id}', 'ProdukController@edit')->name('produk.edit');
    Route::post('/update_produk/{id}', 'ProdukController@update')->name('produk.update');
    Route::get('/update_stok/{id}', 'ProdukController@stok')->name('produk.stok');
    Route::post('/update_stok/{id}', 'ProdukController@update_stok')->name('produk.stok_update');

    // Invoice
    Route::get('/invoices', 'InvoiceController@index');
    Route::post('/store_invoice', 'InvoiceController@store')->name('invoice.store');

    route::get('email', function () {
        $invoice = App\Invoice::find('5');
        return view('sent_mail', [
            'invoice' => $invoice
        ]);
    });
});

// Halaman dan Fungsi Login
Route::get('login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');
Route::post('login', 'AuthController@act_login')->name('act_login');
