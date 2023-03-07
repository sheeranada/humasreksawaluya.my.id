<?php

namespace Database\Factories;

use App\Models\Pelayanan;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PelayananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pelayanan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kecepatan' => $this->faker->text(255),
            'kemudahan' => $this->faker->text(255),
            'pelayanan_yang_perlu_dibenahi' => $this->faker->text,
            'px_rajal_id' => \App\Models\PxRajal::factory(),
        ];
    }
}
