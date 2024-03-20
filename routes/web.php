<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SpeakerController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function(){
Route::get('/', 'App\Http\Controllers\EventController@index'); 
Route::resource('evenimente', 'App\Http\Controllers\EventController');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::patch('update-cart', 'App\Http\Controllers\TicketController@update'); //modific cos
Route::delete('remove-from-cart', 'App\Http\Controllers\TicketController@remove');//sterg dincos
Route::get('processing-page', function () {
    return view('processing-page'); 
})->name('processing-page');


Route::get('/ticket', 'App\Http\Controllers\TicketController@index'); //afisare pagina de start
Route::get('cart', 'App\Http\Controllers\TicketController@cart'); //cos
Route::get('add-to-cart/{id}', 'App\Http\Controllers\TicketController@addToCart');//adaug in
Route::get('/agenda', [EventController::class, 'agenda'])->name('evenimente.agenda');
Route::get('/speakers', [SpeakerController::class, 'index']);
Route::view('/sponsori','sponsori.sponsori');
Route::view('/contact','contact.contact');