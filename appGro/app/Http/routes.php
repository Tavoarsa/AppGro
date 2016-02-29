<?php
use Illuminate\Support\Facades\Mail;
use App\MilkProduction;
use App\Task;
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



//Home
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('portal/{id}', 'HomeController@portal');
Route::get('portal/', 'HomeController@portal_p');
Route::get('veterinaria', 'HomeController@veterinaria');
Route::get('alimentacion', 'HomeController@alimentacion');




Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'index '=>'HomeController',
]);

//Animal
Route::resource('calendar','CalendarController');

Route::resource('animal','AnimalController');

Route::post('animal/create/','AnimalController@store');



Route::get('animal/create/mt','AnimalController@create_mt');
Route::get('animal/create/fiv','AnimalController@create_fiv');
Route::get('animal/create/te','AnimalController@create_te');
Route::get('animal/create/ia','AnimalController@create_ia');


Route::get('animal/control_animal/{id}','AnimalController@control_animal');
Route::get('animal/registro_sanitario/vaccine/{id}','AnimalController@registro_sanitario_vaccine');
Route::get('animal/registro_sanitario/injection/{id}','AnimalController@registro_sanitario_injection');

Route::post('animal/registro_sanitario/ejecutar_vacunas','AnimalController@ejecutar_vacunas');
Route::post('animal/peso/ejecutar_peso','AnimalController@ejecutar_peso');
Route::post('animal/registro_sanitario/ejecutar_injection','AnimalController@ejecutar_injection');
Route::post('animal/control_alimenticio/ejecutar_alimento','AnimalController@ejecutar_alimento');

Route::get('animal/peso/{id}','AnimalController@peso');
Route::get('animal/control_alimenticio/{id}','AnimalController@control_alimenticio');
Route::get('animal/edit/{id}','AnimalController@edit');


Route::get('animal/milk_production/{id}','AnimalController@redirect_milk_production');
Route::post('animal/milk_production/update_milk_production','AnimalController@update_milk_production');



//Reportes
Route::resource('report','ReportController');

Route::get('report/veterinario/{id}','ReportController@create_veterinario');
Route::get('report/alimento/{id}','ReportController@create_alimento');    



//Disease

Route::resource('disease','DiseaseController');

//Providers
Route::resource('provider','ProviderController');
Route::get('provider/edit/{id}','ProviderController@edit');



//Farm
Route::resource('farm','FarmController');
Route::get('farm/edit/{id}','FarmController@edit');
//Route::get('farm/show/{id}','FarmController@show');
Route::get('farm/show','FarmController@show');


//Injection

Route::resource('injection','InjecctionController');
Route::get('injections/edit/{id}','InjecctionController@edit');
Route::get('injection/show1/{id}','InjecctionController@show1');

//Vaccines

Route::resource('vaccine','VaccineController');
Route::get('vaccine/edit/{id}','VaccineController@edit');
Route::get('vaccine/show1/{id}','VaccineController@show1');

//food__supplements

Route::resource('food__supplement','food__supplementsController');
Route::get('food__supplements/edit/{id}','food__supplementsController@edit');
Route::get('food__supplements/show1/{id}','food__supplementsController@show1');

//Profitability
Route::resource('profitability','ProfitabilityController');
Route::get('profitability/milk_production/{id}','ProfitabilityController@milk_production');





Route::post('profitability/milk_production','ProfitabilityController@milk_production') ;






//Calendar








