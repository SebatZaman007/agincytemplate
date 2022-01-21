<?php

use Illuminate\Support\Facades\Route;
//backend

//for-login
Route::get('/dashboard',[App\Http\Controllers\Admin\MainController::class,'dashboard'])->name('dashboard');
Route::get('/login',[App\Http\Controllers\Admin\MainController::class,'login'])->name('login');
//end


//for-nav-logo

Route::group(['prefix' => 'admin'], function() {
    Route::get('/navlogo-index',[App\Http\Controllers\Admin\NavlogoController::class,'navlogoindex'])->name('navlogo.index');
    Route::get('/navlogo-create',[App\Http\Controllers\Admin\NavlogoController::class,'navlogocreate'])->name('navlogo.create');
    Route::post('/navlogo-store',[App\Http\Controllers\Admin\NavlogoController::class,'navlogostore'])->name('navlogo.store');
    Route::get('/navlogo-edit/{id}',[App\Http\Controllers\Admin\NavlogoController::class,'navlogoedit'])->name('navlogo.edit');
    Route::post('/navlogo-update',[App\Http\Controllers\Admin\NavlogoController::class,'navlogoupdate'])->name('navlogo.update');
    Route::get('/navlogo-delete/{id}',[App\Http\Controllers\Admin\NavlogoController::class,'navlogodelete'])->name('navlogo.delete');
});

//

//for-menu

Route::group(['prefix' => 'admin'], function(){
    Route::get('/menu-index',[App\Http\Controllers\Admin\MenuController::class,'menuIndex'])->name('menu.index');
    Route::get('/menu-create',[App\Http\Controllers\Admin\MenuController::class,'menuCreate'])->name('menu.create');
    Route::get('/menu-store',[App\Http\Controllers\Admin\MenuController::class,'menuStore'])->name('menu.store');
    Route::get('/menu-edit/{id}',[App\Http\Controllers\Admin\MenuController::class,'menuEdit'])->name('menu.edit');
    Route::get('/menu-update',[App\Http\Controllers\Admin\MenuController::class,'menuUpdate'])->name('menu.update');
    Route::get('/menu-delete/{id}',[App\Http\Controllers\Admin\MenuController::class,'menuDelete'])->name('menu.delete');

});



//frontend

Route::get('/',[App\Http\Controllers\Frontend\MainController::class,'mainIndex'])->name('main.index');


