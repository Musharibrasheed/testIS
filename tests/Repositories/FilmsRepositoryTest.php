<?php namespace Tests\Repositories;

use App\Models\Films;
use App\Repositories\FilmsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FilmsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FilmsRepository
     */
    protected $filmsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->filmsRepo = \App::make(FilmsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_films()
    {
        $films = Films::factory()->make()->toArray();

        $createdFilms = $this->filmsRepo->create($films);

        $createdFilms = $createdFilms->toArray();
        $this->assertArrayHasKey('id', $createdFilms);
        $this->assertNotNull($createdFilms['id'], 'Created Films must have id specified');
        $this->assertNotNull(Films::find($createdFilms['id']), 'Films with given id must be in DB');
        $this->assertModelData($films, $createdFilms);
    }

    /**
     * @test read
     */
    public function test_read_films()
    {
        $films = Films::factory()->create();

        $dbFilms = $this->filmsRepo->find($films->id);

        $dbFilms = $dbFilms->toArray();
        $this->assertModelData($films->toArray(), $dbFilms);
    }

    /**
     * @test update
     */
    public function test_update_films()
    {
        $films = Films::factory()->create();
        $fakeFilms = Films::factory()->make()->toArray();

        $updatedFilms = $this->filmsRepo->update($fakeFilms, $films->id);

        $this->assertModelData($fakeFilms, $updatedFilms->toArray());
        $dbFilms = $this->filmsRepo->find($films->id);
        $this->assertModelData($fakeFilms, $dbFilms->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_films()
    {
        $films = Films::factory()->create();

        $resp = $this->filmsRepo->delete($films->id);

        $this->assertTrue($resp);
        $this->assertNull(Films::find($films->id), 'Films should not exist in DB');
    }
}
