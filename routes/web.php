<?php
/** @var \Laravel\Lumen\Routing\Router $router */
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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key',function() use ($router){
    return \Illuminate\Support\Str::random(32);
});

$router->post('/login','AuthController@login');
$router->post('/register','AuthController@register');

$router->group(['middleware' => 'login'], function() use ($router) {
    $router->get('/dosen','DosenController@index');
    $router->post('/dosen','DosenController@store');
    $router->get('/dosen/{id}','DosenController@show');
    $router->put('/dosen/{id}/update','DosenController@update');
    $router->delete('/dosen/{id}','DosenController@destroy');
    
    $router->get('/matakuliah','MatakuliahController@index');
    $router->post('/matakuliah','MatakuliahController@store');
    $router->get('/matakuliah/{id}','MatakuliahController@show');
    $router->put('/matakuliah/{id}/update','MatakuliahController@update');
    $router->delete('/matakuliah/{id}','MatakuliahController@destroy');
    
    $router->get('/mahasiswa','MahasiswaController@index');
    $router->post('/mahasiswa','MahasiswaController@store');
    $router->get('/mahasiswa/{id}','MahasiswaController@show');
    $router->put('/mahasiswa/{id}/update','MahasiswaController@update');
    $router->delete('/mahasiswa/{id}','MahasiswaController@destroy');
    
    $router->post('/mahasiswa/matkul','MahasiswaController@tambahMatkul');
});