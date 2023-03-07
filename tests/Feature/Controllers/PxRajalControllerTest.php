<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PxRajal;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PxRajalControllerTest extends TestCase
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
    public function it_displays_index_view_with_px_rajal()
    {
        $pxRajal = PxRajal::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('px-rajal.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.px_rajal.index')
            ->assertViewHas('pxRajal');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_px_rajal()
    {
        $response = $this->get(route('px-rajal.create'));

        $response->assertOk()->assertViewIs('app.px_rajal.create');
    }

    /**
     * @test
     */
    public function it_stores_the_px_rajal()
    {
        $data = PxRajal::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('px-rajal.store'), $data);

        $this->assertDatabaseHas('px_rajal', $data);

        $pxRajal = PxRajal::latest('id')->first();

        $response->assertRedirect(route('px-rajal.edit', $pxRajal));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_px_rajal()
    {
        $pxRajal = PxRajal::factory()->create();

        $response = $this->get(route('px-rajal.show', $pxRajal));

        $response
            ->assertOk()
            ->assertViewIs('app.px_rajal.show')
            ->assertViewHas('pxRajal');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_px_rajal()
    {
        $pxRajal = PxRajal::factory()->create();

        $response = $this->get(route('px-rajal.edit', $pxRajal));

        $response
            ->assertOk()
            ->assertViewIs('app.px_rajal.edit')
            ->assertViewHas('pxRajal');
    }

    /**
     * @test
     */
    public function it_updates_the_px_rajal()
    {
        $pxRajal = PxRajal::factory()->create();

        $data = [
            'no_upf' => $this->faker->randomNumber(0),
            'no_rm' => $this->faker->randomNumber(0),
            'nama_pasien' => $this->faker->text(255),
            'klinik' => $this->faker->text(255),
            'penjamin' => $this->faker->text(255),
            'no_hp' => $this->faker->text(255),
            'tgl_daftar' => $this->faker->dateTime,
            'kategori_pasien' => $this->faker->text(255),
        ];

        $response = $this->put(route('px-rajal.update', $pxRajal), $data);

        $data['id'] = $pxRajal->id;

        $this->assertDatabaseHas('px_rajal', $data);

        $response->assertRedirect(route('px-rajal.edit', $pxRajal));
    }

    /**
     * @test
     */
    public function it_deletes_the_px_rajal()
    {
        $pxRajal = PxRajal::factory()->create();

        $response = $this->delete(route('px-rajal.destroy', $pxRajal));

        $response->assertRedirect(route('px-rajal.index'));

        $this->assertModelMissing($pxRajal);
    }
}
