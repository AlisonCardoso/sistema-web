<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'description',
        'price',
        'duration',
    ];


    // Relacionamento com SubCategory (Muitos para Um)
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    // Relacionamento com Budget (Um Serviço pode estar em vários Orçamentos)
    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    // Relacionamento com ServiceOrder (Um Serviço pode estar em várias Ordens de Serviço)
    public function serviceOrders()
    {
        return $this->hasMany(ServiceOrder::class);
    }

}
