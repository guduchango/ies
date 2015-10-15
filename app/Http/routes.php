<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
$controller = 'AlumnosRepoController';


Route::get('/', function () {
    return View('home.home');
});

Route::get('/alumnos', [
        'uses' => $controller.'@index',
        'as'   => 'alu_index_url',
]);

Route::get('/alumnos/create', [
        'uses' => $controller.'@create',
        'as'   => 'alu_create_url',
]);

Route::post('/alumnos/store', [
        'uses' => $controller.'@store',
        'as'   => 'alu_store_url',
]);

Route::get('alumnos/{id}/edit', [
        'uses' => $controller.'@edit',
        'as'   => 'alu_edit_url',
])->where('id', '[0-9]+');

Route::put('alumnos/{id}/update', [
        'uses' => $controller.'@update',
        'as'   => 'alu_put_url',
])->where('id', '[0-9]+');

Route::get('alumnos/{id}/show', [
        'uses' => $controller.'@show',
        'as'   => 'alu_show_url',
])->where('id', '[0-9]+');
 
Route::delete('alumnos/{id}/destroy', [
        'uses' => $controller.'@destroy',
        'as'   => 'alu_destroy_url',
])->where('id', '[0-9]+');

