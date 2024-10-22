<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;
    protected $fillable = [
       'address_id',
        'cnpj',
        'razao_social',
        'descricao_situacao_cadastral',
        'cnae_fiscal_descricao',
        'phone_number',
        'email',
        'responsavel',
    ];
    public function user()
    {

        return $this->hasMany(User::class);
    }
    public function address()
    {
        return $this->hasOne(Address::class);
    }
    public function serviceOrders()
    {
        return $this->hasMany(Service_order::class);
    }
   
    
}
