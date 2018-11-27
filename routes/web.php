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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::resources([
    'employees' => 'EmployeesController'
]);
Route::post('employees/save-address/{employeeId}', 'EmployeesController@saveAddress')->name('saveAddress');
Route::post('inductions/create-employee/{inductionId}', 'InductionsController@createEmployee');
Route::resources([
    'inductions' => 'InductionsController'
]);

Route::resources([
    'increments' => 'IncrementsController'
]);

Route::resources([
    'leaves' => 'LeavesController'
]);

Route::resources([
    'rewards' => 'RewardsController'
]);

Route::resources([
    'punishments' => 'PunishmentsController'
]);

Route::resources([
    'promotions' => 'PromotionsController'
]);

Route::resources([
    'outside_trainings' => 'Outside_trainingsController'
]);

Route::get('promotions/create','PromotionsController@create')->name('createPromotion');
Route::get('increments/get-employee-increments/{id}', 'IncrementsController@getEmployeeIncrements');
Route::post('increments/updateIncrement/{incrementId}', 'IncrementsController@updateIncrement');
Route::get('leaves/get-employee-leaves/{id}', 'LeavesController@getEmployeeLeaves');
Route::post('leaves/updateLeave/{leaveId}', 'LeavesController@updateLeave');
Route::get('rewards/get-employee-rewards/{id}', 'RewardsController@getEmployeeRewards');
Route::post('rewards/updateReward/{rewardId}', 'RewardsController@updateReward');
Route::get('punishments/get-employee-punishments/{id}', 'PunishmentsController@getEmployeePunishments');
Route::post('punishments/updatePunishment/{punishmentId}', 'PunishmentsController@updatePunishment');
Route::get('promotions/get-employee-promotions/{id}', 'PromotionsController@getEmployeePromotions');
Route::post('promotions/updatePromotion/{promotionId}', 'PromotionsController@updatePromotion');
Route::get('outside_trainings/get-employee-outside_trainings/{id}', 'Outside_trainingsController@getEmployeeOutside_trainings');
Route::post('outside_trainings/updateOutside_training/{outside_trainingId}', 'Outside_trainingsController@updateOutside_training');
