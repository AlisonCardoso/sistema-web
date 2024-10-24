<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\RegionalCommand;
use App\Models\SubCommand;
use App\Models\Company;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\TypeVehicle;
use App\Models\Vehicle;
use App\Models\SituationVehicle;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

      /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test2@example.com',
        ]);*/

        $this->call([



            SeederComandoRegional::class,
            SeederBatalhao::class,
            SeederCompanies::class,
            SeederCategoria::class,
            seederSubcategoria::class,
            SeederSituation::class,

            SeederProduct::class,
            SeederService::class,
            SeederSituacaoVeiculo::class,
            Seedertipoveiculo::class,

          // SeederServiceOrder::class,
            //SeederVehicle::class,


 /*
       // SeederBudget::class,

*/





        ]);

    }
}
