<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PetFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $name = $this->faker->name;
    $slug = Str::slug($name);
    return [
      'name' => $name,
      'slug' => $slug,
      'description' => $this->faker->paragraph,
      'status_id' => $this->faker->numberBetween(1, 3),
      'category_id' => $this->faker->numberBetween(1, 3),
    ];
  }
}
