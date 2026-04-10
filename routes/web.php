<?php   

use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ReportesController;


use Illuminate\Support\Facades\Route;

Route::get('/app', function () {
    return view('cpanel.app');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admon', function () {
    return view('cpanel.inicio');
});

// Login
Route::get('/login', function () {
    return view('cpanel.usuarios.login');
})->name('login');

Route::post('/login', [UsuariosController::class, 'login'])->name('login.process');

Route::get('/bienvenido', function () {
    return view('cpanel.bienvenido');
})->name('bienvenido');

// RUTA CORRECTA PARA USUARIOS
Route::resource('usuarios', UsuariosController::class);
Route::delete('/admon/usuarios/delete-selected', 
    [UsuariosController::class, 'deleteSelected'])
    ->name('usuarios.deleteSelected');

//Route::get('/admon/reportes/pdf', [ReportesController::class, 'usuariosPDF'])->name('reporte.usuarios');


Route::prefix('admon')->group(function() {
    Route::get('/reportes/pdf', [ReportesController::class, 'usuariosPDF']);
});
