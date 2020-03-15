<?php

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('admin');
})->middleware('admin');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faq', function () {
    return view('faq');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});
########### Marks #############
Route::get('/adminMarks', 'MarksController@index')->middleware('admin');
Route::get('/addMark', 'MarksController@create')->middleware('admin');
Route::post('/addMark', 'MarksController@store')->middleware('admin');
Route::get('/editMark/{id}', 'MarksController@edit')->middleware('admin');
Route::post('/editMark/{id}', 'MarksController@update')->middleware('admin');
Route::get('/deleteMark/{id}', 'MarksController@delete')->middleware('admin');
Route::post('/deleteMark/{id}', 'MarksController@destroy')->middleware('admin');

########### Categories #############
Route::get('/adminCategories', 'CategoriesController@index')->middleware('admin');
Route::get('/addCategory', 'CategoriesController@create')->middleware('admin');
Route::post('/addCategory', 'CategoriesController@store')->middleware('admin');
Route::get('/editCategory/{id}', 'CategoriesController@edit')->middleware('admin');
Route::post('/editCategory/{id}', 'CategoriesController@update')->middleware('admin');
Route::get('/deleteCategory/{id}', 'CategoriesController@delete')->middleware('admin');
Route::post('/deleteCategory/{id}', 'CategoriesController@destroy')->middleware('admin');

########### Products #############
Route::get('/addImages/{id}', 'ProductsController@addImages')->middleware('admin');
Route::post('/addImages/{id}', 'ProductsController@addImages')->middleware('admin');
Route::get('/delete-alt-image/{id}','ProductsController@deleteAltImage')->middleware('admin');
Route::get('/products', 'ProductsController@list') -> name('products.list');
Route::get('/products/{id}', 'ProductsController@show');
Route::get('/adminProducts', 'ProductsController@index')->middleware('admin');
Route::get('/addProduct', 'ProductsController@create')->middleware('admin');
Route::post('/addProduct', 'ProductsController@store')->middleware('admin');
Route::get('/editProduct/{id}', 'ProductsController@edit')->middleware('admin');
Route::post('/editProduct/{id}', 'ProductsController@update')->middleware('admin');
Route::get('/deleteProduct/{id}', 'ProductsController@delete')->middleware('admin');
Route::post('/deleteProduct/{id}', 'ProductsController@destroy')->middleware('admin');

########### Customers #############
Route::get('/profile', 'CustomersController@show');
Route::post('/profile', 'CustomersController@update');
Route::get('/my-orders', 'OrdersController@index');
Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
Route::get('/adminCustomers', 'CustomersController@index')->middleware('admin');
Route::get('/deleteCustomer/{id}', 'CustomersController@delete')->middleware('admin');
Route::post('/deleteCustomer/{id}', 'CustomersController@destroy')->middleware('admin');

########### Carts #############
Route::post('/products/{id}', 'CartsController@addProduct');
Route::get('/cart', 'CartsController@show');
Route::post('/modifyProductQuantity', 'CartsController@modifyProductQuantity');
Route::post('/removeProduct', 'CartsController@removeProduct');
// Route::post('/checkout', 'CartsController@checkout');
Route::post('/checkout', 'CheckoutController@checkout');
Route::get('/checkout', 'CheckoutController@show');





########### Admin #############
Route::get('/adminLogIn', 'AdminsController@logInForm')->middleware('adminLogged');
Route::post('/adminLogIn', 'AdminsController@logIn')->middleware('adminLogged');
Route::get('/adminLogOut', 'AdminsController@logOut')->middleware('admin');

Route::get('/check', 'AdminsController@check');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
