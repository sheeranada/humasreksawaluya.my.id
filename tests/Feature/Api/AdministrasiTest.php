<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Administrasi;

use App\Models\PxRajal;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdministrasiTest extends TestCase
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
    public function it_gets_administrasi_list()
    {
        $administrasi = Administrasi::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.administrasi.index'));

        $response->assertOk()->assertSee($administrasi[0]->pendaftaran);
    }

    /**
     * @test
     */
    public function it_stores_the_administrasi()
    {
        $data = Administrasi::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.administrasi.store'), $data);

        $this->assertDatabaseHas('administrasi', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_administrasi()
    {
        $administrasi = Administrasi::factory()->create();

        $pxRajal = PxRajal::factory()->create();

        $data = [
            'pendaftaran' => $this->faker->text(255),
            'kasir' => $this->faker->text(255),
            'px_rajal_id' => $pxRajal->id,
        ];

        $response = $this->putJson(
            route('api.administrasi.update', $administrasi),
            $data
        );

        $data['id'] = $administrasi->id;

        $this->assertDatabaseHas('administrasi', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_administrasi()
    {
        $administrasi = Administrasi::factory()->create();

        $response = $this->deleteJson(
            route('api.administrasi.destroy', $administrasi)
        );

        $this->assertModelMissing($administrasi);

        $response->assertNoContent();
    }
}
