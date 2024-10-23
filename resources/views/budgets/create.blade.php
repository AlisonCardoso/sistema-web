@extends('layout.master')

@section('title', isset($budget) ? 'Editar Orçamento' : 'Novo Orçamento')

@section('header-title', 'Lista de Oficina')
@section('header-description', isset($budget) ? 'Editar Orçamento' : 'Cadastrar Novo Orçamento')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">{{ isset($budget) ? 'Editar Orçamento' : 'Novo Orçamento' }}</h1>

        <form action="{{ isset($budget) ? route('budgets.update', $budget) : route('budgets.store') }}" method="POST">
            @csrf
            @if (isset($budget))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="vehicle_id" class="block mb-2">Veículo</label>
                <select name="vehicle_id" id="vehicle_id" class="w-full p-2 border rounded" required>
                    <option value="">Selecione um veículo</option>
                    @foreach ($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}" 
                            {{ old('vehicle_id', $budget->vehicle_id ?? '') == $vehicle->id ? 'selected' : '' }}>
                            {{ $vehicle->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="service_id" class="block mb-2">Serviço</label>
                <select name="service_id" id="service_id" class="w-full p-2 border rounded" required>
                    <option value="">Selecione um serviço</option>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" 
                            {{ old('service_id', $budget->service_id ?? '') == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="situation_id" class="block mb-2">Situação</label>
                <select name="situation_id" id="situation_id" class="w-full p-2 border rounded" required>
                    <option value="">Selecione uma situação</option>
                    @foreach ($situations as $situation)
                        <option value="{{ $situation->id }}" 
                            {{ old('situation_id', $budget->situation_id ?? '') == $situation->id ? 'selected' : '' }}>
                            {{ $situation->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="total_amount" class="block mb-2">Valor Total</label>
                <input 
                    type="number" 
                    name="total_amount" 
                    id="total_amount" 
                    value="{{ old('total_amount', $budget->total_amount ?? '') }}" 
                    class="w-full p-2 border rounded" 
                    step="0.01" 
                    required
                >
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    {{ isset($budget) ? 'Atualizar Orçamento' : 'Salvar Orçamento' }}
                </button>
            </div>
        </form>
    </div>
@endsection
