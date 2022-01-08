<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::factory(10)->create();

    // deafult admin
    User::create([
      'username' => 'admin',
      'first_name' => 'Admin',
      'last_name' => '',
      'email' => 'admin@admin.com',
      'password' => bcrypt('admin'),
      'role_id' => 1,
      'email_verified_at' => now(),
      'remember_token' => Str::random(10),
      'created_at' => now(),
      'updated_at' => now(),
    ]);
  }
}
