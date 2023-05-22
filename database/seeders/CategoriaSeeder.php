<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Camisas Masculinas'],
            ['id' => 2, 'name' => 'Camisas Femeninas'],
            ['id' => 3, 'name' => 'Shorts Masculinos'],
            ['id' => 4, 'name' => 'Shorts Femeninos'],
            ['id' => 5, 'name' => 'Calças Masculinas'],
            ['id' => 6, 'name' => 'Calças Femeninas'],
            
        ]);
    }
}