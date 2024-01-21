<?php

use Illuminate\Support\Facades\Route;

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
//задание 9.1
Route::get('/user/{id?}', function ($id=0) {
    return $id;
});

//Задание 9.2
Route::get('/us/{year}/{month}/{day}', function ($year,$month,$day) {
    $daysd = ['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','суббота'];
$f=date('w', mktime(0, 0, 0, $month, $day,$year));
return " День недели: $daysd[$f] ";
})->where(['year'=>'^[19|20]\d{2}$',
'month'=>'^(0?[1-9]|1[012])',
'day'=>'[1-31]+']);
