<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Administrasi;

use App\Models\PxRajal;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdministrasiControllerTest extends TestCase
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
    public function it_displays_index_view_with_administrasi()
    {
        $administrasi = Administrasi::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('administrasi.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.administrasi.index')
            ->assertViewHas('administrasi');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_administrasi()
    {
        $response = $this->get(route('administrasi.create'));

        $response->assertOk()->assertViewIs('app.administrasi.create');
    }

    /**
     * @test
     */
    public function it_stores_the_administrasi()
    {
        $data = Administrasi::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('administrasi.store'), $data);

        $this->assertDatabaseHas('administrasi', $data);

        $administrasi = Administrasi::latest('id')->first();

        $response->assertRedirect(route('administrasi.edit', $administrasi));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_administrasi()
    {
        $administrasi = Administrasi::factory()->create();

        $response = $this->get(route('administrasi.show', $administrasi));

        $response
            ->assertOk()
            ->assertViewIs('app.administrasi.show')
            ->assertViewHas('administrasi');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_administrasi()
    {
        $administrasi = Administrasi::factory()->create();

        $response = $this->get(route('administrasi.edit', $administrasi));

        $response
            ->assertOk()
            ->assertViewIs('app.administrasi.edit')
            ->assertViewHas('administrasi');
    }

    /**
     * @test
     */
    public function it_updates_the_administrasi()
    {
        $administrasi = Administrasi::factory()->create();

        $pxRajal = PxRajal::factory()->create();

        $data = [
            'pendaftaran' => $this->faker->text(255),
            'kasir' => $this->faker->text(255),
            'px_rajal_id' => $pxRajal->id,
        ];

        $response = $this->put(
            route('administrasi.update', $administrasi),
            $data
        );

        $data['id'] = $administrasi->id;

        $this->assertDatabaseHas('administrasi', $data);

        $response->assertRedirect(route('administrasi.edit', $administrasi));
    }

    /**
     * @test
     */
    public function it_deletes_the_administrasi()
    {
        $administrasi = Administrasi::factory()->create();

        $response = $this->delete(route('administrasi.destroy', $administrasi));

        $response->assertRedirect(route('administrasi.index'));

        $this->assertModelMissing($administrasi);
    }
}
