@extends('layout.master')

@section('title', 'Cadastro de Oficina')

@section('header-title', isset($edit) ? 'Edição de Oficina' : 'Bem-vindo ao Cadastro')
@section('header-description', isset($edit) ? 'Atualize os dados abaixo.' : 'Preencha os campos abaixo para se cadastrar.')

@section('content')




        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-gray-200 dark:bg-slate-800 p-6 rounded-lg shadow-md w-1/2 mt-5">
        @if (session()->has('success'))
        <span class="text-green-500 my-3">{{ session('success') }}</span>
   @endif
    <form  class="border-b-2 pb-10"method="post" action="@if (isset($edit->id)){{ route('vehicles.update', ['id' => $edit->id]) }}@else{{ route('vehicles.store') }} @endif" enctype="multipart/form-data">
    @csrf
    <!-- 'sub_command_id',-->
    @livewire('create-company')
  
     

    
    <!-- 'vehicle_type_id',-->
    <div class="mt-4"> 
        <label for="type_vehicle_id"class="block font-medium text-sm text-gray-700 dark:text-gray-200">
            TIPO DO VEÍCULO
        </label>
        <select name="type_vehicle_id" id="type_vehicle_id" 
        class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />   	
    <option selected>TIPO DE VEÍCULO</option>
            @foreach ($vehicle_type->all() as $type)
            <option value="{{$type->id}}">{{$type->type}}</option>
           @endforeach  
        </select>
        </div>


         <!-- 'situation_vehicle_id',-->
    <div class="mt-4"> 
        <label for="situation_vehicle_id"class="block font-medium text-sm text-gray-700 dark:text-gray-200">
            Situação DO VEÍCULO
        </label>
        <select name="situation_vehicle_id" id="situation_vehicle_id" 
        class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />   	
    <option selected>SITUAÇÃO DO VEÍCULO</option>
            @foreach ($situation_vehicle->all() as $situation)
            <option value="{{$situation->id}}">{{$situation->name}}</option>
           @endforeach  
        </select>
        </div>

          <!--'brand',-->
        <div class="mt-4">
            <x-input-label for="brand" :value="__('Marca:') " />
            <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand" :value="old('brand')" required autofocus autocomplete="brand" />
            <x-input-error :messages="$errors->get('brand')" class="mt-2" />
        </div>

        <!--model-->
        <div class="mt-4">
            <x-input-label for="model" :value="__('Modelo:') " />
            <x-text-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model')" required autofocus autocomplete="model" />
            <x-input-error :messages="$errors->get('model')" class="mt-2" />
        </div>

        <!--prefix--> 
        <div>
            <x-input-label for="prefix" :value="__('Prefixo')" />
            <x-text-input id="prefix" class="block mt-1 w-full" type="text" name="prefix" :value="old('prefix')" required autofocus autocomplete="prefix" />
            <x-input-error :messages="$errors->get('prefix')" class="mt-2" />
        </div>

         <!--plate--> 
        <div class="mt-4">
            <x-input-label for="plate" :value="__('Placa:')" />
            <x-text-input id="plate" class="block mt-1 w-full" type="text" name="plate" :value="old('plate')" required autofocus autocomplete="plate" />
            <x-input-error :messages="$errors->get('plate')" class="mt-2" />
        </div>
            <!-- patrimonio-->
            <div class="mt-4">
                <x-input-label for="asset_number" :value="__('numero de Patrimonio')" />
                <x-text-input id="asset_number" class="block mt-1 w-full" type="text" name="asset_number" :value="old('asset_number')" />
                <x-input-error :messages="$errors->get('asset_number')" class="mt-2" />
            </div>


            <div class="mt-4">
                <label for="characterized" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Plotagem da Viatura!</label
                <select name="characterized" id="characterized" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">   	
                    <option value="1" @if (old('characterized') == 1) selected @endif>Caracterizada</option>
                    <option value="0" @if (old('characterized') == 0) selected @endif>Descaracterizada</option>
                </select>{{ $errors->has('characterized') ? ' has-error' : '' }}
            </div>


<div class="mt-4">
                <x-input-label for="odometer" :value="__('Hodometro')" />
                <x-text-input id="odometer" class="block mt-1 w-full" type="text" name="odometer" :value="old('odometer')" required autofocus autocomplete="odometer" />
                <x-input-error :messages="$errors->get('odometer')" class="mt-2" />
            </div>     
         <!-- year  do veículo-->
         <div class="mt-4">
            <x-input-label for="year" :value="__('Ano')" />
            <x-text-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')" required autofocus autocomplete="year" />
            <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>   
          <!-- preço do veículo-->
        <div class="mt-4">
            <x-input-label for="price" :value="__('Preço: ')" />
            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus autocomplete="price" />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>   

         

        <div class="mt-6 flex justify-end">
            <x-secondary-button xhref="{{ route('workshops.index') }}">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </div>
    </div>

        </form>
   

                   
         </div>
      </div>
  
@endsection