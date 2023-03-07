<?php

namespace Database\Seeders;

use App\Models\Farmasi;
use Illuminate\Database\Seeder;

class FarmasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Farmasi::factory()
            ->count(5)
            ->create();
    }
}
