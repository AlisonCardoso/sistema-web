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

<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold">Serviços</h1>
    <a href="{{ route('services.create') }}" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Novo Serviço</a>

    @if (session('success'))
        <div class="mt-4 text-green-500">{{ session('success') }}</div>
    @endif
    <table class="min-w-full mt-4">
        <thead>
            <tr class="bg-gray-200 dark:bg-gray-700">
                <th class="py-2">Nome</th>
                <th class="py-2">Preço</th>
                <th class="py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr class="border-b dark:border-gray-600">
                <td class="py-2">{{ $service->name }}</td>
                <td class="py-2">{{ $service->price }}</td>
                <td class="py-2">
                    <a href="{{ route('services.edit', $service) }}" class="text-blue-500">Editar</a>
                    <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection
