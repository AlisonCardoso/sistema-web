<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labor extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_category_id',
        'service_order_id',
        'hours_worked',
        'hourly_rate', 
        'total_value',

    ];

    public function serviceOrder()
    {
        return $this->belongsTo(Service_order::class);
    }
    public  function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }


}
