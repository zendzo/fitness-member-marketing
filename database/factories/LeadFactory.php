<?php

namespace Database\Factories;

use App\Models\Leads;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leads::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'age' => $this->faker->numberBetween(20,40),
            'interested_package' => $this->faker,
            'dob' => $this->faker->dateTimeBetween('-40 years','-20 years'),
            'branch_id' => rand(1,2),
            'add_by' => rand(1,2)
        ];
    }
}
