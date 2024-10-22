<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'stock','sub_category_id'];
    public function subcategory()
      {
        return $this->belongsTo(Subcategory::class);
    }
    // Relacionamento com ServiceOrder (Um Produto pode estar em várias Ordens de Serviço)
    public function serviceOrders()
    {
        return $this->hasMany(Service_order::class);
    }
}
