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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' =>['web','auth']], function(){
	Route::get('/', function () {
		if(Auth::user()->admin ==0) {
			return redirect()->guest('fileupload');
		} else  {
			return redirect()->guest('user');
		}
	    
	});
	Route::get('/home', function () {
		if(Auth::user()->admin ==0) {
			return redirect()->guest('fileupload');
		} else {
			$users['users'] = \App\User::all()->where('admin','=', '0');
			return view('adminhome',$users);
		}
	});
	//Route::get('/home', 'HomeController@index')->name('home');
});
route::resource('user','UserController');
Route::post('user/store', array(
	'uses' => 'UserController@store',
	'as' => 'storeUser'
));
Route::post('user/update', array(
	'uses' => 'UserController@update',
	'as' => 'updateUser'
));  
route::resource('fileupload','FileuploadController');
Route::post('fileupload/store', array(
	'uses' => 'FileuploadController@store',
	'as' => 'storeFileupload'
));	
Route::post('fileupload/update', array(
	'uses' => 'FileuploadController@update',
	'as' => 'updateFileupload'
)); 
