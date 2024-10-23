@extends('layout.master')

@section('title', 'Lista de Oficina')

@section('header-title')
@section('header-description')

    @section('content')

    <h1 class="text-2xl font-bold mb-6">Orçamentos</h1>
    <a href="{{ route('budgets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Novo Orçamento</a>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white shadow rounded">
        <thead>
        <tr>
            <th>ID</th>
            <th>Veículo</th>
            <th>Serviço</th>
            <th>Situação</th>
            <th>Valor Total</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($budgets as $budget)
        <tr>
            <td>{{ $budget->id }}</td>
            <td>{{ $budget->vehicle->name }}</td>
            <td>{{ $budget->service->name }}</td>
            <td>{{ $budget->situation->name }}</td>
            <td>R$ {{ number_format($budget->total_amount, 2, ',', '.') }}</td>
            <td>
                <a href="{{ route('budgets.edit', $budget) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('budgets.destroy', $budget) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
