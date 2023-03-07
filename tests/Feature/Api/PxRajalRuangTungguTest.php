<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PxRajal;
use App\Models\RuangTunggu;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PxRajalRuangTungguTest extends TestCase
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
    public function it_gets_px_rajal_ruang_tunggu()
    {
        $pxRajal = PxRajal::factory()->create();
        $ruangTunggu = RuangTunggu::factory()
            ->count(2)
            ->create([
                'px_rajal_id' => $pxRajal->id,
            ]);

        $response = $this->getJson(
            route('api.px-rajal.ruang-tunggu.index', $pxRajal)
        );

        $response->assertOk()->assertSee($ruangTunggu[0]->kenyamanan);
    }

    /**
     * @test
     */
    public function it_stores_the_px_rajal_ruang_tunggu()
    {
        $pxRajal = PxRajal::factory()->create();
        $data = RuangTunggu::factory()
            ->make([
                'px_rajal_id' => $pxRajal->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.px-rajal.ruang-tunggu.store', $pxRajal),
            $data
        );

        $this->assertDatabaseHas('ruang_tunggu', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $ruangTunggu = RuangTunggu::latest('id')->first();

        $this->assertEquals($pxRajal->id, $ruangTunggu->px_rajal_id);
    }
}
