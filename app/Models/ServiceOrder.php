<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'workshop_id',
        'situation_id',
        'service_date',
        'labor_hourly_rate',
        'labor_hours',

    ];



    // Relacionamento com Vehicle (Muitos para Um)
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    // Relacionamento com Workshop (Muitos para Um)
    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    // Relacionamento com Situation
    public function situation()
    {
        return $this->belongsTo(Situation::class);
    }
}
