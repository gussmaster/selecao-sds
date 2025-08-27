<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SdsController;


Route::get('/', [SdsController::class, 'index'])->name('home');


// Inscrição pública
Route::get('/inscricao', [SdsController::class, 'inscricaoForm'])->name('inscricao.form');
Route::post('/inscricao', [SdsController::class, 'inscricaoSalvar'])->name('inscricao.salvar');


// Painel simples da Comissão (sem auth para simplificar; em produção, proteger!)
Route::get('/admin', [SdsController::class, 'admin'])->name('admin.index');
Route::post('/admin/{id}/status', [SdsController::class, 'status'])->name('admin.status');
Route::post('/admin/{id}/entrevista', [SdsController::class, 'entrevista'])->name('admin.entrevista');
Route::post('/admin/{id}/classificar', [SdsController::class, 'classificar'])->name('admin.classificar');