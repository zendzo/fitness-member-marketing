<?php

namespace Database\Factories;

use App\Models\Lead;
use App\Models\Remainder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RemainderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Remainder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = [
            'completed',
            'pending'
        ];

        return [
            'lead_id' => Lead::factory(),
            'user_id' => 1,
            'remainder' => $this->faker->sentence,
            'note' => $this->faker->paragraph,
            'remainder_date' => $this->faker->dateTimeThisMonth,
            'status' => $status[rand(0,1)],
        ];
    }
}
