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
/*Route::Method('url pattern',function(){
	   
	   return'$tring';
	        or
	    return view('viewname');     


}) 
method=get or post  */
//passing string to browser

Route::get('/index',function(){

	return'<h1>Welcome All</h1>';
});
//passing view
/*
Route::get('/fruit',function(){

     return view('fruit');

});*/

//passing variable or data to view from routes.
/*Route::get('/fruit',function(){
     return view('fruit',['name'=>'Mango']);
});*/
//passing array to the view
Route::get('/fruit',function(){
	return view('fruit',['name'=>['Mango','Apple','Cheery','Jackfruit']]);
});

Route::get('/form',function(){
	return view('task');
});
/* controller syntax: 
   Route::methodname('url_format','controllername@function_name');
*/
//Route::get('/insert','todocontroller@index');
  Route::post('/insert','todocontroller@index');

//accessing GET parameter in closer
   /* Route::get('/edit/{rid}',function($rid){
    return $rid;

    });*/
//Passing GET Parameter to the Controller.
   
    /*Route::get('/edit/{rid}',function($rid){
    	return($rid);
    });*/
    Route::get('edit/{rid}','todocontroller@edit');
    Route::get('delete/{rid}','todocontroller@delete');
    Route::post('/update/{rid}','todocontroller@updaterecord');
    

//Route for form uploading file
Route::get('/upload',function(){
	return view ('fileupload');
});
Route::post('/upload','todocontroller@store');
Route::get('/dashboard','todocontroller@display');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index',function(){

    return view('child');
});
