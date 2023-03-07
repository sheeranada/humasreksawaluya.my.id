<?php

namespace Database\Seeders;

use App\Models\Sarpras;
use Illuminate\Database\Seeder;

class SarprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sarpras::factory()
            ->count(5)
            ->create();
    }
}
