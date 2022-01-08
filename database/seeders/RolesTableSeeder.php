<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $roles = [
      [
        'name' => 'admin',
        'slug' => 'Administrator',
        'description' => 'Administrator role',
        'created_at'=> now(),
        'updated_at'=> now(),
      ],
      [
        'name' => 'user',
        'slug' => 'User',
        'description' => 'User role',
        'created_at'=> now(),
        'updated_at'=> now(),
      ],
      [
        'name' => 'guest',
        'slug' => 'Guest',
        'description' => 'Guest role',
        'created_at'=> now(),
        'updated_at'=> now(),
      ],
    ];

    foreach ($roles as $role) {
      if (!Role::where('slug', $role['slug'])->exists()) {
        Role::create($role);
      }
    }
  }
}
