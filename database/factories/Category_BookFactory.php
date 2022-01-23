<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Book;

class Category_BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_category' => Category::all()->random()->id,
            'id_book' => Book::all()->random()->id,
        ];
    }
}
