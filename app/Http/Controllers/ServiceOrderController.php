<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{
    // Exibir todas as ordens de serviço
    public function index()
    {
        $serviceOrders = ServiceOrder::with(['vehicle', 'workshop', 'situation'])->get();
        return view('service_orders.index', compact('serviceOrders'));
    }

    // Exibir o formulário para criar uma nova ordem de serviço
    public function create()
    {
        return view('service_orders.create');
    }

    // Armazenar uma nova ordem de serviço
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'workshop_id' => 'required|exists:workshops,id',
            'situation_id' => 'required|exists:situations,id',
            'service_date' => 'required|date',
            'labor_hourly_rate' => 'required|numeric',
            'labor_hours' => 'nullable|integer',
        ]);

        ServiceOrder::create($validatedData);
        return redirect()->route('service_orders.index')->with('success', 'Service Order created successfully.');
    }

    // Exibir uma ordem de serviço específica
    public function show($id)
    {
        $serviceOrder = ServiceOrder::with(['vehicle', 'workshop', 'situation'])->findOrFail($id);
        return view('service_orders.show', compact('serviceOrder'));
    }

    // Exibir o formulário para editar uma ordem de serviço
    public function edit($id)
    {
        $serviceOrder = ServiceOrder::findOrFail($id);
        return view('service_orders.edit', compact('serviceOrder'));
    }

    // Atualizar uma ordem de serviço existente
    public function update(Request $request, $id)
    {
        $serviceOrder = ServiceOrder::findOrFail($id);

        $validatedData = $request->validate([
            'vehicle_id' => 'sometimes|exists:vehicles,id',
            'workshop_id' => 'sometimes|exists:workshops,id',
            'situation_id' => 'sometimes|exists:situations,id',
            'service_date' => 'sometimes|date',
            'labor_hourly_rate' => 'sometimes|numeric',
            'labor_hours' => 'nullable|integer',
        ]);

        $serviceOrder->update($validatedData);
        return redirect()->route('service_orders.index')->with('success', 'Service Order updated successfully.');
    }

    // Deletar uma ordem de serviço
    public function destroy($id)
    {
        $serviceOrder = ServiceOrder::findOrFail($id);
        $serviceOrder->delete();

        return redirect()->route('service_orders.index')->with('success', 'Service Order deleted successfully.');
    }
}
