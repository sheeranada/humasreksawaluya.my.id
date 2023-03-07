<?php

namespace Tests\Feature\Api;

use App\Models\Sdm;
use App\Models\User;
use App\Models\PxRajal;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PxRajalSdmTest extends TestCase
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
    public function it_gets_px_rajal_sdm()
    {
        $pxRajal = PxRajal::factory()->create();
        $sdm = Sdm::factory()
            ->count(2)
            ->create([
                'px_rajal_id' => $pxRajal->id,
            ]);

        $response = $this->getJson(route('api.px-rajal.sdm.index', $pxRajal));

        $response->assertOk()->assertSee($sdm[0]->parkir);
    }

    /**
     * @test
     */
    public function it_stores_the_px_rajal_sdm()
    {
        $pxRajal = PxRajal::factory()->create();
        $data = Sdm::factory()
            ->make([
                'px_rajal_id' => $pxRajal->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.px-rajal.sdm.store', $pxRajal),
            $data
        );

        $this->assertDatabaseHas('sdm', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $sdm = Sdm::latest('id')->first();

        $this->assertEquals($pxRajal->id, $sdm->px_rajal_id);
    }
}
