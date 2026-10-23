<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\TramiteController;
use App\Models\User;
use App\Models\Postulante;
use App\Models\Tramite;

// Rutas Públicas (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Rutas Protegidas (Auth)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard', function () {
        $totalUsuarios = User::count();
        $totalPostulantes = Postulante::count();
        $totalAdmitidos = Postulante::where('estado', 'ADMITIDO')->count();
        $totalTramites = Tramite::count();

        return view('dashboard', compact('totalUsuarios', 'totalPostulantes', 'totalAdmitidos', 'totalTramites'));
    })->name('dashboard');

    // CRUDs del sistema
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('postulantes', PostulanteController::class);
    Route::resource('tramites', TramiteController::class);
});




use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\PagoController;
use App\Models\Matricula;
use App\Models\Pago;

// Dentro de Route::middleware('auth')->group(...)
Route::resource('matriculas', MatriculaController::class);
Route::resource('pagos', PagoController::class);

// Actualiza la consulta en /dashboard:
$totalMatriculas = Matricula::count();
$totalPagos = Pago::count();
// (Pasa estas variables en compact al return view 'dashboard')