<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituationVehicle extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'color', 'vehicle_id'];

    public function veiculo()
    {
        return $this->hasMany(Vehicle::class);
    }
}
