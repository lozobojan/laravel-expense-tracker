<?php

namespace Database\Factories;

use App\Models\ExpenseSubtype;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 11,
            'expense_subtype_id' => ExpenseSubtype::query()->inRandomOrder()->first()->id,
            'amount' => fake()->randomFloat(2, 0.01, 1000.00),
            'date' => fake()->date(),
            'description' => fake()->text(255)
        ];
    }
}
