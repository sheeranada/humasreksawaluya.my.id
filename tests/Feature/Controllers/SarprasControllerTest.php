<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Sarpras;

use App\Models\PxRajal;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SarprasControllerTest extends TestCase
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
    public function it_displays_index_view_with_sarpras()
    {
        $sarpras = Sarpras::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('sarpras.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.sarpras.index')
            ->assertViewHas('sarpras');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_sarpras()
    {
        $response = $this->get(route('sarpras.create'));

        $response->assertOk()->assertViewIs('app.sarpras.create');
    }

    /**
     * @test
     */
    public function it_stores_the_sarpras()
    {
        $data = Sarpras::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('sarpras.store'), $data);

        $this->assertDatabaseHas('sarpras', $data);

        $sarpras = Sarpras::latest('id')->first();

        $response->assertRedirect(route('sarpras.edit', $sarpras));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_sarpras()
    {
        $sarpras = Sarpras::factory()->create();

        $response = $this->get(route('sarpras.show', $sarpras));

        $response
            ->assertOk()
            ->assertViewIs('app.sarpras.show')
            ->assertViewHas('sarpras');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_sarpras()
    {
        $sarpras = Sarpras::factory()->create();

        $response = $this->get(route('sarpras.edit', $sarpras));

        $response
            ->assertOk()
            ->assertViewIs('app.sarpras.edit')
            ->assertViewHas('sarpras');
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

        $response = $this->put(route('sarpras.update', $sarpras), $data);

        $data['id'] = $sarpras->id;

        $this->assertDatabaseHas('sarpras', $data);

        $response->assertRedirect(route('sarpras.edit', $sarpras));
    }

    /**
     * @test
     */
    public function it_deletes_the_sarpras()
    {
        $sarpras = Sarpras::factory()->create();

        $response = $this->delete(route('sarpras.destroy', $sarpras));

        $response->assertRedirect(route('sarpras.index'));

        $this->assertModelMissing($sarpras);
    }
}
