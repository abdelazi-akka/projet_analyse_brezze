<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AnalyseController;
use App\Http\Controllers\AnalysesController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EmployeResultatController;
use App\Http\Controllers\EmployesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get("/dashboard",[HomeController::class,"index"])->middleware(["auth"])->name("dashboard");
/*------------------------------------------------------- */
Route::middleware(['auth','user-role:admin'])->group(function()
{
    
    Route::resource("/dashboard/admin",AdminController::class);
    Route::resource("/admin/employes",EmployesController::class);
    Route::resource("/admin/analyse",AnalyseController::class);
    Route::get('/admin/resultat',[AdminController::class,"create"])->name("admin.AfficherResultat");
    Route::delete('/admin/resultat/{id}',[AdminController::class,"destroy"])->name("admin.SupprimerResultat");
    Route::get('/admin/resultat/{id}/edit',[AdminController::class,"edit"])->name("admin.ModifierResultat");
    Route::put('/admin/resultat/{id}',[AdminController::class,"update"])->name("admin.UpdateResultat");
    Route::get('/admin/resultat/{id}',[AdminController::class,"show"])->name("admin.ValiderResultat");
    Route::get('/admin/historique-resultat',[AdminController::class,"store"])->name("admin.HistoriqueResultat");
    Route::get('/admin/paiements',[AdminController::class,"listePaiements"])->name("admin.paiement");
});
/*------------------------------------------------------- */
Route::middleware(['auth','user-role:employe'])->group(function()
{
    Route::resource("/dashboard/employe",EmployeController::class);
    Route::resource('/employe/patients', ClientController::class);
    Route::resource('/employe/analyses', AnalysesController::class);
    Route::resource('/employe/resultat', EmployeResultatController::class);
});
/*------------------------------------------------------- */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
