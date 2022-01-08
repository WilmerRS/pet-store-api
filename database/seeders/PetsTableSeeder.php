<?php

namespace Database\Seeders;

use App\Models\Pet;
use Illuminate\Database\Seeder;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pet::factory(10)->create();
    }
}
