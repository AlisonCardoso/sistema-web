<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederSituation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $situations = [
            ['name' => 'pending', 'description' => 'Aguardando aprovação', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'approved', 'description' => 'Orçamento aprovado', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'rejected', 'description' => 'Orçamento rejeitado', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'in-progress', 'description' => 'Serviço em andamento', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'completed', 'description' => 'Serviço concluído', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'cancelled', 'description' => 'Orçamento cancelado pelo cliente', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('situations')->insert($situations);

    
    }
}
