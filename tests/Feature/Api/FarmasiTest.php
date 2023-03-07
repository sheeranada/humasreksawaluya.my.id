<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Farmasi;

use App\Models\PxRajal;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FarmasiTest extends TestCase
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
    public function it_gets_farmasi_list()
    {
        $farmasi = Farmasi::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.farmasi.index'));

        $response->assertOk()->assertSee($farmasi[0]->kecepatan);
    }

    /**
     * @test
     */
    public function it_stores_the_farmasi()
    {
        $data = Farmasi::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.farmasi.store'), $data);

        $this->assertDatabaseHas('farmasi', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_farmasi()
    {
        $farmasi = Farmasi::factory()->create();

        $pxRajal = PxRajal::factory()->create();

        $data = [
            'kecepatan' => $this->faker->text(255),
            'sikap_petugas' => $this->faker->text(255),
            'penjelasan_obat' => $this->faker->text(255),
            'pelayanan_farmasi' => $this->faker->text(255),
            'px_rajal_id' => $pxRajal->id,
        ];

        $response = $this->putJson(
            route('api.farmasi.update', $farmasi),
            $data
        );

        $data['id'] = $farmasi->id;

        $this->assertDatabaseHas('farmasi', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_farmasi()
    {
        $farmasi = Farmasi::factory()->create();

        $response = $this->deleteJson(route('api.farmasi.destroy', $farmasi));

        $this->assertModelMissing($farmasi);

        $response->assertNoContent();
    }
}
