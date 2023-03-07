<?php

namespace Tests\Feature\Api;

use App\Models\Sdm;
use App\Models\User;

use App\Models\PxRajal;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SdmTest extends TestCase
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
    public function it_gets_sdm_list()
    {
        $sdm = Sdm::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.sdm.index'));

        $response->assertOk()->assertSee($sdm[0]->parkir);
    }

    /**
     * @test
     */
    public function it_stores_the_sdm()
    {
        $data = Sdm::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.sdm.store'), $data);

        $this->assertDatabaseHas('sdm', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_sdm()
    {
        $sdm = Sdm::factory()->create();

        $pxRajal = PxRajal::factory()->create();

        $data = [
            'parkir' => $this->faker->text(255),
            'security' => $this->faker->text(255),
            'dokter' => $this->faker->text(255),
            'perawat' => $this->faker->text(255),
            'radiologi' => $this->faker->text(255),
            'laboratorium' => $this->faker->text(255),
            'px_rajal_id' => $pxRajal->id,
        ];

        $response = $this->putJson(route('api.sdm.update', $sdm), $data);

        $data['id'] = $sdm->id;

        $this->assertDatabaseHas('sdm', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_sdm()
    {
        $sdm = Sdm::factory()->create();

        $response = $this->deleteJson(route('api.sdm.destroy', $sdm));

        $this->assertModelMissing($sdm);

        $response->assertNoContent();
    }
}
