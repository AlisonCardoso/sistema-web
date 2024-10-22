@extends('layout.master')

@section('title', 'Cadastro de Oficina')

@section('header-title', isset($edit) ? 'Edição de Oficina' : 'Bem-vindo ao Cadastro')
@section('header-description', isset($edit) ? 'Atualize os dados abaixo.' : 'Preencha os campos abaixo para se cadastrar.')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">{{ isset($vehicle) ? 'Editar Veículo' : 'Cadastrar Veículo' }}</h1>

    <form action="{{ isset($vehicle) ? route('vehicles.update', $vehicle->id) : route('vehicles.store') }}" method="POST">
        @csrf
        @if (isset($vehicle))
            @method('PUT')
        @endif

        @livewire('create-company')
        


        <div class="mb-4">
            <label for="type_vehicle_id" class="block text-sm font-medium text-gray-700">Tipo de Veículo</label>
            <select id="type_vehicle_id" name="type_vehicle_id" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
                <option selected>TIPO DE VEÍCULO</option>
            @foreach ($vehicle_type->all() as $type)
            <option value="{{$type->id}}">{{$type->type}}</option>
           @endforeach 
            </select>
        </div>

              <!-- 'type_vehicle_id',-->
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

        <div class="mb-4">
            <label for="brand" class="block text-sm font-medium text-gray-700">Marca</label>
            <input type="text" id="brand" name="brand" value="{{ old('brand', $vehicle->brand ?? '') }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="model" class="block text-sm font-medium text-gray-700">Modelo</label>
            <input type="text" id="model" name="model" value="{{ old('model', $vehicle->model ?? '') }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="prefix" class="block text-sm font-medium text-gray-700">Prefixo</label>
            <input type="text" id="prefix" name="prefix" value="{{ old('prefix', $vehicle->prefix ?? '') }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="plate" class="block text-sm font-medium text-gray-700">Placa</label>
            <input type="text" id="plate" name="plate" value="{{ old('plate', $vehicle->plate ?? '') }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="year" class="block text-sm font-medium text-gray-700">Ano</label>
            <input type="number" id="year" name="year" value="{{ old('year', $vehicle->year ?? '') }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Preço</label>
            <input type="number" id="price" name="price" value="{{ old('price', $vehicle->price ?? '') }}" step="0.01" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="active" class="flex items-center">
                <input type="checkbox" id="active" name="active" value="1" {{ (isset($vehicle) && $vehicle->active) ? 'checked' : '' }} class="mr-2">
                Ativo
            </label>
        </div>


                <!-- patrimonio-->
                <div class="mt-4">
                    <x-input-label for="asset_number" :value="__('numero de Patrimonio')" />
                    <x-text-input id="asset_number" class="block mt-1 w-full" type="text" name="asset_number" :value="old('asset_number')" />
                    <x-input-error :messages="$errors->get('asset_number')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <label for="characterized" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                        Plotagem da Viatura!
                    </label>
                    <select name="characterized" id="characterized" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">   	
                        <option value="1" {{ old('characterized') == 1 ? 'selected' : '' }}>Caracterizada</option>
                        <option value="0" {{ old('characterized') == 0 ? 'selected' : '' }}>Descaracterizada</option>
                    </select>
                    @error('characterized')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
    
    
    <div class="mt-4">
                    <x-input-label for="odometer" :value="__('Hodometro')" />
                    <x-text-input id="odometer" class="block mt-1 w-full" type="text" name="odometer" :value="old('odometer')" required autofocus autocomplete="odometer" />
                    <x-input-error :messages="$errors->get('odometer')" class="mt-2" />
                </div>     

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">
            {{ isset($vehicle) ? 'Atualizar Veículo' : 'Cadastrar Veículo' }}
        </button>
    </form>
</div>
@endsection
