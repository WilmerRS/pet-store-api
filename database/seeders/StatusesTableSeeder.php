<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $statuses = [
        [
          'name' => 'Available',
          'slug' => 'available',
          'description' => 'Available status',
          'created_at'=> now(),
          'updated_at'=> now(),
        ],
        [
          'name' => 'Pending',
          'slug' => 'pending',
          'description' => 'Pending status',
          'created_at'=> now(),
          'updated_at'=> now(),
        ],
        [
          'name' => 'Sold',
          'slug' => 'sold',
          'description' => 'Sold status',
          'created_at'=> now(),
          'updated_at'=> now(),
        ],
      ];

      foreach ($statuses as $status) {
        if (!Status::where('slug', $status['slug'])->exists()) {
          Status::create($status);
        }
      }
    }
}
