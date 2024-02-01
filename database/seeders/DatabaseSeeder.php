<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Student::factory()->count(50)->create();
    }
}
