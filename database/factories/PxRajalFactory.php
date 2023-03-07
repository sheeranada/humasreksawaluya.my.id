<?php

namespace Database\Factories;

use App\Models\PxRajal;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PxRajalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PxRajal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no_upf' => $this->faker->randomNumber(0),
            'no_rm' => $this->faker->randomNumber(0),
            'nama_pasien' => $this->faker->text(255),
            'klinik' => $this->faker->text(255),
            'penjamin' => $this->faker->text(255),
            'no_hp' => $this->faker->text(255),
            'tgl_daftar' => $this->faker->dateTime,
            'kategori_pasien' => $this->faker->text(255),
        ];
    }
}
