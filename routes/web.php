<?php


use App\User;
use App\Address;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', 'TestController@test');


/**
 * Blog Laravel
 */

Route::prefix('admin')->namespace('Admin')->group(function() {
    Route::any('login', 'LoginController@login');
    Route::get('code', 'LoginController@code');
});

Route::middleware(['admin.login'])->prefix('admin')->namespace('Admin')->group(function() {
    Route::get('index', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('quit', 'LoginController@quit');
    Route::any('resetPassword', 'IndexController@resetPassword');

    Route::resource('category', 'CategoryController');

    Route::post('category/changeOrder', 'CategoryController@changeOrder');
});





//Route::get('admin/crypt', 'Admin\LoginController@crypt');
//Route::get('admin/getcode', 'Admin\LoginController@getcode');










/**
 * Udemy class
 */

// Route::get('user/address/insert', function() {
//     $address = new Address();
//     $address->name = 'XX市xx路xxx號x樓';
//     $john = User::find(2);
//     $john->address()->save($address);
//     return "OK";
// });

//Route::get('user/address/{id}', function($id) {
//    $user = User::find($id);
//    return $user->address->name;
//});

