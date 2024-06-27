<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

Route::get('/template', function () {
    return view('default');
});


Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('finance', FinancialController::class);
    Route::get ('finance/{id}/pay', [FinancialController::class,'pay']);
    Route::put ('finance/{id}/pay', [FinancialController::class,'payPut']);
    Route::resource('event', EventController::class);
    Route::resource('category', CategoryController::class);
    Route::get('/relatorio/alunos_x_categoria', [CategoryController::class, 'relatorio_aluno_categoria'])->name('relatorio_aluno_categoria');

    Route::resource('schedule', ScheduleController::class);
    Route::resource('presence', PresenceController::class);
    Route::resource('student', StudentController::class);
    Route::get('/relatorio/alunos_x_posicao', [StudentController::class, 'relatorio_aluno_Posicao'])->name('relatorio_aluno_Posicao');
    Route::get('/relatorio/alunos_x_Presenca', [StudentController::class, 'relatorio_aluno_Presenca'])->name('relatorio_aluno_Presenca');
    Route::resource('user', UserController::class);

    Route::get('/profile/user', [UserController::class, 'profile'])->name('user.profile');
});



require __DIR__.'/auth.php';