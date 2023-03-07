<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Administrasi;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdministrasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Administrasi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pendaftaran' => $this->faker->text(255),
            'kasir' => $this->faker->text(255),
            'px_rajal_id' => \App\Models\PxRajal::factory(),
        ];
    }
}
