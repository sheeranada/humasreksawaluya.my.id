<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\RuangTunggu;

use App\Models\PxRajal;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RuangTungguControllerTest extends TestCase
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
    public function it_displays_index_view_with_ruang_tunggu()
    {
        $ruangTunggu = RuangTunggu::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('ruang-tunggu.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.ruang_tunggu.index')
            ->assertViewHas('ruangTunggu');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_ruang_tunggu()
    {
        $response = $this->get(route('ruang-tunggu.create'));

        $response->assertOk()->assertViewIs('app.ruang_tunggu.create');
    }

    /**
     * @test
     */
    public function it_stores_the_ruang_tunggu()
    {
        $data = RuangTunggu::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('ruang-tunggu.store'), $data);

        $this->assertDatabaseHas('ruang_tunggu', $data);

        $ruangTunggu = RuangTunggu::latest('id')->first();

        $response->assertRedirect(route('ruang-tunggu.edit', $ruangTunggu));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_ruang_tunggu()
    {
        $ruangTunggu = RuangTunggu::factory()->create();

        $response = $this->get(route('ruang-tunggu.show', $ruangTunggu));

        $response
            ->assertOk()
            ->assertViewIs('app.ruang_tunggu.show')
            ->assertViewHas('ruangTunggu');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_ruang_tunggu()
    {
        $ruangTunggu = RuangTunggu::factory()->create();

        $response = $this->get(route('ruang-tunggu.edit', $ruangTunggu));

        $response
            ->assertOk()
            ->assertViewIs('app.ruang_tunggu.edit')
            ->assertViewHas('ruangTunggu');
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

        $response = $this->put(
            route('ruang-tunggu.update', $ruangTunggu),
            $data
        );

        $data['id'] = $ruangTunggu->id;

        $this->assertDatabaseHas('ruang_tunggu', $data);

        $response->assertRedirect(route('ruang-tunggu.edit', $ruangTunggu));
    }

    /**
     * @test
     */
    public function it_deletes_the_ruang_tunggu()
    {
        $ruangTunggu = RuangTunggu::factory()->create();

        $response = $this->delete(route('ruang-tunggu.destroy', $ruangTunggu));

        $response->assertRedirect(route('ruang-tunggu.index'));

        $this->assertModelMissing($ruangTunggu);
    }
}
