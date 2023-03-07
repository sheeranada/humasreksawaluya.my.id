<?php

namespace Database\Factories;

use App\Models\Sdm;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SdmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sdm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parkir' => $this->faker->text(255),
            'security' => $this->faker->text(255),
            'dokter' => $this->faker->text(255),
            'perawat' => $this->faker->text(255),
            'radiologi' => $this->faker->text(255),
            'laboratorium' => $this->faker->text(255),
            'px_rajal_id' => \App\Models\PxRajal::factory(),
        ];
    }
}
