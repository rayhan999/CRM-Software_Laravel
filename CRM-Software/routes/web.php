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

// Route::get('/', function () {
//     return view('superAdmin.index');
// });

//SUPERADMIN
//superAdmin
Route::get('/superAdmin_home', 'superAdmin_homeController@index')->name('superAdmin.index');
Route::get('/superAdmin_home/superAdmin_list', 'superAdmin_homeController@superAdmin_show')->name('superAdmin.superAdmin');
Route::post('/superAdmin_home/superAdmin_list/create', 'superAdminController@superAdmin_create')->name('superAdmin.superAdmin.create');
Route::get('/superAdmin_home/superAdmin_list/search', 'superAdminController@search')->name('superAdmin.superAdmin.search');
// admin
Route::get('/superAdmin_home/admin_list', 'superAdmin_homeController@admin_show')->name('superAdmin.admin');
Route::post('/superAdmin_home/admin_list/create', 'AdminController@admin_create')->name('superAdmin.admin.create');
Route::get('/superAdmin_home/admin_list/edit/{id}', 'AdminController@show')->name('superAdmin.admin.show');
Route::post('/superAdmin_home/admin_list/edit/{id}', 'AdminController@update')->name('superAdmin.admin.update');
Route::get('/superAdmin_home/admin_list/delete/{id}', 'AdminController@destroy')->name('superAdmin.admin.destroy');
//subscriber
Route::get('/superAdmin_home/subscriber_list', 'superAdmin_homeController@subscriber_show')->name('superAdmin.subscriber');
Route::get('/superAdmin_home/subscriber_list/delete/{id}', 'SubscriberController@destroy')->name('superAdmin.subscriber.destroy');
Route::get('/superAdmin_home/subscriber_list/block/{id}', 'SubscriberController@block')->name('superAdmin.subscriber.block');
Route::get('/superAdmin_home/subscriber_list/unblock/{id}', 'SubscriberController@unblock')->name('superAdmin.subscriber.unblock');
//Package
Route::get('/superAdmin_home/package_list', 'superAdmin_homeController@package_show')->name('superAdmin.package');
Route::get('/superAdmin_home/package_list/edit', 'superAdmin_homeController@show')->name('superAdmin.package.show');
Route::post('/superAdmin_home/package_list/edit', 'superAdmin_homeController@update')->name('superAdmin.package.update');
//marketing
Route::group(['middleware'=>['checksession']],function(){
 	Route::get('/markethome/profile','MarkethomeController@profile')->name('markethome.profile');
 	Route::post('/markethome/profile','MarkethomeController@profileupdate');
 	Route::resource('/markethome','MarkethomeController')->names([
 		'index'=>'markethome.index',
 		'update'=>'markethome.update'
 	]);
 	Route::get('/email/{table}/{id}', 'MarketUserController@sendmails')->name('market.mail');
 	Route::post('/import/{table}', 'ImportController@import')->name('import.csv');
 	Route::get('/chart/{type}', 'chartsController@index');
 	Route::get('/chart/download/{type}', 'chartsController@downloadcharts')->name('charts.pdf');
 	Route::get('/marketuser/pdf/{table}','MarketUserController@loadpdf')->name('marketuser.pdf');
 	Route::get('/marketuser/search/{table}', 'MarketUserController@search')->name('live_search.action');
	Route::post('/marketuser/create', 'MarketUserController@insert');
 	Route::get('/marketuser/showinfo/{table}/{id}','MarketUserController@showinfo')->name('marketuser.profile');
 	Route::post('/marketuser/showinfo/{table}/{id}','MarketUserController@updateinfo');
 	Route::get('/marketuser/delete/{table}/{id}','MarketUserController@deleteuser')->name('marketuser.delete');
 	Route::get('/marketuser/upgradestatus/{id}','MarketUserController@upgradestatus')->name('marketuser.upgradestatus');
 	Route::resource('/marketuser', 'MarketUserController');
 });
 //marketing