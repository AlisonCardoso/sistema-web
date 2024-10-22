<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class WorkshopRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [



            'name' => 'required|string',
            'email' => 'required|email',
            'cnpj' => 'required|string',
            'insrcicao_estadual' => 'required|string',
            'phone_number' => 'required|string',
            'responsavel' => 'required| string',
            'workshop_id' => 'required|numeric',
            'state_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'address' => 'required| string',
            'district' =>'required| string',
            'cep' => 'required',
            'number' => 'required|numeric',
            'complement' => 'nullable',






        ];
    }

    public function messages(): array
    {
        return[
            'name.required' => 'Campo nome é obrigatório!',
            'email.required' => 'Campo e-mail é obrigatório!',
            'phone_number.required' => 'Campo telefone é obrigatório!',
            'responsavel.required' => 'Campo responsável é obrigatório!',
             'state_id.required' => 'Selecione um estado',
             'city_id.required' => 'Selecione uma cidade',
            'address.max' => 'Campo endereço é obrigatório!',
            'district.max' => 'Campo bairro é obrigatório!',
            'cep.required' => 'Campo cep é obrigatório!',
            'address.required' => 'Campo endereço é obrigatório!',
            'number.required' => 'Campo numero é obrigatório!',
        ];
    }
}