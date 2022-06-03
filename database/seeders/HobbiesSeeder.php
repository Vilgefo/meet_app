<?php

namespace Database\Seeders;

use App\Models\Hobbies;
use Illuminate\Database\Seeder;

class HobbiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hobbies::factory()->count(20)->hasSynonyms(5)->create();
    }
}
