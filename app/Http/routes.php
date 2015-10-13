<?php
use \ies\Materia;
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
Route::get('/', function () {
    
});
Route::get('/alumnos', [
        'uses' => 'AlumnosController@index',
        'as'   => 'alu_index_url',
    ]);
Route::post('/alumnos', [
        'uses' => 'AlumnosController@create',
        'as'   => 'alu_create_url',
]);
Route::get('/alumnos/create', [
        'uses' => 'AlumnosController@create',
        'as'   => 'alu_create_url',
]);
Route::get('alumnos/{id}/edit', [
        'uses' => 'AlumnosController@edit',
        'as'   => 'alu_edit_url',
])->where('id', '[0-9]+');
 Route::get('alumnos/{id}', [
        'uses' => 'AlumnosController@show',
        'as'   => 'alu_show_url',
 ])->where('id', '[0-9]+');