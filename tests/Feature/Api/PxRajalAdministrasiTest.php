<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PxRajal;
use App\Models\Administrasi;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PxRajalAdministrasiTest extends TestCase
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
    public function it_gets_px_rajal_administrasi()
    {
        $pxRajal = PxRajal::factory()->create();
        $administrasi = Administrasi::factory()
            ->count(2)
            ->create([
                'px_rajal_id' => $pxRajal->id,
            ]);

        $response = $this->getJson(
            route('api.px-rajal.administrasi.index', $pxRajal)
        );

        $response->assertOk()->assertSee($administrasi[0]->pendaftaran);
    }

    /**
     * @test
     */
    public function it_stores_the_px_rajal_administrasi()
    {
        $pxRajal = PxRajal::factory()->create();
        $data = Administrasi::factory()
            ->make([
                'px_rajal_id' => $pxRajal->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.px-rajal.administrasi.store', $pxRajal),
            $data
        );

        $this->assertDatabaseHas('administrasi', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $administrasi = Administrasi::latest('id')->first();

        $this->assertEquals($pxRajal->id, $administrasi->px_rajal_id);
    }
}
