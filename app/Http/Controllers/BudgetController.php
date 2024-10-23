<?php


namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Service;
use App\Models\Vehicle;
use App\Models\Situation;

use Illuminate\Http\Request;

class BudgetController extends Controller
{
    private $vehicles;
    private $services;
    private $situations;
    public function index()
    {
        $budgets = Budget::with(['vehicle', 'service', 'situation'])->get();
        return view('budgets.index', compact('budgets'));
    }

    public function create()
    {

        $vehicles = Vehicle::all();
        $services = Service::all();
        $situations = Situation::all();
    
        return view('budgets.create', compact('vehicles', 'services', 'situations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'service_id' => 'required|exists:services,id',
            'situation_id' => 'required|exists:situations,id',
            'total_amount' => 'required|numeric',
        ]);

        Budget::create($validated);
        return redirect()->route('budgets.index')->with('success', 'Orçamento criado com sucesso!');
    }

    public function edit(Budget $budget)
    {
    $vehicles = Vehicle::all();
    $services = Service::all();
    $situations = Situation::all();

    return view('budgets.crate', compact('budget', 'vehicles', 'services', 'situations'));
}

    public function update(Request $request, Budget $budget)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'service_id' => 'required|exists:services,id',
            'situation_id' => 'required|exists:situations,id',
            'total_amount' => 'required|numeric',
        ]);

        $budget->update($validated);
        return redirect()->route('budgets.index')->with('success', 'Orçamento atualizado com sucesso!');
    }

    public function destroy(Budget $budget)
    {
        $budget->delete();
        return redirect()->route('budgets.index')->with('success', 'Orçamento removido com sucesso!');
    }
}

