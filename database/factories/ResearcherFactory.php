<?php

namespace Database\Factories;

use App\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Researcher>
 */
class ResearcherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'birthday' => $this->faker->dateTimeThisCentury,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'gender' => $this->faker->randomElement(['M', 'F']),
            'phone' => $this->faker->phoneNumber,
            'mobile_phone' => $this->faker->phoneNumber,
            'status' => $this->faker->randomElement(['active']),
            'role_id' => Role::factory(),
            'admission_date' => $this->faker->dateTimeThisDecade,
        ];
    }
}
