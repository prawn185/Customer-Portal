<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'customers'], function () {

    Route::get('/', ['as' => 'customer.index', 'uses' => 'DashboardController@index']);

    Route::group(['prefix' => 'profile'], function () {

        Route::get('/', ['as' => 'customer.profile.index', 'uses' => 'Profile\ProfileController@index']);
        Route::post('update-password', ['as' => 'customer.profile.update-password', 'uses' => 'Profile\ProfileController@updatePassword']);
    });

    Route::group(['prefix' => 'tasks'], function () {

        Route::get('/', ['as' => 'customer.tasks.index', 'uses' => 'Tasks\TaskController@index']);

        Route::get('completed', ['as' => 'customer.tasks.completed', 'uses' => 'Tasks\TaskController@completed']);

        Route::post('add-note', ['uses' => 'Tasks\TaskController@addNote']);
        Route::post('create-task', ['uses' => 'Tasks\TaskController@create']);
        Route::post('send-pdf', ['uses' => 'Tasks\TaskController@sendpdf']);

        Route::get('{task}', ['as' => 'customer.tasks.view', 'uses' => 'Tasks\TaskController@view']);
        Route::post('{task}/edit', ['as' => 'customer.tasks.edit', 'uses' => 'Tasks\TaskController@edit']);
        Route::get('{task}/complete', ['as' => 'customer.tasks.complete', 'uses' => 'Tasks\TaskController@complete']);
        Route::post('{task}/attach', ['as' => 'customer.tasks.attach', 'uses' => 'Tasks\TaskController@attach']);

        Route::get('{id}/reinstate',['as' => 'customer.tasks.reinstate', 'uses' => 'Tasks\TaskController@reinstateTask']);

    });

    //Manual
    Route::group(['prefix' => 'manual'], function () {
        Route::get('/', ['as' => 'customer.manual.index', 'uses' => 'Manual\ManualController@index']);
        Route::post('/create', ['as' => 'customer.manual.create', 'uses' => 'Manual\ManualController@create']);
        Route::post('/create-category', ['as' => 'customer.manual.create-category', 'uses' => 'Manual\ManualController@createCategory']);
        Route::get('/view/category/{category}', ['as' => 'customer.manual.category', 'uses' => 'Manual\ManualController@viewCategory']);
        Route::get('/view/{manual}', ['as' => 'customer.manual.view', 'uses' => 'Manual\ManualController@view']);
        Route::post('/edit/{manual}', ['as' => 'customer.manual.edit', 'uses' => 'Manual\ManualController@edit']);

        //Search
        Route::get('/search', ['as' => 'customer.manual.search', 'uses' => 'Manual\ManualController@searchBox']);
        Route::post('/search', ['as' => 'customer.manual.results', 'uses' => 'Manual\ManualController@searchResults']);


    });

});
