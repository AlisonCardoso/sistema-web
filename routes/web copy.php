<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ServiceController;



use  App\Livewire\BuscarCep;
use App\Livewire\BuscarCnpj;
use App\Livewire\CreateCompany;
use App\Livewire\CategorySubcategory;
use App\Livewire\LaborComponent;

Route::get('/', function () {
    return view('index');
});
Route::get('/buscar-cep',BuscarCep::class)->name('buscar-cep');
Route::get('/buscar-cnpj', BuscarCnpj::class)->name('buscar-cnpj');
Route::get('/create-company', CreateCompany::class)->name('create-company');
Route::get('/create-product', CategorySubcategory::class)->name('create-product');
Route::get('/labor-component', LaborComponent::class)->name('labor-component');

//Route::resources(['customers'=> CustomerController::class]);
   Route::resources(['workshops'=> WorkshopController::class]);
   
  // Route::resources(['categories'=> CategoryController::class]);

    Route::resources(['products'=> ProductController::class]);
    
    Route::resources(['vehicles'=> VehicleController ::class]);
    //Route::resources(['subcommands'=> SubCommandController ::class]);
    Route::resources(['companies'=> CompanyController::class]);

    Route::resource('services', ServiceController::class);
