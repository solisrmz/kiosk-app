<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\adviser\AdviserHomeController;
use App\Http\Controllers\adviser\AlumnosController;
use App\Http\Controllers\users\UsersController;
use App\Http\Controllers\users\DocentesController;
use App\Http\Controllers\director\DirectorController;
use App\Http\Controllers\director\GruposController;
use App\Http\Controllers\academic\AcademicController;
use App\Http\Controllers\academic\ListasController;
use App\Http\Controllers\dataViewer\DataViewerController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\director\CatalogosController;
use App\Http\Controllers\PDFGenerateController;
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
Route::get('', function (){
    return view('auth.login');
});
Auth::routes();

Route::get('2fa', [App\Http\Controllers\Auth\TwoFAController::class, 'index'])->name('2fa.index');
Route::post('2fa', [App\Http\Controllers\Auth\TwoFAController::class, 'store'])->name('2fa.post');
Route::get('2fa/reset', [App\Http\Controllers\Auth\TwoFAController::class, 'resend'])->name('2fa.resend');
Route::get('change-password', [ResetPasswordController::class, 'changePassword'])->name('change-password');
Route::post('change-password', [ResetPasswordController::class, 'updatePassword'])->name('update-password');

Route::post('lista-categorias', [CatalogosController::class, 'categoriasList'])->name('lista-categorias');
Route::post('lista-modulos', [CatalogosController::class, 'modulosList']);
Route::post('lista-niveles', [CatalogosController::class, 'nivelesList']);
Route::post('alumnos-grupo', [CatalogosController::class, 'groupStudents'])->name('alumnos-grupo');

Route::prefix('admin')->middleware('role:admin')->group(function (){
    Route::get('', [AdminController::class, 'index'])->name('home')->middleware('role:admin');
    Route::get('nuevo-usuario', [AdminController::class, 'createUser'])->middleware('role:admin');
    Route::resource('usuarios', UsersController::class)->middleware('role:admin');
    Route::get('buscar-usuarios', [UsersController::class, 'searchUser'])->name('buscar-usuarios')->middleware('role:admin');
    Route::get('cambiar-estatus/{id}', [UsersController::class, 'changeUserStatus'])->name('cambiar-estatus')->middleware('role:admin');
});
Route::prefix('direccion-academica')->middleware(['role:director', '2fa'])->group(function (){
    Route::get('', [DirectorController::class, 'index'])->name('home')->middleware('role:director');
    Route::get('opciones/{id_grupo}/{opcion}', [DirectorController::class, 'groupOptions'])->name('opciones')->middleware('role:director');
    Route::post('calificaciones', [DirectorController::class, 'storeFinalReport'])->name('calificaciones')->middleware('role:director');
    Route::post('proyectar-grupo', [DirectorController::class, 'projectGroup'])->name('proyectar-grupo')->middleware('role:director');
    Route::post('cerrar-grupo/{id_grupo}', [DirectorController::class, 'closeGroup'])->name('cerrar-grupo')->middleware('role:director');
    Route::get('docentes-registrados', [DocentesController::class, 'index'])->middleware('role:director');
    Route::get('nuevo-docente', [DocentesController::class, 'create'])->middleware('role:director');
    Route::resource('docentes', DocentesController::class);
    Route::get('grupos-registrados', [GruposController::class, 'index'])->middleware('role:director');
    Route::get('detalle-grupo/{grupo}', [GruposController::class, 'getGroupById'])->name('detalle-grupo')->middleware('role:director');
    Route::get('nuevo-grupo', [GruposController::class, 'create'])->middleware('role:director');
    Route::resource('grupos', GruposController::class);
    Route::post('profesores', [GruposController::class, 'getTeachers'])->name('profesores');
    Route::post('asignar-profesor', [GruposController::class, 'addTeacherToGroup'])->name('asignar-profesor');
});
Route::prefix('docente')->middleware(['role:docente', '2fa'])->group(function (){
    Route::get('', [AcademicController::class, 'index'])->name('home')->middleware('role:docente');
    Route::get('grupos-docente', [ListasController::class, 'index'])->name('grupos-asignados')->middleware('role:docente');
    Route::get('lista-grupo/{id_grupo}/{opcion}', [ListasController::class, 'edit'])->name('lista-grupo')->middleware('role:docente');
    Route::post('listas/asistencia', [ListasController::class, 'updateAssistance'])->name('listas/asistencia')->middleware('role:docente');
    Route::post('listas/semanal', [ListasController::class, 'updateWeeklyReport'])->name('listas/semanal')->middleware('role:docente');
    Route::post('listas/final', [ListasController::class, 'storeFinalReport'])->name('listas/final')->middleware('role:docente');
    Route::resource('listas', ListasController::class);
});
Route::prefix('asesor')->middleware(['role:asesor', '2fa'])->group(function (){
    Route::get('', [AdviserHomeController::class, 'index'])->name('home')->middleware('role:asesor');
    Route::get('alumnos-registrados', [AlumnosController::class, 'findAlumnsByAdviser'])->middleware('role:asesor');
    Route::get('nuevo-alumno', [AlumnosController::class, 'createAlumn'])->middleware('role:asesor');
    Route::get('seleccionar-grupo/{curp}', [AlumnosController::class, 'groupSelect'])->name('seleccionar-grupo')->middleware('role:asesor');
    Route::get('asignar-grupo/{curp}/{grupo}', [AlumnosController::class, 'groupAssign'])->name('asignar-grupo')->middleware('role:asesor');
    Route::resource('alumnos', AlumnosController::class);
});
Route::prefix('consulta')->middleware(['role:consulta', '2fa'])->group(function (){
    Route::get('', [DataViewerController::class, 'index'])->name('home')->middleware('role:consulta');
    Route::get('lista-alumnos', [DataViewerController::class, 'studentsList'])->name('lista-alumnos')->middleware('role:consulta');
    Route::get('lista-grupos', [DataViewerController::class, 'groupsList'])->name('lista-grupos')->middleware('role:consulta');
    Route::get('buscar-grupo', [GruposController::class, 'groupQuery'])->name('buscar-grupo')->middleware('role:consulta');
});

Route::get('buscar-alumno', [AlumnosController::class, 'studentsQuery'])->name('buscar-alumno');
Route::get('detalle-alumno/{curp}', [AlumnosController::class, 'studentDetails'])->name('detalle-alumno');
Route::get('pdf/{key}', [PDFGenerateController::class, 'generateListReport'])->name('pdf');
