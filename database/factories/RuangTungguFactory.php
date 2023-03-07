<?php

namespace Database\Factories;

use App\Models\RuangTunggu;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RuangTungguFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RuangTunggu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kenyamanan' => $this->faker->text(255),
            'kebersihan' => $this->faker->text(255),
            'saran_kritik' => $this->faker->text(255),
            'px_rajal_id' => \App\Models\PxRajal::factory(),
        ];
    }
}
