@extends('layout.master')

@section('title', 'Cadastro de Oficina')

@section('header-title', isset($edit) ? 'Edição de Oficina' : 'Bem-vindo ao Cadastro')
@section('header-description', isset($edit) ? 'Atualize os dados abaixo.' : 'Preencha os campos abaixo para se cadastrar.')

@section('content')

<div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12 mt-12">
    <div class="bg-white dark:bg-gray-900 w-full shadow rounded p-8 sm:p-12">
        <form method="POST" action="{{ isset($edit) ? route('workshops.update', ['id' => $edit->id]) : route('workshops.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($edit)) @method('PUT') @endif
 
 
            @livewire('buscar-cnpj')

            {{--  aqui serao inseridos os inputs do livewire--}}

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                <div>
                <label for="number" class="block text-gray-800 dark:text-gray-300">Número</label>
                <input type="text" id="number" name="number" class="w-full px-3 py-2 border rounded-md bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('number', $edit->address->number ?? '') }}" required>
                @error('number') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div >
                <label for="complement" class="block text-gray-800 dark:text-gray-300">Complemento</label>
                <input type="text" id="complement" name="complement" class="w-full px-3 py-2 border rounded-md bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('complement', $edit->address->complement ?? '') }}">
                @error('complement') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('workshops.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md">Cancelar</a>
                <button type="submit" class="ml-3 px-4 py-2 bg-blue-600 text-white rounded-md">{{ isset($edit) ? 'Atualizar' : 'Cadastrar' }}</button>
            </div>
        </form>
    </div>
</div>

@endsection
