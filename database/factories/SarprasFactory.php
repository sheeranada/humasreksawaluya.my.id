<?php

namespace Database\Factories;

use App\Models\Sarpras;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SarprasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sarpras::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sarana' => $this->faker->text(255),
            'prasarana' => $this->faker->text(255),
            'fasilitas_lain' => $this->faker->text(255),
            'px_rajal_id' => \App\Models\PxRajal::factory(),
        ];
    }
}
