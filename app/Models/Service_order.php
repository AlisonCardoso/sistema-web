<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_order extends Model
{
    use HasFactory;

    protected $fillable = [
        'budget_id',
        'vehicle_id',
        'workshop_id',
        'service_id',
        'product_id',
        'service_date',
        'status',
        'start_date',
        'end_date',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}
