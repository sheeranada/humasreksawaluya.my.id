<?php

namespace Database\Seeders;

use App\Models\PxRajal;
use Illuminate\Database\Seeder;

class PxRajalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PxRajal::factory()
            ->count(5)
            ->create();
    }
}
