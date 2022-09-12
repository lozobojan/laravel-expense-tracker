<?php

namespace Database\Seeders;

use App\Models\ExpenseType;
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
        $types = [
            ['name' => "Računi"],
            ['name' => "Obrazovanje"],
            ['name' => "Ostalo"]
        ];
        ExpenseType::query()->insert($types);
    }
}
