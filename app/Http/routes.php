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
Route::get('give-me-token', ['as' => 'token', 'uses' => 'PageController@token']);
Route::get('/', function () {
    return view('pages.index');
});

Route::get('/barang', ['as' => 'page.barang', function () {
    return view('pages.barang');
}]);

Route::get('/user', ['as' => 'page.user', function () {
    return view('pages.user');
}]);
Route::get('/peminjaman', ['as' => 'page.peminjaman', function () {
    return view('pages.peminjaman');
}]);

Route::get('/pengembalian', ['as' => 'page.pengembalian', function () {
    return view('pages.pengembalian');
}]);
//Route::get('/peminjaman', function () {
//    return view('pages.peminjaman');
//});

Route::group(['prefix' => 'api/v1'], function () {
    Route::resource('user', 'UserController');
    Route::resource('barang', 'BarangController');
    Route::resource('peminjaman', 'PeminjamanController');
    // List Data Peminjaman
    Route::get('data-peminjaman', 'PeminjamanController@getList');
    Route::get('data-user', 'UserController@getList');
    Route::get('data-barang', 'BarangController@getList');
    Route::put('pengembalian/{id}', 'PeminjamanController@kembali');

});
//Route::resource('data-peminjaman', 'PeminjamanController');