<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Pelayanan;

use App\Models\PxRajal;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PelayananTest extends TestCase
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
    public function it_gets_pelayanan_list()
    {
        $pelayanan = Pelayanan::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.pelayanan.index'));

        $response->assertOk()->assertSee($pelayanan[0]->kecepatan);
    }

    /**
     * @test
     */
    public function it_stores_the_pelayanan()
    {
        $data = Pelayanan::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.pelayanan.store'), $data);

        $this->assertDatabaseHas('pelayanan', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_pelayanan()
    {
        $pelayanan = Pelayanan::factory()->create();

        $pxRajal = PxRajal::factory()->create();

        $data = [
            'kecepatan' => $this->faker->text(255),
            'kemudahan' => $this->faker->text(255),
            'pelayanan_yang_perlu_dibenahi' => $this->faker->text,
            'px_rajal_id' => $pxRajal->id,
        ];

        $response = $this->putJson(
            route('api.pelayanan.update', $pelayanan),
            $data
        );

        $data['id'] = $pelayanan->id;

        $this->assertDatabaseHas('pelayanan', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_pelayanan()
    {
        $pelayanan = Pelayanan::factory()->create();

        $response = $this->deleteJson(
            route('api.pelayanan.destroy', $pelayanan)
        );

        $this->assertModelMissing($pelayanan);

        $response->assertNoContent();
    }
}
