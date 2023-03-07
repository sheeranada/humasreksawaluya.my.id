<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Pelayanan;

use App\Models\PxRajal;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PelayananControllerTest extends TestCase
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
    public function it_displays_index_view_with_pelayanan()
    {
        $pelayanan = Pelayanan::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('pelayanan.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.pelayanan.index')
            ->assertViewHas('pelayanan');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_pelayanan()
    {
        $response = $this->get(route('pelayanan.create'));

        $response->assertOk()->assertViewIs('app.pelayanan.create');
    }

    /**
     * @test
     */
    public function it_stores_the_pelayanan()
    {
        $data = Pelayanan::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('pelayanan.store'), $data);

        $this->assertDatabaseHas('pelayanan', $data);

        $pelayanan = Pelayanan::latest('id')->first();

        $response->assertRedirect(route('pelayanan.edit', $pelayanan));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_pelayanan()
    {
        $pelayanan = Pelayanan::factory()->create();

        $response = $this->get(route('pelayanan.show', $pelayanan));

        $response
            ->assertOk()
            ->assertViewIs('app.pelayanan.show')
            ->assertViewHas('pelayanan');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_pelayanan()
    {
        $pelayanan = Pelayanan::factory()->create();

        $response = $this->get(route('pelayanan.edit', $pelayanan));

        $response
            ->assertOk()
            ->assertViewIs('app.pelayanan.edit')
            ->assertViewHas('pelayanan');
    }

    /**
     * @test
     */
    public function it_updates_the_pelayanan()
    {
        $pelayanan = Pelayanan::factory()->create();

        $pxRajal = PxRajal::factory()->create();

        $data = [
            'kecepatan' => $this->faker->text(255),
            'kemudahan' => $this->faker->text(255),
            'pelayanan_yang_perlu_dibenahi' => $this->faker->text,
            'px_rajal_id' => $pxRajal->id,
        ];

        $response = $this->put(route('pelayanan.update', $pelayanan), $data);

        $data['id'] = $pelayanan->id;

        $this->assertDatabaseHas('pelayanan', $data);

        $response->assertRedirect(route('pelayanan.edit', $pelayanan));
    }

    /**
     * @test
     */
    public function it_deletes_the_pelayanan()
    {
        $pelayanan = Pelayanan::factory()->create();

        $response = $this->delete(route('pelayanan.destroy', $pelayanan));

        $response->assertRedirect(route('pelayanan.index'));

        $this->assertModelMissing($pelayanan);
    }
}
