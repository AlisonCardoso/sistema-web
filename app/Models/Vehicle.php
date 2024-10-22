<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'sub_command_id',
        'type_vehicle_id',
        'vehicle_id',
        'situation_vehicle_id',
         'brand',
         'model',
        'prefix',
        'plate',
         'asset_number',
        'characterized',
        'active',
         'year',
        'odometer',
         'price'

         

     ];

     public function type_vehicle()
     {

         return $this->hasOne(TypeVehicle::class);
     }
     public function sub_command()
    {
        return $this->belongsTo(SubCommand::class);
    }

    public function situationVehicle()
    {
        return $this->belongsTo(SituationVehicle::class);
    }
    public function serviceOrders()
    {
        return $this->hasMany(Service_order::class);
    }
    
 
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
