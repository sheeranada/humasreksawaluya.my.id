<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Sarpras;

use App\Models\PxRajal;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SarprasTest extends TestCase
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
    public function it_gets_sarpras_list()
    {
        $sarpras = Sarpras::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.sarpras.index'));

        $response->assertOk()->assertSee($sarpras[0]->sarana);
    }

    /**
     * @test
     */
    public function it_stores_the_sarpras()
    {
        $data = Sarpras::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.sarpras.store'), $data);

        $this->assertDatabaseHas('sarpras', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_sarpras()
    {
        $sarpras = Sarpras::factory()->create();

        $pxRajal = PxRajal::factory()->create();

        $data = [
            'sarana' => $this->faker->text(255),
            'prasarana' => $this->faker->text(255),
            'fasilitas_lain' => $this->faker->text(255),
            'px_rajal_id' => $pxRajal->id,
        ];

        $response = $this->putJson(
            route('api.sarpras.update', $sarpras),
            $data
        );

        $data['id'] = $sarpras->id;

        $this->assertDatabaseHas('sarpras', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_sarpras()
    {
        $sarpras = Sarpras::factory()->create();

        $response = $this->deleteJson(route('api.sarpras.destroy', $sarpras));

        $this->assertModelMissing($sarpras);

        $response->assertNoContent();
    }
}
