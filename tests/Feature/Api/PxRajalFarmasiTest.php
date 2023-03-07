<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PxRajal;
use App\Models\Farmasi;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PxRajalFarmasiTest extends TestCase
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
    public function it_gets_px_rajal_farmasi()
    {
        $pxRajal = PxRajal::factory()->create();
        $farmasi = Farmasi::factory()
            ->count(2)
            ->create([
                'px_rajal_id' => $pxRajal->id,
            ]);

        $response = $this->getJson(
            route('api.px-rajal.farmasi.index', $pxRajal)
        );

        $response->assertOk()->assertSee($farmasi[0]->kecepatan);
    }

    /**
     * @test
     */
    public function it_stores_the_px_rajal_farmasi()
    {
        $pxRajal = PxRajal::factory()->create();
        $data = Farmasi::factory()
            ->make([
                'px_rajal_id' => $pxRajal->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.px-rajal.farmasi.store', $pxRajal),
            $data
        );

        $this->assertDatabaseHas('farmasi', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $farmasi = Farmasi::latest('id')->first();

        $this->assertEquals($pxRajal->id, $farmasi->px_rajal_id);
    }
}
