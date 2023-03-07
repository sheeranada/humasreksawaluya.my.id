<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Farmasi;

use App\Models\PxRajal;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FarmasiControllerTest extends TestCase
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
    public function it_displays_index_view_with_farmasi()
    {
        $farmasi = Farmasi::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('farmasi.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.farmasi.index')
            ->assertViewHas('farmasi');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_farmasi()
    {
        $response = $this->get(route('farmasi.create'));

        $response->assertOk()->assertViewIs('app.farmasi.create');
    }

    /**
     * @test
     */
    public function it_stores_the_farmasi()
    {
        $data = Farmasi::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('farmasi.store'), $data);

        $this->assertDatabaseHas('farmasi', $data);

        $farmasi = Farmasi::latest('id')->first();

        $response->assertRedirect(route('farmasi.edit', $farmasi));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_farmasi()
    {
        $farmasi = Farmasi::factory()->create();

        $response = $this->get(route('farmasi.show', $farmasi));

        $response
            ->assertOk()
            ->assertViewIs('app.farmasi.show')
            ->assertViewHas('farmasi');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_farmasi()
    {
        $farmasi = Farmasi::factory()->create();

        $response = $this->get(route('farmasi.edit', $farmasi));

        $response
            ->assertOk()
            ->assertViewIs('app.farmasi.edit')
            ->assertViewHas('farmasi');
    }

    /**
     * @test
     */
    public function it_updates_the_farmasi()
    {
        $farmasi = Farmasi::factory()->create();

        $pxRajal = PxRajal::factory()->create();

        $data = [
            'kecepatan' => $this->faker->text(255),
            'sikap_petugas' => $this->faker->text(255),
            'penjelasan_obat' => $this->faker->text(255),
            'pelayanan_farmasi' => $this->faker->text(255),
            'px_rajal_id' => $pxRajal->id,
        ];

        $response = $this->put(route('farmasi.update', $farmasi), $data);

        $data['id'] = $farmasi->id;

        $this->assertDatabaseHas('farmasi', $data);

        $response->assertRedirect(route('farmasi.edit', $farmasi));
    }

    /**
     * @test
     */
    public function it_deletes_the_farmasi()
    {
        $farmasi = Farmasi::factory()->create();

        $response = $this->delete(route('farmasi.destroy', $farmasi));

        $response->assertRedirect(route('farmasi.index'));

        $this->assertModelMissing($farmasi);
    }
}
