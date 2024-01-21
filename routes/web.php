<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page;
use App\Http\Controllers\PageController;



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
    $date = $year."-".$month."-".$day;
    $daysd = ['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','суббота'];
    $dayN = date('w', strtotime($date));

    return $daysd[$dayN];
})->where(['year'=> '^(19|20)\d{2}$',
'month' => '^(0?[1-9]|1[012])$',
'day' => '^[0-9]*$'
]);

//Задание 9.3
Route::get('names/{name}',function ($name)  {
    $users = [ 
        'user1' => 'city1', 
        'user2' => 'city2', 
        'user3' => 'city3', 
        'user4' => 'city4', 
        'user5' => 'city5'];
        if (array_key_exists($name,$users)){
            return  $users[$name] ;
        }
        return " Имя неверно ";
    
});


//Задание 9.4
//Пункт 1
Route::get('/pages/show', [PageController::class,'showOne']);
//Пункт 2
Route::get('/pages/all', [PageController::class,'showAll']);
//Пункт 3,4
Route::get('/pages/show/{id}', [Page::class,'showOne']);
