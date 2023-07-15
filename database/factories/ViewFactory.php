<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\View;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ViewFactory extends Factory
{
    protected $model = View::class;

    public function definition(): array
    {
        return [
            'viewable_id' => $this->faker->randomNumber(),
            'viewable_type' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }
}
