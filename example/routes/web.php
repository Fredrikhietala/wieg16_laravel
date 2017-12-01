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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers', 'CustomersController@showCustomers');
Route::get('/customers/by_company/{company_id}', 'CustomersController@showCustomerCompany');
Route::get('/customers/{id}', 'CustomersController@showSingleCustomer');
Route::get('/customers/{id}/address', 'CustomersController@showAddress');

Route::resource('products', 'ProductsController');


