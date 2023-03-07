<?php

namespace Database\Seeders;

use App\Models\RuangTunggu;
use Illuminate\Database\Seeder;

class RuangTungguSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RuangTunggu::factory()
            ->count(5)
            ->create();
    }
}
