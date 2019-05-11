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

Route::get('upload',[
    'uses'=>'UploadController@index',
    'as'=> 'upload'
]);

Route::get('upload/create',[
    'uses'=>'UploadController@create',
    'as' => 'create'
]);

Route::post('upload',[
    'uses'=>'UploadController@store',
    'as' => 'store'
]);

Route::get('upload/edit/{id}',[
    'uses'=>'UploadController@edit',
    'as' => 'edit'
]);

Route::any('upload/show/{id}',[
    'uses'=>'UploadController@show',
    'as' => 'show'
]);

// Route::get('upload/update/{id}',[
//     'uses'=>'UploadController@update',
//     'as' => 'update'
// ]);

Route::name('update')->put('/update/{id}','UploadController@update');
    

// Route::any('upload/show/{id}',[
//     'uses'=>'UploadController@destroy',
//     'as' => 'delete'
// ]);

// したのがあってた！ 更にしたのでもいける
// Route::name('delete')->delete('/upload/{id}','UploadController@destroy');

Route::delete('upload/{id}',[
    'uses' =>'UploadController@destroy',
    'as' => 'delete']
);



