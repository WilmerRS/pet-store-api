<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
        [
          'name' => 'Dog',
          'slug' => 'dog',
          'description' => 'Dog category',
          'created_at'=> now(),
          'updated_at'=> now(),
        ],
        [
          'name' => 'Cat',
          'slug' => 'cat',
          'description' => 'Cat category',
          'created_at'=> now(),
          'updated_at'=> now(),
        ],
        [
          'name' => 'Rabbit',
          'slug' => 'rabbit',
          'description' => 'Rabbit category',
          'created_at'=> now(),
          'updated_at'=> now(),
        ],
      ];

      foreach ($categories as $category) {
        if (!Category::where('slug', $category['slug'])->exists()) {
          Category::create($category);
        }
      }
    }
}
