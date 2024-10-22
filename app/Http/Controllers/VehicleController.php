<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\SituationVehicle;
use App\Models\SubCommand;
use App\Models\Vehicle;
use App\Models\TypeVehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\PhpWord;
use Exception;

class VehicleController extends Controller
{
    private $user;
    private  $vehicle;
    public function __construct()
    {
       //$this->middleware('auth');
        $this->vehicle = new Vehicle();


    }

    public function index()
    {
        $title = "Listas de Veículos";
       
        $vehicle_type = TypeVehicle::all();
        $situation_vehicle = SituationVehicle::all();
        
        $vehicles = Vehicle::all();
        $companies = Company::all();
        $sub_command = SubCommand::all();
        return view('vehicle.index', compact('companies','vehicles','vehicle_type', 'title','situation_vehicle'));
  }
    public function create()
    {
       $title = "Novo veículo";
       $vehicle_type = TypeVehicle::all();
       $situation_vehicle = SituationVehicle::all();
       $sub_command = SubCommand::all();
       return view('vehicle.create', compact('vehicle_type','sub_command','title','situation_vehicle'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         try {
        DB::beginTransaction();
        $vehicle= Vehicle::create($request->all());
        
        $vehicle->save();
        DB::Commit();

        Session::flash('success', 'Veiculo cadastrado com successo');
        return redirect()->route('vehicles.index');
            }
             catch (Exception $e) {

        // Salvar log
        Log::warning('Conta não editada', ['error' => $e->getMessage()]);

        // Redirecionar o usuário, enviar a mensagem de erro
        return back()->withInput()->with('error', 'Veiculo não cadastrado!');
    }
    }


    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.show', compact('vehicle'));



    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            
            'sub_command_id' => 'required|string|max:150',
            'type_vehicle_id' => 'required|string|max:55',
            'situation_vehicle_id' => 'required|string|max:55',
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'asset_number'=> 'required|string|max:100',
            'plate' => 'required|string|max:10|unique:vehicles,plate,' . $id,
            'prefix' => 'required|string|max:10|unique:vehicles,prefix,' . $id,
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
            'odometer' => 'required|integer',
            'characterized' => 'required|boolean',
            'active' => 'required|boolean',
            'price' => 'required|numeric|min:0',
          
      
           
           
            

        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}
