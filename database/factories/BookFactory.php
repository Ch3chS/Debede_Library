<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text($maxNbChars = 100),
            'link' => $this->faker->url(),
            'publication_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'autor' => $this->faker->name($gender ='male'|'female'),
        ];
    }
}
