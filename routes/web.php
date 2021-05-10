<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\MunicipioController;
use App\Http\Controllers\Admin\PaginaController as PaginaAdmin;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Site\PaginaController as PaginaSite;

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

Route::get('/', ['as'=>'site.home', function () {
    return view('site.home');
}]);

Route::get('/sobre', [PaginaSite::class, 'sobre'])->name('site.sobre');

Route::get('/contato', [PaginaSite::class, 'contato'])->name('site.contato');
Route::post('/contato', [PaginaSite::class, 'enviarContato'])->name('site.contato');

Route::get('/anuncio/{id}/{titulo?}', ['as'=>'site.anuncio', function () {
    return view('site.anuncio');
}]);

//Auth::routes();

Route::get('/admin/login', ['as'=>'admin.login', function () {
    return view('admin.login.index');
}]);

Route::post('/admin/login', [UsuarioController::class, 'login'])->name('admin.login');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', ['as'=>'admin.home', function () {
        return view('admin.home.index');
    }]);

    Route::get('/admin/logout', [UsuarioController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios');
    Route::get('/admin/usuarios/cadastrar', [UsuarioController::class, 'cadastrar'])->name('admin.usuarios.cadastrar');
    Route::post('/admin/usuarios', [UsuarioController::class, 'salvar'])->name('admin.usuarios');
    Route::get('/admin/usuarios/alterar/{id}', [UsuarioController::class, 'alterar'])->name('admin.usuarios.alterar');
    Route::put('/admin/usuarios/atualizar/{id}', [UsuarioController::class, 'atualizar'])->name('admin.usuarios.atualizar');
    Route::delete('/admin/usuarios/remover/{id}', [UsuarioController::class, 'remover'])->name('admin.usuarios.remover');

    Route::get('/admin/paginas', [PaginaAdmin::class, 'index'])->name('admin.paginas');
    Route::get('/admin/paginas/alterar/{id}', [PaginaAdmin::class, 'alterar'])->name('admin.paginas.alterar');
    Route::put('/admin/paginas/atualizar/{id}', [PaginaAdmin::class, 'atualizar'])->name('admin.paginas.atualizar');

    Route::get('/admin/categorias', [CategoriaController::class, 'index'])->name('admin.categorias');
    Route::get('/admin/categorias/cadastrar', [CategoriaController::class, 'cadastrar'])->name('admin.categorias.cadastrar');
    Route::post('/admin/categorias', [CategoriaController::class, 'salvar'])->name('admin.categorias');
    Route::get('/admin/categorias/alterar/{id}', [CategoriaController::class, 'alterar'])->name('admin.categorias.alterar');
    Route::put('/admin/categorias/atualizar/{id}', [CategoriaController::class, 'atualizar'])->name('admin.categorias.atualizar');
    Route::delete('/admin/categorias/remover/{id}', [CategoriaController::class, 'remover'])->name('admin.categorias.remover');

    Route::get('/admin/municipios', [MunicipioController::class, 'index'])->name('admin.municipios');
    Route::get('/admin/municipios/cadastrar', [MunicipioController::class, 'cadastrar'])->name('admin.municipios.cadastrar');
    Route::post('/admin/municipios', [MunicipioController::class, 'salvar'])->name('admin.municipios');
    Route::get('/admin/municipios/alterar/{id}', [MunicipioController::class, 'alterar'])->name('admin.municipios.alterar');
    Route::put('/admin/municipios/atualizar/{id}', [MunicipioController::class, 'atualizar'])->name('admin.municipios.atualizar');
    Route::delete('/admin/municipios/remover/{id}', [MunicipioController::class, 'remover'])->name('admin.municipios.remover');
});