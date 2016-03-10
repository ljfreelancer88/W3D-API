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
define('VERSION', 'v1');

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('status/{status}', function() {
    //return view('status', ['status' => $status]);
    $results = DB::select("SELECT * FROM `news`");
    //return json_encode($results) . ' | ' . response()->json($results);
    return response()->json($results);    
});
        
//$app->get('status/{fname}', 'StatusController@index');
/*
$app->get('status', function() {
    return $this->render('');
});
 * 
 */
// View All
$app->get(VERSION . '/users', function() {
    return 'All Users';
});
// VIew One
$app->get(VERSION . '/users/{id}', function($id) {    
    if (is_numeric($id)) {
        return response()->json(DB::table('news')->where('id', $id)->first());
        //return json_encode($news);
    } else {
        return json_encode(['error' => 'URI format is invalid.']);
    }
});
// Insert One
$app->post(VERSION . '/users', function($title, $content) {
    DB::table('news')->insert([
        'title' => $title,
        'content' => $content
    ]);
    return 'Add user';
});
// Update One
$app->put(VERSION . '/users/{id}', function($id) {
    if (is_numeric($id)) {
        return 'Update One';
        //return response()->json(DB::table('news')->where('id', $id)->first());
        //return json_encode($news);
    } else {
        return json_encode(['error' => 'URI format is invalid.']);
    }
});
// Junk One
$app->delete(VERSION . '/users/{id}', function($id, $token) {
    DB::table('users')->delete('id', $id);
});

$app->get('/key', function() {
    return str_random(32);
});

//Register
$app->post('v2/users', 'UsersController@create');
//Get all users
$app->get('v2/users', 'UsersController@read');
//Get specific user from users
$app->get('v2/users/{id}', 'UsersController@read');
//Update specific user from users
$app->put('v2/users', 'UsersController@update');
//Delete specifc user from users
$app->post('v2/users/{id}', 'UsersController@delete');
