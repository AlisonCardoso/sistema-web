<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionalCommand extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];
    public function sub_command()
    {
        return $this->hasMany(SubCommand::class);
    }
}
