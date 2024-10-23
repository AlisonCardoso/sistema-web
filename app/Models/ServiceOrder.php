<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
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

    // Relacionamento com Budget (Muitos para Um)
    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

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

    // Relacionamento com Service (Muitos para Um)
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Relacionamento com Product (Muitos para Um)
    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault(); // Produto opcional
    }
}
