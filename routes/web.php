<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuditoriaControlller;
use App\Http\Controllers\CalificacionControlller;
use App\Http\Controllers\CampoControlller;
use App\Http\Controllers\ControllerEstandar;
use App\Http\Controllers\CriterioControlller;
use App\Http\Controllers\DinamicoControlller;
use App\Http\Controllers\EscuelaController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\ModeloControlller;
use App\Http\Controllers\ModuloControlller;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/user', function () {

//         $users= User::all();
//         return Inertia::render('User', compact('users'));
//     })->name('user.index');
// });


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->resource('/dashboard/user', UserController::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('dashboard')->group(function () {
    // Ruta `resource` para las operaciones CRUD estándar
    Route::resource('user', UserController::class);

    // Ruta `DELETE` adicional para una eliminación específica (por ejemplo, eliminación de avatar)
    Route::delete('user/avatar/delete/{user}', [UserController::class, 'deleteAvatar'])->name('user.deleteAvatar');

    //ESCUELAS
    Route::resource('escuela', EscuelaController::class);

    //FACULTADES
    Route::resource('facultad', FacultadController::class);

    //ESTANDAR ESTATICO
    Route::resource('estandar', ControllerEstandar::class);

    //MODULO DINAMICO
    Route::resource('modulo', ModuloControlller::class);

    //MODELOS
    Route::resource('modelo', ModeloControlller::class);


    //AUDITORIA
    Route::resource('auditoria', AuditoriaControlller::class);


    //CRITERIOS
    Route::resource('criterio', CriterioControlller::class);

    //CALIFICACION
    Route::resource('calificacion', CalificacionControlller::class);


    //MODULO
    Route::resource('modulo', ModuloControlller::class);

    //CAMPO
    Route::resource('campo', CampoControlller::class);

    //DINAMICO
    Route::resource('dinamico', DinamicoControlller::class);


    //DASHBOARD GENERAL
    Route::resource('menu', AdminController::class);
    //ROLES

    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('roles', [RoleController::class, 'store']);
    Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');


    Route::get('users', [RoleController::class, 'getUsers'])->name('users.list');
    Route::post('users/{user}/assign-role', [RoleController::class, 'assignRole'])->name('users.assign-role');

    // Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    // Route::post('roles', [RoleController::class, 'store']);
    // Route::post('roles/{role}/permissions', [RoleController::class, 'assignPermissions']);
    // Route::get('manage-roles', function () {
    //     return Inertia::render('ManageRoles');
    // });
    // Route::get('/permissions', [RoleController::class, 'getPermissions']);

    // // Rutas para permisos
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index'); // Obtener permisos
    // Route::post('permissions', [PermissionController::class, 'store']); // Crear permiso
    // Route::delete('permissions/{permission}', [PermissionController::class, 'destroy']); // Eliminar permiso

    // Route::post('assign-role', [RoleController::class, 'assignRole'])->name('roles.assign'); // Nueva ruta para asignar rol
    // Route::post('users/{user}/assign-role', [UserController::class, 'assignRole']);
    // Route::post('dashboard/users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');



});


//FACULTAD


//ESCUELA
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/escuelas', function () {
//     return Inertia::render('Escuela/Index');
// })->name('escuela.index');





// //PERMISO
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/permiso', function () {
//     return Inertia::render('Dashboard');
// })->name('permiso.index');



// //ROLES
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/roles', function () {
//     return Inertia::render('Dashboard');
// })->name('role.index');


// //BRECHA

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/brechas', function () {
//     return Inertia::render('Dashboard');
// })->name('brecha.index');



// //AVANCE_ESTANDAR
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/avances', function () {
//     return Inertia::render('Dashboard');
// })->name('avancestandar.index');

// //CALIFICACION
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/calificaciones', function () {
//     return Inertia::render('Dashboard');
// })->name('calificacion.index');

// //ACTIVIDADES
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/actividades', function () {
//     return Inertia::render('Dashboard');
// })->name('actividad.index');

// //ESCALA LOGRO
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/logros', function () {
//     return Inertia::render('Dashboard');
// })->name('logro.index');

// //COMENTARIO
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/comentarios', function () {
//     return Inertia::render('Dashboard');
// })->name('comentario.index');

// //AUDITORIA
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/auditorias', function () {
//     return Inertia::render('Dashboard');
// })->name('auditoria.index');

// //MODELO
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/modelos', function () {
//     return Inertia::render('Dashboard');
// })->name('modelo.index');

// //CATEGORIA
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/categorias', function () {
//     return Inertia::render('Dashboard');
// })->name('categoria.index');

// //CRITERIO
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/criterios', function () {
//     return Inertia::render('Dashboard');
// })->name('criterio.index');



// //DOCUMENTO
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/documentos', function () {
//     return Inertia::render('Dashboard');
// })->name('documento.index');

// //ESTADO
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/estados', function () {
//     return Inertia::render('Dashboard');
// })->name('estado.index');

// //ACTIVIDAD_DOCUMENTO
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/actividades_documentos', function () {
//     return Inertia::render('Dashboard');
// })->name('activi_documento.index');

// //ADJUNTAR
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/adjuntos', function () {
//     return Inertia::render('Dashboard');
// })->name('adjunto.index');

// //ESTANDAR_ESTATICO
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/estandar_estaticos', function () {
//     return Inertia::render('Dashboard');
// })->name('estandar_estatico.index');

// //TIPO_AV
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/tipos_avs', function () {
//     return Inertia::render('Dashboard');
// })->name('tipos_av.index');

// //RELACION_ESTANDAR
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/relacion_estandars', function () {
//     return Inertia::render('Dashboard');
// })->name('relacion_estandar.index');

// //EVENTO
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/eventos', function () {
//     return Inertia::render('Dashboard');
// })->name('evento.index');

// //ESTANDAR
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/estandars', function () {
//     return Inertia::render('Dashboard');
// })->name('estandar.index');

// //REPORTE
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/reportes', function () {
//     return Inertia::render('Dashboard');
// })->name('reporte.index');

// //ESTA_MAS_INFORMACION
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->get('/mas_informaciones', function () {
//     return Inertia::render('Dashboard');
// })->name('mas_informacion.index');