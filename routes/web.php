<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UsuarioController;

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

Route::get('/sobre', ['as'=>'site.sobre', function () {
    return view('site.sobre');
}]);

Route::get('/contato', ['as'=>'site.contato', function () {
    return view('site.contato');
}]);

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
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');