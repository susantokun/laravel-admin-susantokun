<?php

/*
 * |==============================================================|
 * | Please DO NOT modify this information :                      |
 * |--------------------------------------------------------------|
 * | Author          : Susantokun
 * | Email           : admin@susantokun.com
 * | Instagram       : @susantokun
 * | Website         : http://www.susantokun.com
 * | Youtube         : http://youtube.com/susantokun
 * | File Created    : Friday, 28th February 2020 2:50:20 pm
 * | Last Modified   : Friday, 28th February 2020 2:50:20 pm
 * |==============================================================|
 */

// Route::get('/link', function () {
//     Artisan::call('storage:link');
// });

Route::get('locale/{locale}', 'LocalizationController@index');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'WelcomeController@index');

// Auth::routes();
Auth::routes([
    'register' => false, // Register Routes...
    'reset' => false, // Reset Password Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::resource('menus', 'MenuController');
    Route::post('menus/delete/{id}', 'MenuController@delete');
});

Route::group(['prefix' => 'info', 'namespace' => 'Info', 'middleware' => 'auth'], function () {
    Route::resource('places', 'PlaceController');
    Route::post('places/delete/{id}', 'PlaceController@delete');

    Route::resource('category-certificates', 'CategoryCertificateController');
    Route::post('category-certificates/delete/{id}', 'CategoryCertificateController@delete');

    Route::resource('category-portfolios', 'CategoryPortfolioController');
    Route::post('category-portfolios/delete/{id}', 'CategoryPortfolioController@delete');

    Route::resource('certificates', 'CertificateController');
    Route::post('certificates/delete/{id}', 'CertificateController@delete');

    Route::resource('configurations', 'ConfigurationController');
    Route::post('configurations/delete/{id}', 'ConfigurationController@delete');

    Route::resource('experiences', 'ExperienceController');
    Route::post('experiences/delete/{id}', 'ExperienceController@delete');

    Route::resource('platforms', 'PlatformController');
    Route::post('platforms/delete/{id}', 'PlatformController@delete');

    Route::resource('frameworks', 'FrameworkController');
    Route::post('frameworks/delete/{id}', 'FrameworkController@delete');

    Route::resource('portfolios', 'PortfolioController');
    Route::post('portfolios/delete/{id}', 'PortfolioController@delete');

    Route::resource('media-socials', 'MediaSocialController');
    Route::post('media-socials/delete/{id}', 'MediaSocialController@delete');
});

Route::group(['prefix' => 'demo', 'namespace' => 'Demo', 'middleware' => 'auth'], function () {
    Route::resource('category-contents', 'CategoryContentController');
    Route::post('category-contents/delete/{id}', 'CategoryContentController@delete');

    Route::resource('contents', 'ContentController');
    Route::post('contents/delete/{id}', 'ContentController@delete');
});
