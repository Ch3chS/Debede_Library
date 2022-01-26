<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Country::factory(10)->create();
        \App\Models\Region::factory(10)->create();
        /*\App\Models\Role::factory(10)->create();*/
        \App\Models\User::factory(10)->create();
        \App\Models\Clasification::factory(10)->create();
        \App\Models\Book::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Category_Book::factory(10)->create();
        \App\Models\Region_Book::factory(10)->create();
        \App\Models\User_Book::factory(10)->create();
        
        
    }
}
