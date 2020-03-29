<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/api', function() {
    return response()->json(['message' => 'this is the app root']);
});

$router->get('/api/items', 'ItemsController@index');
$router->get('/api/items/search', 'ItemsController@retrieveByItemName');
$router->get('/api/items/{itemId}', 'ItemsController@retrieveByItemId');
