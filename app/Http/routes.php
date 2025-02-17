<?php

Route::get('product/store', 'Product\Backend\ProductController@store');
//Route::get('tax/store', 'Tax\Backend\TaxController@store');
//Route::get('tax', 'Tax\Backend\TaxController@index');

//Route::get('product/delete', 'Product\Backend\ProductController@delete');

/**
 * Switch between the included languages
 */

//Event::listen('Innovate.*','\Innovate\Listeners\EmailNotifier');

$router->group(['namespace' => 'Language'], function () use ($router) {
    require (__DIR__ . '/Routes/Language/Lang.php');
});

/**
 * Frontend Routes
 * Namespaces indicate folder structure
 */
$router->group(['namespace' => 'Frontend'], function () use ($router) {
    require (__DIR__ . '/Routes/Frontend/Frontend.php');
    require (__DIR__ . '/Routes/Frontend/Access.php');
});

/**
 * Backend Routes
 * Namespaces indicate folder structure
 */
$router->group(['namespace' => 'Backend'], function () use ($router) {
    $router->group(['prefix' => 'admin', 'middleware' => 'auth'], function () use ($router) {
        /**
         * These routes need view-backend permission (good if you want to allow more than one group in the backend, then limit the backend features by different roles or permissions)
         *
         * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
         */
        $router->group(['middleware' => 'access.routeNeedsPermission:view-backend'], function () use ($router) {
            require (__DIR__ . '/Routes/Backend/Dashboard.php');
            require (__DIR__ . '/Routes/Backend/Access.php');
            require (__DIR__ . '/Routes/Backend/LogViewer.php');
            require (__DIR__ . '/Routes/Backend/Innovate.php');
        });
    });
});
