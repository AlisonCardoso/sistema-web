<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkshopController;
use  App\Livewire\BuscarCep;
use App\Livewire\BuscarCnpj;

Route::get('/', function () {
    return view('index');
});
Route::get('/buscar-cep',BuscarCep::class)->name('buscar-cep');
Route::get('/buscar-cnpj', BuscarCnpj::class)->name('buscar-cnpj');

//Route::resources(['customers'=> CustomerController::class]);
   Route::resources(['workshops'=> WorkshopController::class]);
   
  // Route::resources(['categories'=> CategoryController::class]);

 //   Route::resources(['products'=> ProductController::class]);
    //Route::resources(['cities'=> CityController ::class]);
    //Route::resources(['states'=> StateController ::class]);
    //Route::resources(['vehicles'=> VehicleController ::class]);
    //Route::resources(['subcommands'=> SubCommandController ::class]);
    //Route::resources(['companies'=> CompanyController::class]);

    //Route::resource('services', ServiceController::class);
