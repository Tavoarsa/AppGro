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

//Route::get('/', 'WelcomeController@index');
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::resource('animal','AnimalController' );
Route::resource('vacuna','VacunaController');

//Route::resource('finca','FincaController' );
//Route::get('animal/catAnimal','AnimalController@catAnimal');


Route::post('/store','AnimalController@store');
Route::get('/destroy/{id}','AnimalController@destroy');


Route::resource('/','AnimalController');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'index '=>'AnimalController',
]);

Route::get('catalago/animal', 'CatalagoController@index');

//Routes animal
Route::get('animal', 'AnimalController@index');
Route::get('animal/get/{nombre}', [
	'as' => 'getanimal', 'uses' => 'AnimalController@get']);
Route::post('animal/add',[ 
        'as' => 'addanimal', 'uses' => 'AnimalController@add']);



Route::get('fileentry', 'FileEntryController@index');
Route::get('fileentry/get/{filename}', [
	'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::post('fileentry/add',[ 
        'as' => 'addentry', 'uses' => 'FileEntryController@add']);

//Injection

Route::resource('injection','InjecctionController');
Route::get('injections/edit/{id}','InjecctionController@edit');
Route::get('injections/show1/{id}','InjecctionController@show1');



//Vacunas

Route::get('vaccine', 'VaccineController@index');
Route::get('vaccine/get/{original_filename}', [
	'as' => 'getvaccine', 'uses' => 'VaccineController@get']);
Route::post('VaccineController/add',[ 
        'as' => 'addvaccine', 'uses' => 'VaccineController@add']);