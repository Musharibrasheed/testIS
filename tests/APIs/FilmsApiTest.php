<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Films;

class FilmsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_films()
    {
        $films = Films::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/films', $films
        );

        $this->assertApiResponse($films);
    }

    /**
     * @test
     */
    public function test_read_films()
    {
        $films = Films::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/films/'.$films->id
        );

        $this->assertApiResponse($films->toArray());
    }

    /**
     * @test
     */
    public function test_update_films()
    {
        $films = Films::factory()->create();
        $editedFilms = Films::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/films/'.$films->id,
            $editedFilms
        );

        $this->assertApiResponse($editedFilms);
    }

    /**
     * @test
     */
    public function test_delete_films()
    {
        $films = Films::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/films/'.$films->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/films/'.$films->id
        );

        $this->response->assertStatus(404);
    }
}
