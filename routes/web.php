<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Tramite;

Route::get('/boletin', 'ContenidoController@boletin');
Route::get('/tramites/{id}','GenericController@tramitexcategoria');
Route::get('/semilleroinfo/{id}','GenericController@semillerosInfo');
Route::get('/', 'GenericController@index');
Route::get('/mision', 'GenericController@mision');
Route::get('/perfiles', 'GenericController@perfiles');
Route::get('/investigacion', 'GenericController@inves');
Route::get('/procesos', 'GenericController@procesos');
Route::get('/amigos', 'GenericController@amigos');
Route::get('/semilleros', 'GenericController@semilleros');
Route::get('/docentes', function () {
    return view('pagina.contenido.docentes');
});
Route::get('/pensum', function () {
    return view('pagina.contenido.pensum');
});Route::get('/contenido', function () {
    return view('pagina.contenido.contenidoprogramatico');
});
Route::post('/contenido', 'ContenidoController@contenidos');

Route::post('/c', 'ContenidoController@contenido');
Route::post('/actualizarContenido', 'ContenidoController@actualizar');
Route::post('/mensaje','MensajeController@store');
Route::get('/info/{id}','GenericController@infoevento');
Route::get('/novedad/{id}','GenericController@infonovedad');
Route::get('/hola', 'GenericController@sliderI');
Route::get('/novedadesTodas', 'GenericController@novedades');
Route::group(['middleware'=>['guest']],function(){
    Route::get('/login','Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::get('slider','SliderController@slider');
    Route::get('slider2','SliderController@slider');
});
Route::get('/tramites','GenericController@trami');
Route::get('/tramitescategoria/{id}','GenericController@tramitecategoria');
Route::get('/tramite/{id}','GenericController@tespecifico');
Route::get('/proyecto/{id}','GenericController@proyectos');
Route::get('/formulario','GenericController@formulario');
Route::group(['middleware'=>['auth']],function(){
    Route::get('/admin', function () {
        return view('contenido/contenido');
    })->name('admin');

    Route::post('/admin/categoria/registerCategoria','CategoriaController@store');

    Route::get('/admin/categoria','CategoriaController@index');
    Route::post('/admin/categoria/updateCategoria','CategoriaController@update');


    Route::get('/admin/slider','SliderController@index');
Route::post('/admin/slider/registerSlider','SliderController@store');
Route::post('/admin/categoria/deletedCategoria','CategoriaController@destroy');


Route::post('/admin/archivo/registerArchivo','ArchivoController@store');
Route::get('/admin/archivo','ArchivoController@index');
Route::post('/admin/archivo/updateArchivo','ArchivoController@update');
Route::post('/admin/archivo/deletedArchivo','ArchivoController@destroy');

Route::post('/admin/slider/updateSlider','SliderController@update');

Route::post('/admin/slider/deletedSlider','SliderController@destroy');
Route::get('/admin/usuario','UserController@index');
Route::post('/admin/usuario/registerUser','UserController@store');
Route::post('/admin/usuario/updateUser','UserController@update');
Route::post('/admin/usuario/deletedUser','UserController@destroy');

Route::post('/admin/evento/registerEvento','EventoController@store');
Route::get('/admin/evento','EventoController@index');
Route::post('/admin/evento/updateEvento','EventoController@update');
Route::post('/admin/evento/deletedEvento','EventoController@destroy');

Route::post('/admin/novedad/registerNovedad','NovedadController@store');
Route::get('/admin/novedad','NovedadController@index');
Route::post('/admin/novedad/updateNovedad','NovedadController@update');
Route::post('/admin/novedad/deletedNovedad','NovedadController@destroy');
Route::get('/admin/tramite','TramiteController@index');

Route::post('/admin/tramite/Categorias','TramiteController@categorias');
Route::post('/admin/tramite/registerTramite','TramiteController@registrar');
Route::post('/admin/tramite/updatedTramite','TramiteController@updated');
Route::post('/admin/tramite/deletedTramite','TramiteController@destroy');
Route::post('/admin/archivo_tramite/archivos','ArchivoController@archivos');
Route::post('/admin/archivo_tramite/tramites','TramiteController@tramites');
Route::post('/admin/archivo_tramite/registera_t','ArchivoTramiteControlleer@registrar');
Route::get('/admin/tramitesporarchivo', 'ArchivoTramiteControlleer@index');
Route::post('/admin/tramitesporarchivoEliminar', 'ArchivoTramiteControlleer@destroy');

Route::post('/admin/registrarSemillero', 'SemilleroController@registrar');
Route::post('/admin/semilleros', 'SemilleroController@semilleros');
Route::post('/admin/semillerosd', 'SemilleroController@datos');
Route::post('/actualizarSemillero', 'SemilleroController@actualizar');
Route::post('/eliminarSemillero', 'SemilleroController@destroy');


Route::post('/registrarProyecto', 'ProyectoController@registrar');
Route::post('/actualizarProyecto', 'ProyectoController@actualizar');
Route::post('/eliminarProyecto', 'ProyectoController@destroy');
Route::post('/admin/archivo_tramite/registera_p', 'ProyectoController@registrar2');
Route::post('/p', 'ProyectoController@p');
Route::get('/pr', 'ProyectoController@index');
Route::post('/admin/eliminarap', 'ProyectoController@destroy2');
Route::post('/admin/pro', 'ProyectoController@pro');



Route::get('/admin/mensaje','MensajeController@index');
Route::get('/admin/mensaje2','MensajeController@index2');
Route::post('/admin/correo','MensajeController@responder');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');
});
