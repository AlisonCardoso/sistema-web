<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Workshop;

class BuscarCnpj extends Component
{
    protected array $rules = [
        'cnpj' => ['required'],
        'razao_social' => ['required'],
        'nome_fantasia' => ['required'],
        'descricao_situacao_cadastral' => ['required'],
        'cnae_fiscal_descricao' => ['required']
    ];
    protected array $messages = [
        'cnpj.required' => 'O campo CNPJ é obrigatório.',
        'razao_social.required' => 'O campo RAZÃO SOCIAL é obrigatório.',
        'nome_fantasia.required' => 'O campo NOME FANTASIA é obrigatório.',
        'descricao_situacao_cadastral.required' => 'O campo SITUAÇÃO é obrigatório.',
        'cnae_fiscal_descricao.required' => 'O campo DESCRIÇÃO é obrigatório.',
    ];

    public string $cnpj = '';
    public string $razao_social = '';
    public string $nome_fantasia = '';
    public string $descricao_situacao_cadastral = '';
    public string $cnae_fiscal_descricao = '';

    public array $workshop = [];

    public function updatedCnpj(string $value) {
        //$response = Http::get("https://brasilapi.com.br/api/cnpj/v1/{$value}")->json();
        $response = Http::withOptions(['verify' => false])->get("https://brasilapi.com.br/api/cnpj/v1/{$value}")->json();


        $this->cnpj = $response['cnpj'];
        $this->razao_social = $response['razao_social'];
        $this->nome_fantasia = $response['nome_fantasia'];
        $this->descricao_situacao_cadastral = $response['descricao_situacao_cadastral'];
        $this->cnae_fiscal_descricao = $response['cnae_fiscal_descricao'];
    }
    public function save() {
        $this->validate();

        Workshop::updateOrCreate(
            [
                'cnpj' => $this->cnpj,
            ],
            [
                'razao_social' => $this->razao_social,
                'nome_fantasia' => $this->nome_fantasia,
                'descricao_situacao_cadastral' => $this->descricao_situacao_cadastral,
                'cnae_fiscal_descricao' => $this->cnae_fiscal_descricao,
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
