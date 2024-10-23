@extends('layout.master')

@section('title', 'Lista de Oficina')

@section('header-title')
@section('header-description')

    @section('content')
        <h1 class="text-2xl font-bold mb-6">Serviços</h1>
        <a href="{{ route('services.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Novo Serviço</a>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white shadow rounded">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b">Nome</th>
                <th class="py-2 px-4 border-b">Preço</th>
                <th class="py-2 px-4 border-b">Duração</th>
                <th class="py-2 px-4 border-b">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $service->name }}</td>
                    <td class="py-2 px-4 border-b">R$ {{ number_format($service->price, 2, ',', '.') }}</td>
                    <td class="py-2 px-4 border-b">{{ $service->duration ?? '-' }} horas</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('services.edit', $service) }}" class="text-blue-500 mr-2">Editar</a>
                        <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

@endsection
