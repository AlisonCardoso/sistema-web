<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_category_id',
        'name',
        'description',
        'price',
        'duration',
    ];
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class,'sub_category_id');
    }

    public function serviceOrders()
    {
        return $this->hasMany(Service_order::class);
    }
}
