<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'GuestController@home') -> name('home');

Route::post('/register', 'Auth\RegisterController@register') -> name('register');

Route::post('/login', 'Auth\LoginController@login') -> name('login');
Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');

Route::get('/api/videogames/list', 'ApiController@getVideogames') -> name('api.videogames.list');
Route::get('/api/videogame/delete/{id}', 'ApiController@deleteVideogame') -> name('api.videogame.delete');