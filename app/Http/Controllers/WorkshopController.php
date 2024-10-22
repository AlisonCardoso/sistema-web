<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use  App\Livewire\BuscarCep;
use App\Livewire\BuscarCnpj;
use App\Http\Requests\WorkshopRequest;


use Exception;
use App\Models\Address;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\PhpWord;

class WorkshopController extends Controller
{
    private  $workshop;
    private  $address;

    public function __construct()
    {
        $this->address = new Address();
        $this->workshop = new  Workshop();
    }
    public function index()
    {
        $title = "Lista de Oficinas";
       // $states = State::orderBy('name', 'ASC')->get();
       // $cities = City::all();
        $workshops = $this->workshop->all();
        //return view('workshop.index', compact('workshops', 'title','states','cities'));
        return view('workshop.index', compact('workshops', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Nova Oficina";

        // $states = State::orderBy('name', 'ASC')->get();
        // $cities = City::all();
         $address = Address::all();
         $workshops = $this->workshop->all();
        //  return view('workshop.create',compact('workshops',  'title','address','states','cities'));
          return view('workshop.create',compact('workshops',  'title','address'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {

        try {



        DB::beginTransaction();

        $workshop = Workshop::create($request->all());
        $workshop->address()->create($request->all());


       DB::Commit();

        Session::flash('success', 'Oficina registrada com successo');
        return redirect()->route('workshops.index');
            }
             catch (Exception $e) {

        // Salvar log
        Log::warning('Oficina não editada', ['error' => $e->getMessage()]);

        // Redirecionar o usuário, enviar a mensagem de erro
        return back()->withInput()->with('error', 'Oficina não editada!');
    }

    }

    public function show(Workshop $workshop)
    {
        return view('workshop.show',compact('workshop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop)
    {


        $title = "Nova Oficina";
     // Recuperar do banco de dados as situações
       // $states = State::orderBy('name', 'ASC')->get();
       // $cities = City::where('state_id', $request->state_id)->orderBy('name')->get();
      //  $cities = City::orderBy('name', 'ASC')->get();
        $workshops = $this->workshop->all();


        // Carregar a VIEW
        // return view('workshop.edit',compact('workshops',  'title','states','cities'));
         return view('workshop.edit',compact('workshops',  'title'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkshopRequest $request, Workshop $workshop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workshop $workshop)
    {
        //
    }
}