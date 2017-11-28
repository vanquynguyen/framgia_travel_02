<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| connection_aborted(oid)ins the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Sites\HomeController@index')->name('home');
Route::get('/search', 'Sites\HomeController@searchAjax')->name('search');
Route::get('/admin', function() {
    return view('admin._component.test')->name('admin');
});
Route::group(['prefix' => 'admin', 'as' => 'admin.',  
    'namespace' => 'Admin'], function() {
        Route::resource('/user', 'AdminController');
        Route::post('/user/updateLevel', 'AdminController@updateLevel')->name('user.updateLevel');
        Route::post('/user/updateStatus', 'AdminController@updateStatus')->name('user.updateStatus');
        Route::get('/category', 'CategoryController@index')->name('category.index');
        Route::post('/category/updateStatus', 'CategoryController@updateStatus')->name('category.updateStatus');
        Route::post('/category/store', 'CategoryController@store')->name('category.store');
        Route::get('/category/search', 'CategoryController@search')->name('category.search');
        Route::get('/category/filter', 'CategoryController@filter')->name('category.filter');
        Route::get('/category/show', 'CategoryController@show')->name('category.show');
        Route::post('/category/update', 'CategoryController@update')->name('category.update');
        Route::resource('/province', 'ProvinceController');
        Route::post('/province/{id}', 'ProvinceController@update')->name('province.update');
        Route::resource('/service', 'ServiceController');
        Route::post('/service/{id}', 'ServiceController@update')->name('service.update');
        Route::resource('/plan', 'PlanController');
        Route::post('/plan', 'PlanController@store')->name('plan.store');
        Route::post('/plan/{id}', 'PlanController@update')->name('plan.update');
        Route::get('/request-service', 'RequestServiceController@index')->name('request.service');
        Route::post('/request-service/{id}', 'RequestServiceController@update')->name('request.service.update');
        Route::get('/request-service/search', 'RequestServiceController@search')->name('request.service.search');
        Route::get('/request-service/filter', 'RequestServiceController@filter')->name('request.service.filter');
});
Route::group(['namespace' => 'Admin'], function() {
    Route::get('/service/filter', 'ServiceController@filter');
    Route::get('/search/user', 'AdminController@search');
    Route::get('/province/search', 'ProvinceController@search');
    Route::get('/service/search', 'ServiceController@search');
    Route::get('/plan/search', 'PlanController@search');
    Route::get('/user/showData', 'AdminController@showData')->name('user.showData');
    Route::get('/request-service/showData', 'RequestServiceController@showData')->name('request.service.showData');
    Route::get('/province/showData', 'ProvinceController@showData')->name('province.showData');
    Route::get('/service/showData', 'ServiceController@showData')->name('service.showData');
    Route::get('/user/filter', 'AdminController@filter')->name('user.filter');
    Route::get('/plan/filter', 'PlanController@filter')->name('plan.filter');
    Route::get('/admin/profile/{id}', 'PlanController@profile')->name('admin.profile');
});
Route::post('/register', 'LoginController@register')->name('register');
Route::get('/login', 'LoginController@login')->name('login');
Route::get('/profile', 'Sites\UserController@index')->name('user.profile');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/profile/avatar/{id}', 'Sites\UserController@changeAvatar')->name('user.changeAvatar');
Route::post('/register', 'LoginController@register')->name('register');
Route::post('/profile/password/{id}', 'Sites\UserController@changePassword')->name('user.changePassword');
Route::get('/profile', 'Sites\UserController@index')->name('user.profile');
Route::post('/profile/email/{id}', 'Sites\UserController@changeEmail')->name('user.changeEmail');
Route::post('/profile/{id}', 'Sites\UserController@updateProfile')->name('user.updateProfile');
Route::post('/profile/password/{id}', 'Sites\UserController@changePassword')->name('user.changePassword');
Route::get('/profile/setting', 'Sites\UserController@setting')->name('user.setting');
Route::post('/profile/email/{id}', 'Sites\UserController@changeEmail')->name('user.changeEmail');
Route::get('/dashboard/{id}', 'Sites\DashboardController@showDashboard')->name('user.dashboard');
Route::post('/profile/{id}', 'Sites\UserController@updateProfile')->name('user.updateProfile');
Route::get('/request', 'Sites\DashboardController@getRequest')->name('user.request');
Route::get('/profile/setting', 'Sites\UserController@setting')->name('user.setting');
Route::post('/request', 'Sites\DashboardController@postRequest')->name('user.getRequest');
Route::get('/dashboard/{id}', 'Sites\DashboardController@showDashboard')->name('user.dashboard');
Route::get('/plan', 'Sites\DashboardController@getPlan')->name('user.plan');
Route::post('/plan', 'Sites\DashboardController@postPlan')->name('user.addplan');
Route::post('/request', 'Sites\DashboardController@postRequest')->name('user.getRequest');
Route::get('/plan/{id}/detail', 'Sites\DetailController@showDetail')->name('user.plan.detail');
Route::get('/plan', 'Sites\DashboardController@getPlan')->name('user.plan');
Route::get('/schedule/{id}/edit', 'Sites\DashboardController@getSchedule')->name('user.schedule');
Route::post('/plan', 'Sites\DashboardController@postPlan')->name('user.addplan');
Route::post('/schedule/update/{id}', 'Sites\DashboardController@postSchedule')->name('schedule.postSchedule');
Route::get('/plan/{id}/detail', 'Sites\DetailController@showDetail')->name('user.plan.detail');
Route::get('/showservice', 'AjaxController@getService')->name('schedule.service');
Route::get('/schedule/{id}/edit', 'Sites\DashboardController@getSchedule')->name('user.schedule');
Route::get('/result', 'AjaxController@getResult')->name('schedule.result');
Route::post('/schedule/update/{id}', 'Sites\DashboardController@postSchedule')->name('schedule.postSchedule');
Route::get('/showservice', 'AjaxController@getService')->name('schedule.service');
Route::get('/result', 'AjaxController@getResult')->name('schedule.result');
Route::post('/plan/{id}/comment', 'CommentController@postComment')->name('user.plan.comment');
