<?php

namespace Database\Factories;

use App\Models\Farmasi;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FarmasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Farmasi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kecepatan' => $this->faker->text(255),
            'sikap_petugas' => $this->faker->text(255),
            'penjelasan_obat' => $this->faker->text(255),
            'pelayanan_farmasi' => $this->faker->text(255),
            'px_rajal_id' => \App\Models\PxRajal::factory(),
        ];
    }
}
