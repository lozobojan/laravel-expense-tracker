<?php

namespace Database\Seeders;

use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expenses = [
            [
                'user_id' => 1,
                'expense_subtype_id' => 1,
                'amount' => 150,
                'date' => Carbon::now(),
                'description' => "Test pozitivan iznos"
            ],
            [
                'user_id' => 1,
                'expense_subtype_id' => 1,
                'amount' => -90, // ne bi smjelo da prodje
                'date' => Carbon::now(),
                'description' => "Test negativan iznos"
            ]
        ];

        // Expense::query()->insert($expenses);
        foreach ($expenses as $expense) {
            Expense::query()->create($expense);
        }
    }
}
