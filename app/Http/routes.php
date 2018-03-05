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

//Route::get('/', function () {
//    return view('welcome');
//});
//因为已经有新5.2后部分已经开启了全局session 所以需要单独抽离一些路由
Route::get( '/','Home\IndexController@index' );
Route::get( '/index','Home\IndexController@index' );
Route::get( '/list/{cate_id}','Home\IndexController@cate' );
Route::get( '/a/{art_id}','Home\IndexController@article' );
Route::get( '/serch/','Home\IndexController@serch' );

Route::any( 'admin/login','Admin\LoginController@login' );
Route::get( 'admin/code','Admin\LoginController@code' );

//Route::any( 'admin/crypt','Admin\LoginController@crypt' );
//Route::any( 'admin/index','Admin\IndexController@index' );


/**
 * 中间件
 */
Route::group( ['prefix'=>'admin','namespace'=>'Admin','middleware'=>['admin.login']],function(){
    Route::any( 'index','IndexController@index' );
    Route::get( 'info','IndexController@info' );
    Route::get( 'logout','LoginController@logout' );
    Route::any( 'pass','LoginController@pass' );
    Route::resource('cate/changeorder', 'CategoryController@changeOrder');
    Route::resource('links/changeorder', 'LinksController@changeOrder');
    Route::resource('config/changeorder', 'ConfigController@changeOrder');
    Route::resource('config/changecontent', 'ConfigController@changeContent');
    Route::resource('config/putfile', 'ConfigController@putFile');//将网站配置项写入配置文件
    Route::resource('category', 'CategoryController');//分类资源路由
    Route::resource('article', 'ArticleController');//文章资源路由
    Route::resource('links', 'LinksController');//友情连接资源路由
    Route::resource('navs', 'NavsController');//导航栏资源路由
    Route::resource('config', 'ConfigController');//网站配置资源路由
    Route::any( 'upload','CommonController@upload' );//上传图片控制器路由
});