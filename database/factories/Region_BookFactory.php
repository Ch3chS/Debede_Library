<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Region;
use App\Models\Clasification;

class Region_BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_book' => Book::all()->random()->id,
            'id_region' => Region::all()->random()->id,
            'id_clasification' => Clasification::all()->random()->id,
        ];
    }
}
