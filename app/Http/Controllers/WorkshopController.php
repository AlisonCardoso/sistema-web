<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use App\Models\Address;
use App\Http\Requests\WorkshopRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Exception;

class WorkshopController extends Controller
{
    public function index()
    {
        $title = "Lista de Oficinas";
        $workshops = Workshop::all();
        return view('workshop.index', compact('workshops', 'title'));
    }

    public function create()
    {
        $workshops = Workshop::all();
        return view('workshop.create', compact('workshops'));
    }

    public function store(WorkshopRequest $request)
    {
       
        try {
            DB::beginTransaction();

            // Criar a oficina
            $workshop = Workshop::create($request->only(['cnpj', 'razao_social', 'cnae_fiscal_descricao', 'descricao_situacao_cadastral', 'email', 'responsavel', 'phone_number']));

            // Criar o endereço
            $addressData = $request->only(['cep', 'state', 'city', 'neighborhood', 'street', 'number', 'complement']);
            $workshop->address()->create($addressData);

            DB::commit();

            Session::flash('success', 'Oficina registrada com sucesso');
            return redirect()->route('workshops.index');
        } catch (Exception $e) {
            DB::rollBack();
            Log::warning('Erro ao registrar a oficina', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Oficina não registrada!');
        }
        dd($request->all());
    }

    public function show(Workshop $workshop)
    {
        return view('workshop.show', compact('workshop'));
    }

    public function edit(Workshop $workshop)
    {
        $title = "Editar Oficina";
        return view('workshop.create', compact('workshop', 'title'));
    }

    public function update(WorkshopRequest $request, Workshop $workshop)
    {
        try {
            DB::beginTransaction();

            // Atualizar a oficina
            $workshop->update($request->only(['cnpj', 'razao_social', 'cnae_fiscal_descricao', 'descricao_situacao_cadastral', 'email', 'responsavel', 'phone_number']));

            // Atualizar o endereço
            $addressData = $request->only(['cep', 'state', 'city', 'neighborhood', 'street', 'number', 'complement']);
            $workshop->address()->update($addressData);

            DB::commit();

            Session::flash('success', 'Oficina atualizada com sucesso');
            return redirect()->route('workshops.index');
        } catch (Exception $e) {
            DB::rollBack();
            Log::warning('Erro ao atualizar a oficina', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Oficina não atualizada!');
        }
    }

    public function destroy(Workshop $workshop)
    {
        try {
            DB::beginTransaction();
    
            // Excluir o endereço associado, se existir
            if ($workshop->address) {
                $workshop->address()->delete();
            }
    
            // Excluir a oficina
            $workshop->delete();
    
            DB::commit();
    
            Session::flash('success', 'Oficina excluída com sucesso');
            return redirect()->route('workshops.index');
        } catch (Exception $e) {
            DB::rollBack();
            Log::warning('Erro ao excluir a oficina', ['error' => $e->getMessage()]);
            return back()->with('error', 'Erro ao excluir a oficina!');
        }
    }
    
}
