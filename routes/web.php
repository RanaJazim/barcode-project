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

use App\Custom\Notification\INotification;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('panel.dashboard.section1');
});

Route::get('/notification', function(INotification $iNotification) {

    return view('panel.inventory.create');
});


// Routes for Inventory
Route::resource('inventory', 'InventoryController');

// Routes for Customer
Route::resource('customer', 'CustomerController');

// Routes for Invoice
Route::get('/invoice/open', 'InvoiceController@open')->name('invoice.open');
Route::post('/invoice/create', 'InvoiceController@create')->name('invoice.create');
