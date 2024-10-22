<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Workshop;

class BuscarCnpj extends Component
{/*
    protected array $rules = [
        'cnpj' => ['required'],
        'razao_social' => ['required'],
        'nome_socio  ' => ['nullable'],
        'descricao_situacao_cadastral' => ['required'],
        'cnae_fiscal_descricao' => ['required'],
        'cep' => ['nullable'],
        'ddd_telefone_1' => ['nullable'],
        
    ];
    protected array $messages = [
        'cnpj.required' => 'O campo CNPJ é obrigatório.',
        'razao_social.required' => 'O campo RAZÃO SOCIAL é obrigatório.',
       // 'nome_socio  .required' => 'O campo NOME FANTASIA é obrigatório.',
        'descricao_situacao_cadastral.required' => 'O campo SITUAÇÃO é obrigatório.',
        'cnae_fiscal_descricao.required' => 'O campo DESCRIÇÃO é obrigatório.',
    ];*/

    public string $cnpj = '';
    public string $razao_social = '';
    //public string $ddd_telefone_1   = '42';
    public string $descricao_situacao_cadastral = '';
    public string $cnae_fiscal_descricao = '';

    public array $workshop = [];

    public function updatedCnpj(string $value) {
        //$response = Http::get("https://brasilapi.com.br/api/cnpj/v1/{$value}")->json();
        $response = Http::withOptions(['verify' => false])->get("https://brasilapi.com.br/api/cnpj/v1/{$value}")->json();


        $this->cnpj = $response['cnpj'];
        $this->razao_social = $response['razao_social'];
       // $this->ddd_telefone_1 = $response['ddd_telefone_1'];
        $this->descricao_situacao_cadastral = $response['descricao_situacao_cadastral'];
        $this->cnae_fiscal_descricao = $response['cnae_fiscal_descricao']; //nome fantasia 
      

    }
    public function save() {
        $this->validate();

        Workshop::updateOrCreate(
            [
                'cnpj' => $this->cnpj,
            ],
            [
                'razao_social' => $this->razao_social,
                'nome_socio  ' => $this->nome_socio  ,
                'descricao_situacao_cadastral' => $this->descricao_situacao_cadastral,
                'cnae_fiscal_descricao' => $this->cnae_fiscal_descricao,
                'ddd_telefone_1' => $this->ddd_telefone_1,
            ]);
        $this->render();

        $this->resetExcept('workshop');



    }

    /*  */
    public function render()
    {
        $this->workshop = Workshop::all()->toArray();
        return view('livewire.buscar-cnpj');
    }
}
