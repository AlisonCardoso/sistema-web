<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
class SeederVehicle extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Vehicle::create([

                'sub_command_id' => 1,
                'type_vehicle_id' => 1,
                'situation_vehicle_id' => 1,
                'brand' => 'Toyota',
                'model' => 'Corolla',
                'prefix' => 'ABC123',
                'asset_number' => '12345',
                'plate' => 'XYZ-1234',
                'year' => 2020,
                'price' => 90000.00,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        Vehicle::create([
                'sub_command_id' => 1,
                'type_vehicle_id' => 2,
                'situation_vehicle_id' => 1,
                'brand' => 'Honda',
                'model' => 'CG 160',
                'prefix' => 'DEF456',
                'plate' => 'MOT-5678',
                'year' => 2021,
                'price' => 12000.00,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),

        ]);
    }
}
