<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller('/login','LoginCon');

Route::get('/Salir', function()
{
    Auth::logout();
    return Redirect::to('/login');
});

Route::get('/menu/{jp}','MenusCon@menu');

Route::get('/menu/{jp}/page/{pagina}','MenusCon@menu_pagina');

Route::get('/menu/{jp}/genero/{genero}','MenusCon@genero');

Route::get('/menu/{jp}/genero/{genero}/page/{pagina}','MenusCon@genero_pagina');

Route::get('/menu/{jp}/tipo/{genero}','MenusCon@genero');

Route::get('/menu/{jp}/tipo/{genero}/page/{pagina}','MenusCon@genero_pagina');

Route::post('buscar','MenusCon@buscar');

//-------------------------------------
Route::controller('/insertar/noticia','SubidaConNO');

Route::controller('/insertar/{jp}','SubidaCon');

Route::controller('/dashboard','TableroCon');

//-------------------------------------
Route::get('/noticias/{id_noticias}','VistaCon@vistaNoticias');

Route::get('/link/{id_titulo}','LinkCon@link_capcha');

Route::post('/link_verificar','LinkCon@link_verificar');

Route::get('/{jp}/{id_titulo}','VistaCon@vistaEntrada');

//-------------------------------------

Route::get('/','PrincipalCon@Index');

//-------------------------------------
