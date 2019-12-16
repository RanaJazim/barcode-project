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
Route::get('/invoice/create', 'InvoiceController@create')->name('invoice.create');
Route::post('/invoice', 'InvoiceController@store')->name('invoice.store');
Route::get('/customer/{customerId}/inventroy/{inventoryId}/invoice',
    'InvoiceController@index')->name('invoice.index');
Route::get('/invoice/{id}/edit',
    'InvoiceController@edit')->name('invoice.edit');
Route::patch('/invoice/{id}', 'InvoiceController@update')->name('invoice.update');
Route::delete('/invoice/{id}', 'InvoiceController@destroy')->name('invoice.destroy');
Route::get('/invoice/{id}', 'InvoiceController@show')->name('invoice.show');


Route::get('/print', function () {
    return \SimpleSoftwareIO\QrCode\Facades\QrCode::size(500)->generate('text');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
