<?php

namespace Database\Seeders;

use App\Models\Sdm;
use Illuminate\Database\Seeder;

class SdmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sdm::factory()
            ->count(5)
            ->create();
    }
}
