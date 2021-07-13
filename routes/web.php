<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Middleware\CheckValidation;
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
//Login Routes
Route::get('/admin-login','AdminLoginController@loginForm')->name('admin-login');
Route::post('/admin-login','AdminLoginController@checkCredentials')->name('check-credentials');

Route::get('/admin-register','AdminRegisterController@registerForm')->name('admin-register');
Route::post('/admin-register','AdminRegisterController@saveUser')->name('save-user');




Route::group(['middleware' => ['checkLogin','validateRoute']],function(){
    
    Route::get('/admin-logout','AdminLoginController@logoutUser')->name('admin-logout');
    Route::get('/', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');
    
    Route::get('/demo', function () {
        return view('dashboard.demo');
    });
    
    // Route::view('/form/create','form');
    
    Route::view('/todo/create','todos.create')->name('todo.create');
    Route::post('/todo/create','TodosController@store')->name('todo.store');
    Route::get('/todo','TodosController@index')->name('todo.view');
    Route::get('/todo/edit/{id}','TodosController@edit')->name('todo.edit');
    Route::post('/todo/edit/{id}','TodosController@update')->name('todo.update');
    Route::get('/todo/delete/{id}','TodosController@delete')->name('todo.delete');
    
    //blog
    Route::view('/blog/create','blog.create')->name('blog.create');
    Route::post('/blog/create','BlogController@store')->name('blog.store');
    Route::get('/blog','BlogController@index')->name('blog.view');
    Route::get('/blog/{id}','BlogController@show')->name('blog.show');
    Route::get('/blog/edit/{id}','BlogController@edit')->name('blog.edit');
    Route::post('/blog/edit/{id}','BlogController@update')->name('blog.update');
    Route::get('/blog/delete/{id}','BlogController@delete')->name('blog.delete');
    
    
    
    Route::post('/comment/create','CommentController@store')->name('comments.store');
    
    
});




// Route::get('/get-second/{id}/{test}', function ($id) {
    // 	// dd("first get");
    // 	dd($id,$test);
    // })->name('first');
    
    // Route::get('/get-first', function () {
        // 	// return view('welcome');
        // 	dd("second-get");
        // })->name('second');
        
        
        // Route::post('/post',function(Request $request){
            // 	dd(Request()->all());
            // });
            
            
            
            // // User Access
            // // admin,superadmin,editor,check
            // // url->route->middleware->controller->middleware->model->view
            // // Route::get('/controller','Lumbini1Controller@index')->middleware('checkValidation');
            
            
            
            // Route::group(['middleware'=>'[checkValidation]', 'prefix' => 'lumbini','as' => 'lumbini.'],function(){
                // 	Route::get('/', function (Request $request) {
                    // 		return view('welcome');
                    // 	})->name('home')->withoutMiddleware('checkValidation');
                    // 	Route::get('/test', function (Request $request) {
                        // 		// lumbini/test
                        // 		dd("In test");
                        // 		return view('welcome');
                        // 	})->name('test');
                        // });
                        
                        // //User Access 
                        // // admin,editor,author
                        
                        // Route::get('/terminate',function(){
                            // 	echo ("In Web.php </br>");
                            // })->middleware('terminateCheck:admin,19');
                            
                            // Route::get('/terminate','TerminateController')->middleware('terminateCheck:admin,19');
                            
                            
                            
                            // Route::group([
                                // 	'prefix' =>'chitwan',
                                // 	'as' => 'chitwan.',
                                // 	],function(){
                                    // Route::get('/', function (Request $request) {
                                        // 	dd("In Chitwan");
                                        // 	return view('welcome');
                                        // })->name('home');
                                        // 	Route::get('/post/{id}/comment/{comment_id}', function (Request $request) {
                                            // 		// chitwan/test/{id}
                                            // 		dd("In test ");
                                            // 		return view('welcome');
                                            // 	});
                                            // });
                                            
                                            // url->constructer->middleware->method->middleware->desctructor->view
                                            // Route::get('/kathmandu','KathmanduController@index');
                                            // Route::get('/kathmandu/create','KathmanduController@create');
                                            // Route::get('/kathmandu/delete','KathmanduController@delete');
                                            // Route::get('/kathmandu/view','KathmanduController@view');
                                            
                                            
                                            //localhost:8080/kathmandu
                                            
                                            // Route::get('/resource','ResourceController@index')->name('resource.');
                                            // Route::get('/resource/create','ResourceController@create');
                                            // Route::post('/resource/create','ResourceController@store');
                                            // Route::get('/resource/edit/{id}','ResourceController@edit');
                                            // Route::post('/resource/edit/{id}','ResourceController@update');
                                            // Route::post('/resource/destroy','ResourceController@destroy');
                                            // Route::get('/resource/{id}','ResourceController@show');
                                            
                                            // Route::resource('resource','ResourceController')->names([
                                                //     'create' => 'resource.newcreate',
                                                //     'store' => 'store-resource',
                                                // ]);
                                                
                                                // Route::resource('resources','ResourceController')->parameters([
                                                    //     'resources' => 'resource_parameter',
                                                    // ]);
                                                    
                                                    Route::resource('/resource', 'ResourceController');
                                                    
                                                    // Route::get('/resource','ResourceController@store')->name('resource.index');
                                                    // Route::post('/resource/update/{id}','ResourceController@update')->name('update-resource');
                                                    
                                                    
                                                    
                                                    // index,create,show,edit,update,store,destroy
                                                    
                                                    
                                                    
