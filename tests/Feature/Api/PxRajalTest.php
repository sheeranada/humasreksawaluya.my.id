<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PxRajal;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PxRajalTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_px_rajal_list()
    {
        $pxRajal = PxRajal::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.px-rajal.index'));

        $response->assertOk()->assertSee($pxRajal[0]->nama_pasien);
    }

    /**
     * @test
     */
    public function it_stores_the_px_rajal()
    {
        $data = PxRajal::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.px-rajal.store'), $data);

        $this->assertDatabaseHas('px_rajal', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_px_rajal()
    {
        $pxRajal = PxRajal::factory()->create();

        $data = [
            'no_upf' => $this->faker->randomNumber(0),
            'no_rm' => $this->faker->randomNumber(0),
            'nama_pasien' => $this->faker->text(255),
            'klinik' => $this->faker->text(255),
            'penjamin' => $this->faker->text(255),
            'no_hp' => $this->faker->text(255),
            'tgl_daftar' => $this->faker->dateTime,
            'kategori_pasien' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.px-rajal.update', $pxRajal),
            $data
        );

        $data['id'] = $pxRajal->id;

        $this->assertDatabaseHas('px_rajal', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_px_rajal()
    {
        $pxRajal = PxRajal::factory()->create();

        $response = $this->deleteJson(route('api.px-rajal.destroy', $pxRajal));

        $this->assertModelMissing($pxRajal);

        $response->assertNoContent();
    }
}
