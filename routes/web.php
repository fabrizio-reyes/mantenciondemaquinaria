<?php

/*
|---style="margin: 15px; margin-right: 1400px;"-----------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Auth\LoginController@showLoginForm');

//RUTAS MAQUINARIA
Route::get('maquinarias/crear', ['as' => 'maquinarias.crear', 'uses' => 'MaquinariasController@create']);

Route::get('maquinarias', ['as' => 'maquinarias.index', 'uses' => 'MaquinariasController@index']);

Route::post('maquinarias', ['as' => 'maquinarias.store', 'uses' => 'MaquinariasController@store']);

Route::get('maquinarias/{codigo}/editar', ['as' => 'maquinarias.editar', 'uses' => 'MaquinariasController@editar']);

Route::put('maquinarias/{codigo}', ['as' => 'maquinarias.update', 'uses' => 'MaquinariasController@update']);

Route::delete('maquinarias/{codigo}', ['as' => 'maquinarias.destroy', 'uses' => 'MaquinariasController@destroy']);

Route::get('maquinarias/{codigo}', ['as' => 'maquinarias.show', 'uses' => 'MaquinariasController@show']);

Route::get('maquinaria_pdf', 'MaquinariasController@pdf')->name('maquinarias.pdf');

Route::get('mantencionesPreventivas', ['as' => 'maquinarias.mantencionesPreventivas', 'uses' => 'MaquinariasController@mantencionesPreventivas']);

Route::get('/salass', 'UbicacionesController@getSalass');






//RUTA NOTIFICACIONES
Route::get('notificaciones', 'NotificacionesController@index')->name('notificaciones.index');
Route::patch('notificaciones/{codigo}', 'NotificacionesController@read')->name('notificaciones.read');




//RUTAS CENTRO DE SALUD

Route::get('ubicaciones/crear/{codigo}', ['as' => 'ubicaciones.create2', 'uses' => 'UbicacionesController@create2']);

Route::get('ubicaciones/ver/{codigo}', ['as' => 'ubicaciones.showUbicaciones', 'uses' => 'UbicacionesController@showUbicaciones']);


Route::resource('centrosdesalud','CentrosDeSaludController');



Route::resource('perfiles','PerfilesController');


Route::resource('usuarios', 'UsuariosController');

Route::resource('empresasexternas', 'EmpresaExternaController');

Route::resource('convenios', 'ConvenioController');
//NUEVAS
Route::resource('tipos','TiposController');

Route::resource('areas','AreasController');

Route::resource('salas','SalasController');

Route::resource('ubicaciones','UbicacionesController');
//RUTAS ESTADO DE SOLICITUD

Route::resource('estadosolicitudes','EstadoSolicitudesController');

//RUTA SOLICITUD
Route::get('solicitudes/reporte', ['as' => 'solicitudes.reporte', 'uses' => 'SolicitudesController@reporte']);
Route::get('solicitudes/reporte2', ['as' => 'solicitudes.reporte2', 'uses' => 'SolicitudesController@reporte2']);
Route::resource('solicitudes','SolicitudesController');
Route::post('solicitud_pdf', 'SolicitudesController@pdf')->name('solicitudes.pdf');
Route::post('solicitud2_pdf', 'SolicitudesController@pdf2')->name('solicitudes2.pdf');
Route::get('solicitudes/{codigo}/createPreventiva', ['as' => 'solicitudes.createPreventiva', 'uses' => 'SolicitudesController@createPreventiva']);

//RUTA FALLA SOLICITUD

Route::resource('fallassolicitudes','FallasSolicitudesController');

//RUTA MANTENCIONES

Route::resource('mantenciones','MantencionesController');

//RUTA TIPOS FALLAS

Route::resource('tiposfallas','TiposFallasController');



Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\LoginController@showLoginForm' ]);

//Route::post('login', 'Auth\LoginController@login');

//Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();




Route::get('test', function(){
	$user = new App\User;

	$user->name = 'Fabrizio2';
	$user->email= 'fabrizio2@email.com';
	$user->password = bcrypt('1234');
	$user->save();

	return $user;


});

Route::resource('users','UsersController');


Route::get('emails/{codigo}',  ['as' => 'solicitudes.email', 'uses' => 'SolicitudesController@emailEmpresaExterna']);

Route::get('rechazar/{codigo}',  ['as' => 'solicitudes.rechazar', 'uses' => 'SolicitudesController@rechazarSolicitud']);


Route::get('export', 'MyController@export')->name('export');
Route::get('importExportView', ['as' => 'maquinarias.importExportView','uses' => 'MyController@importExportView' ]);
Route::post('import', 'MyController@import')->name('import');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
