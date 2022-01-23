<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Region;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nickname' => $this->faker->text($maxNbChars = 30),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->text(),
            'birthdate' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'id_role' => Role::all()->random()->id,
            'id_region' => Region::all()->random()->id,

            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
