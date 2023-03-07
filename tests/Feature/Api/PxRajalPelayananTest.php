<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PxRajal;
use App\Models\Pelayanan;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PxRajalPelayananTest extends TestCase
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
    public function it_gets_px_rajal_pelayanan()
    {
        $pxRajal = PxRajal::factory()->create();
        $pelayanan = Pelayanan::factory()
            ->count(2)
            ->create([
                'px_rajal_id' => $pxRajal->id,
            ]);

        $response = $this->getJson(
            route('api.px-rajal.pelayanan.index', $pxRajal)
        );

        $response->assertOk()->assertSee($pelayanan[0]->kecepatan);
    }

    /**
     * @test
     */
    public function it_stores_the_px_rajal_pelayanan()
    {
        $pxRajal = PxRajal::factory()->create();
        $data = Pelayanan::factory()
            ->make([
                'px_rajal_id' => $pxRajal->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.px-rajal.pelayanan.store', $pxRajal),
            $data
        );

        $this->assertDatabaseHas('pelayanan', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $pelayanan = Pelayanan::latest('id')->first();

        $this->assertEquals($pxRajal->id, $pelayanan->px_rajal_id);
    }
}
