<?php


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', 'WelcomeController@index')->name('welcome');

            Route::get('/index', 'OrderController@index')->name('index');
            Route::get('/index2', 'OrderController2@index')->name('index2');


           // Route::get('/index/{month_id}/', 'OrderController@show')->name('index.show');

            //category routes
            Route::resource('categories', 'CategoryController')->except(['show']);

            //product routes
            Route::resource('products', 'ProductController')->except(['show']);

            //client routes
            Route::resource('clients', 'ClientController')->except(['show']);
            Route::resource('clients.orders', 'Client\OrderController')->except(['show']);

            //order routes
            Route::resource('orders', 'OrderController')->except(['show']);


            //user routes
            Route::resource('users', 'UserController')->except(['show']);








        });//end of dashboard routes
        Route::get('/users/admin/{id}', 'UserController@admin')->name('users.admin'); //->middleware('admin');
        Route::get('/users/notadmin/{id}', 'UserController@notAdmin')->name('users.not.admin');

    });


