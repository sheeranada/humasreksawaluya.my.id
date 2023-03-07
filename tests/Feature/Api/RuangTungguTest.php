<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\RuangTunggu;

use App\Models\PxRajal;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RuangTungguTest extends TestCase
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
    public function it_gets_ruang_tunggu_list()
    {
        $ruangTunggu = RuangTunggu::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.ruang-tunggu.index'));

        $response->assertOk()->assertSee($ruangTunggu[0]->kenyamanan);
    }

    /**
     * @test
     */
    public function it_stores_the_ruang_tunggu()
    {
        $data = RuangTunggu::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.ruang-tunggu.store'), $data);

        $this->assertDatabaseHas('ruang_tunggu', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_ruang_tunggu()
    {
        $ruangTunggu = RuangTunggu::factory()->create();

        $pxRajal = PxRajal::factory()->create();

        $data = [
            'kenyamanan' => $this->faker->text(255),
            'kebersihan' => $this->faker->text(255),
            'saran_kritik' => $this->faker->text(255),
            'px_rajal_id' => $pxRajal->id,
        ];

        $response = $this->putJson(
            route('api.ruang-tunggu.update', $ruangTunggu),
            $data
        );

        $data['id'] = $ruangTunggu->id;

        $this->assertDatabaseHas('ruang_tunggu', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_ruang_tunggu()
    {
        $ruangTunggu = RuangTunggu::factory()->create();

        $response = $this->deleteJson(
            route('api.ruang-tunggu.destroy', $ruangTunggu)
        );

        $this->assertModelMissing($ruangTunggu);

        $response->assertNoContent();
    }
}
