<?php
use Spatie\Permission\Models\Role;
/*
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
    //$role = Role::find(2);
    //$role->givePermissionTo('user-profile');

});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user_management', 'UserController@index_admin')->name('User Management');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});
