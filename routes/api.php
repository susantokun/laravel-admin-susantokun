<?php

Route::group(['prefix' => 'v1/info', 'namespace' => 'Info\\Api'], function () {
    Route::get('category-certificates', 'CategoryCertificateController@index');
    Route::get('certificates', 'CertificateController@index');
    Route::get('platforms', 'PlatformController@index');
    Route::get('frameworks', 'FrameworkController@index');
    Route::get('category-portfolios', 'CategoryPortfolioController@index');
    Route::get('portfolios', 'PortfolioController@index');
    Route::get('places', 'PlaceController@index');
    Route::get('experiences', 'ExperienceController@index');
    Route::get('media-socials', 'MediaSocialController@index');
    Route::get('configurations', 'ConfigurationController@index');
});

Route::group(['prefix' => 'v1/demo', 'namespace' => 'Demo\\Api'], function () {
    Route::get('category-contents', 'CategoryContentController@index');
    Route::get('contents', 'ContentController@index');
});
