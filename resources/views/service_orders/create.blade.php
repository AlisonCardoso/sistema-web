{{-- resources/views/service_orders/create.blade.php --}}
@extends('layout.master')

@section('title', 'Criar Ordem de Serviço')

@section('header-title', 'Criar Nova Ordem de Serviço')
@section('header-description', 'Preencha os campos abaixo para cadastrar uma nova ordem de serviço.')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-gray-200 dark:bg-slate-800 p-6 rounded-lg shadow-md w-1/2 mt-5">
            <form method="POST" action="{{ route('service_orders.store') }}">
                @csrf
                <div class="mt-4">
                    <label for="vehicle_id" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                        Veículo
                    </label>
                    <select name="vehicle_id" id="vehicle_id" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
                        <option value="">Selecione o Veículo</option>
                        <!-- Adicione opções para veículos aqui -->
                    </select>
                </div>

                <div class="mt-4">
                    <label for="workshop_id" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                        Oficina
                    </label>
                    <select name="workshop_id" id="workshop_id" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
                        <option value="">Selecione a Oficina</option>
                        <!-- Adicione opções para oficinas aqui -->
                    </select>
                </div>

                <div class="mt-4">
                    <label for="situation_id" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                        Situação
                    </label>
                    <select name="situation_id" id="situation_id" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
                        <option value="">Selecione a Situação</option>
                        <!-- Adicione opções para situações aqui -->
                    </select>
                </div>

                <div class="mt-4">
                    <label for="service_date" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                        Data do Serviço
                    </label>
                    <input type="date" name="service_date" id="service_date" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
                </div>

                <div class="mt-4">
                    <label for="labor_hourly_rate" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                        Valor Hora da Mão de Obra
                    </label>
                    <input type="number" name="labor_hourly_rate" id="labor_hourly_rate" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" step="0.01" required>
                </div>

                <div class="mt-4">
                    <label for="labor_hours" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                        Duração da Mão de Obra (Horas)
                    </label>
                    <input type="number" name="labor_hours" id="labor_hours" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" min="0">
                </div>

                <button type="submit" class="btn btn-primary mt-4">Criar</button>
            </form>
        </div>
    </div>
@endsection
