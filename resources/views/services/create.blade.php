@extends('layout.master')

@section('title', 'Lista de Oficina')

@section('header-title')
@section('header-description')

@section('content')
<h1 class="text-3xl text-white bg-blue-500 font-bold underline">
    Hello world!
</h1>
<h2 class="text-white bg-amber-300"> teste vite
</h2>


<form action="{{ route('services.store') }}" method="POST" class="mt-4">
    @csrf
    <div>
        <label class="block">Nome:</label>
        <input type="text" name="name" class="border rounded w-full p-2" required>
    </div>

    <div class="mt-4">
        <label class="block">Preço:</label>
        <input type="number" name="price" class="border rounded w-full p-2" step="0.01" required>
    </div>

    <div class="mt-4">
        <label class="block">Descrição:</label>
        <textarea name="description" class="border rounded w-full p-2"></textarea>
    </div>

    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
</form>
</div>
@endsection