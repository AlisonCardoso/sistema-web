<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCommand extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug','regional_command_id'];

    public function regional_command()
    {
        return $this->belongsTo(RegionalCommand::class);
    }
    public function company()
    {
        return $this->hasMany(Company::class);
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
