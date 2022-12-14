<?php

use App\Http\Livewire\BootstrapTables;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Lock;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\ForgotPasswordExample;
use App\Http\Livewire\Index;
use App\Http\Livewire\LoginExample;
use App\Http\Livewire\ProfileExample;
use App\Http\Livewire\RegisterExample;
use App\Http\Livewire\Transactions;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ResetPasswordExample;
use App\Http\Livewire\UpgradeToPro;
use App\Http\Livewire\Users;
use App\Http\Livewire\Negocio\SedeIndex;
use App\Http\Livewire\Negocio\AreaIndex;
use App\Http\Livewire\Negocio\PuestoTrabajoIndex;
use App\Http\Livewire\Negocio\VehiculoIndex;
use App\Http\Livewire\Usuarios\UsuarioIndex;
use App\Http\Livewire\Cliente\AgendaCita;
use App\Http\Livewire\Cliente\CitaIndex;
use App\Http\Livewire\Cliente\ShowCita;

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

Route::redirect('/', '/login');

Route::get('/register', Register::class)->name('register');

Route::get('/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');
Route::get('/upgrade-to-pro', UpgradeToPro::class)->name('upgrade-to-pro');

Route::middleware('auth')->group(function () {
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/profile-example', ProfileExample::class)->name('profile-example');
    Route::get('/users', Users::class)->name('users');
    Route::get('/login-example', LoginExample::class)->name('login-example');
    Route::get('/register-example', RegisterExample::class)->name('register-example');
    Route::get('/forgot-password-example', ForgotPasswordExample::class)->name('forgot-password-example');
    Route::get('/reset-password-example', ResetPasswordExample::class)->name('reset-password-example');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/transactions', Transactions::class)->name('transactions');
    Route::get('/bootstrap-tables', BootstrapTables::class)->name('bootstrap-tables');
    Route::get('/lock', Lock::class)->name('lock');
    Route::middleware('admin')->group(function () {
        Route::get('/usuarios', UsuarioIndex::class)->name('usuarios');
        Route::get('/sedes', SedeIndex::class)->name('sedes');
        Route::get('/areas', AreaIndex::class)->name('areas');
        Route::get('/puestos-de-trabajo', PuestoTrabajoIndex::class)->name('puestos-trabajo');
    });
    
    Route::get('/vehiculos', VehiculoIndex::class)->name('vehiculos');
    Route::get('/agendar-cita/{vehiculo}', AgendaCita::class)->name('agendar-cita');
    Route::get('/citas', CitaIndex::class)->name('citas');
    Route::get('/citas/{cita}', ShowCita::class)->name('citas.ver-detalle');
});
