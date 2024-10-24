{{-- resources/views/service_orders/index.blade.php --}}
@extends('layout.master')

@section('title', 'Ordens de Serviço')

@section('header-title', 'Lista de Ordens de Serviço')
@section('header-description', 'Aqui estão todas as ordens de serviço cadastradas.')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-gray-200 dark:bg-slate-800 p-6 rounded-lg shadow-md w-1/2 mt-5">
            @if (session()->has('success'))
                <span class="text-green-500 my-3">{{ session('success') }}</span>
            @endif
            <a href="{{ route('service_orders.create') }}" class="btn btn-primary mb-4">Criar Nova Ordem de Serviço</a>
            <table class="table-auto w-full border-collapse border border-gray-400">
                <thead>
                <tr>
                    <th class="border border-gray-400 p-2">ID</th>
                    <th class="border border-gray-400 p-2">Veículo</th>
                    <th class="border border-gray-400 p-2">Oficina</th>
                    <th class="border border-gray-400 p-2">Data do Serviço</th>
                    <th class="border border-gray-400 p-2">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($serviceOrders as $serviceOrder)
                    <tr>
                        <td class="border border-gray-400 p-2">{{ $serviceOrder->id }}</td>
                        <td class="border border-gray-400 p-2">{{ $serviceOrder->vehicle->name ?? 'N/A' }}</td>
                        <td class="border border-gray-400 p-2">{{ $serviceOrder->workshop->name ?? 'N/A' }}</td>
                        <td class="border border-gray-400 p-2">{{ $serviceOrder->service_date }}</td>
                        <td class="border border-gray-400 p-2">
                            <a href="{{ route('service_orders.edit', $serviceOrder->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('service_orders.destroy', $serviceOrder->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                            <a href="{{ route('service_orders.show', $serviceOrder->id) }}" class="btn btn-info">Ver</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
