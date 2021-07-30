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

Route::get('/','API\MoviesController@index');

Route::get('/movies', function () {
    return view('movies');
});

// Route::get('{path}', function () {
//     return view('movies');
// })->where( 'path', '([A-z\d-\/_.]+)?' );

Route::get('/test','API\MoviesController@test');

Auth::routes();


