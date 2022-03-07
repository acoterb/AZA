<?php

use Illuminate\Support\Facades\Route;

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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\PrincipalController@index')->name('dashboard');

Route::group(['middleware' => ['auth']], function () {

    Route::resources([
        'servicios' => 'App\Http\Controllers\ServiciosController',
        'rh' => 'App\Http\Controllers\RhController',
        'cliente' => 'App\Http\Controllers\ClientesController',
        'cobradores' => 'App\Http\Controllers\CobradoresController',
        'zonas' => 'App\Http\Controllers\ZonasController',
        'reportes' => 'App\Http\Controllers\ReportesController',
        'vendedores' => 'App\Http\Controllers\VendedoresController',
        'pagos' => 'App\Http\Controllers\PagosController',
        'choques' =>  'App\Http\Controllers\ChoqueController',
        'logs' =>  'App\Http\Controllers\LogsController',
        'usuarios' => 'App\Http\Controllers\UserController',
        'principal' => 'App\Http\Controllers\PrincipalController'
    ]);
    Route::get('/','App\Http\Controllers\PrincipalController@index');

    Route::get('costos/{id}','App\Http\Controllers\ServiciosController@costos')->name('costos');
    Route::get('vehiculo/{id}','App\Http\Controllers\ClientesController@vehiculo')->name('vehiculo');

    Route::post('/choques/busqueda', 'App\Http\Controllers\ChoqueController@buscado')->name('choquesBusqueda');
    Route::get('/proceso/','App\Http\Controllers\ClientesController@correcion')->name('proceso.ocr');
    Route::get('/proceso/ocr','App\Http\Controllers\ClientesController@proceso_ocr')->name('proceso.ocr');
    Route::get('/paginado/cliente', 'App\Http\Controllers\ClientesController@paginado')->name('paginado.cliente');
    Route::get('/poliza/cliente/{id}','App\Http\Controllers\ClientesController@poliza')->name('poliza');
    Route::get('/poliza/cliente/epson230/{id}','App\Http\Controllers\ClientesController@polizaEpson230')->name('poliza-epson230');

    // reportes

    Route::get('/reportaDia','App\Http\Controllers\ReportesController@reportaDia')->name('reportaDia');
    Route::get('/reporteSemana','App\Http\Controllers\ReportesController@reporteSemana')->name('reporteSemana');
    Route::get('/reporteSemanaVendedor','App\Http\Controllers\ReportesController@reporteSemanaVendedor')->name('reporteSemanaVendedor');
    Route::get('/reporteRenovaciones','App\Http\Controllers\ReportesController@reporteRenovacione')->name('reporteRenovaciones');

 // Pagos

    Route::post('/pagos/busqueda', 'App\Http\Controllers\PagosController@buscado')->name('pagosBusqueda');

});

