<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(AdministrasiSeeder::class);
        $this->call(FarmasiSeeder::class);
        $this->call(PelayananSeeder::class);
        $this->call(PxRajalSeeder::class);
        $this->call(RuangTungguSeeder::class);
        $this->call(SarprasSeeder::class);
        $this->call(SdmSeeder::class);
        $this->call(UserSeeder::class);
    }
}
