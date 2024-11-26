<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TransaccionController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login');
    }
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class);
    Route::resource('personas', PersonaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('tipos', TipoController::class);
    Route::resource('laboratorios', LaboratorioController::class);
    Route::resource('productos', ProductoController::class);

    // Rutas para las Entradas
    Route::get('entradas', [TransaccionController::class, 'index_entrada'])->name('transacciones.entradas.index');
    Route::get('entradas/create', [TransaccionController::class, 'create_entrada'])->name('transacciones.entradas.create');
    Route::post('entradas', [TransaccionController::class, 'store_entrada'])->name('transacciones.entradas.store');
    Route::get('entradas/{id}/edit', [TransaccionController::class, 'edit_entrada'])->name('transacciones.entradas.edit');
    Route::put('entradas/{id}', [TransaccionController::class, 'update_entrada'])->name('transacciones.entradas.update');
    Route::delete('entradas/{id}/destroy', [TransaccionController::class, 'destroy_entrada'])->name('transacciones.entradas.destroy');

    // Rutas para las Salidas
    Route::get('salidas', [TransaccionController::class, 'index_salida'])->name('transacciones.salidas.index');
    Route::get('salidas/create', [TransaccionController::class, 'create_salida'])->name('transacciones.salidas.create');
    Route::post('salidas', [TransaccionController::class, 'store_salida'])->name('transacciones.salidas.store');
    Route::get('salidas/{id}/edit', [TransaccionController::class, 'edit_salida'])->name('transacciones.salidas.edit');
    Route::put('salidas/{id}', [TransaccionController::class, 'update_salida'])->name('transacciones.salidas.update');
    Route::delete('salidas/{id}/destroy', [TransaccionController::class, 'destroy_salida'])->name('transacciones.salidas.destroy');

    // Reportes
    Route::get('/transacciones/entrada/{id}/pdf', [TransaccionController::class, 'generarPDF_entrada'])->name('transacciones.entradas.pdf');
    Route::get('/transacciones/salida/{id}/pdf', [TransaccionController::class, 'generarPDF_salida'])->name('transacciones.salidas.pdf');

});

require __DIR__.'/auth.php';
