<?php

namespace Database\Seeders;

use App\Models\Interests;
use Database\Factories\InterestsSynonymsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Interests::factory()->count(20)->hasSynonyms(5)->create();
    }
}
