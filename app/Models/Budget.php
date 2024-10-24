<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;


    protected $fillable = [
        'vehicle_id',
        'total_labor',
        'total_products',

        'situation_id'];







    // Relacionamento com Vehicle (Muitos para Um)
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    // Relacionamento com Service (Muitos para Um)
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Relacionamento com ServiceOrder (Um Orçamento pode ter várias Ordens de Serviço)
    public function serviceOrders()
    {
        return $this->hasMany(ServiceOrder::class);
    }
}
