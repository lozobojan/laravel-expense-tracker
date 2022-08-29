<?php

namespace Database\Seeders;

use App\Models\ExpenseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ["Računi", "Obrazovanje", "Ostalo"];
        foreach ($types as $type) {
            ExpenseType::query()->create([
                'name' => $type
            ]);
        }
    }
}
