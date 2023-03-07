<?php

namespace Tests\Feature\Controllers;

use App\Models\Sdm;
use App\Models\User;

use App\Models\PxRajal;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SdmControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_sdm()
    {
        $sdm = Sdm::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('sdm.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.sdm.index')
            ->assertViewHas('sdm');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_sdm()
    {
        $response = $this->get(route('sdm.create'));

        $response->assertOk()->assertViewIs('app.sdm.create');
    }

    /**
     * @test
     */
    public function it_stores_the_sdm()
    {
        $data = Sdm::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('sdm.store'), $data);

        $this->assertDatabaseHas('sdm', $data);

        $sdm = Sdm::latest('id')->first();

        $response->assertRedirect(route('sdm.edit', $sdm));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_sdm()
    {
        $sdm = Sdm::factory()->create();

        $response = $this->get(route('sdm.show', $sdm));

        $response
            ->assertOk()
            ->assertViewIs('app.sdm.show')
            ->assertViewHas('sdm');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_sdm()
    {
        $sdm = Sdm::factory()->create();

        $response = $this->get(route('sdm.edit', $sdm));

        $response
            ->assertOk()
            ->assertViewIs('app.sdm.edit')
            ->assertViewHas('sdm');
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

        $response = $this->put(route('sdm.update', $sdm), $data);

        $data['id'] = $sdm->id;

        $this->assertDatabaseHas('sdm', $data);

        $response->assertRedirect(route('sdm.edit', $sdm));
    }

    /**
     * @test
     */
    public function it_deletes_the_sdm()
    {
        $sdm = Sdm::factory()->create();

        $response = $this->delete(route('sdm.destroy', $sdm));

        $response->assertRedirect(route('sdm.index'));

        $this->assertModelMissing($sdm);
    }
}
