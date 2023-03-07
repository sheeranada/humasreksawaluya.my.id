<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PxRajal;
use App\Models\Sarpras;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PxRajalSarprasTest extends TestCase
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
    public function it_gets_px_rajal_sarpras()
    {
        $pxRajal = PxRajal::factory()->create();
        $sarpras = Sarpras::factory()
            ->count(2)
            ->create([
                'px_rajal_id' => $pxRajal->id,
            ]);

        $response = $this->getJson(
            route('api.px-rajal.sarpras.index', $pxRajal)
        );

        $response->assertOk()->assertSee($sarpras[0]->sarana);
    }

    /**
     * @test
     */
    public function it_stores_the_px_rajal_sarpras()
    {
        $pxRajal = PxRajal::factory()->create();
        $data = Sarpras::factory()
            ->make([
                'px_rajal_id' => $pxRajal->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.px-rajal.sarpras.store', $pxRajal),
            $data
        );

        $this->assertDatabaseHas('sarpras', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $sarpras = Sarpras::latest('id')->first();

        $this->assertEquals($pxRajal->id, $sarpras->px_rajal_id);
    }
}
