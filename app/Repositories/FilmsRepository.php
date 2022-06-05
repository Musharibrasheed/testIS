<?php

namespace App\Repositories;

use App\Models\Films;
use App\Repositories\BaseRepository;
use Str;
/**
 * Class FilmsRepository
 * @package App\Repositories
 * @version June 1, 2022, 8:37 pm UTC
*/

class FilmsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'release_date',
        'ticket_price',
        'rating',
        'country',
        'genre',
        'photo'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Films::class;
    }

    public function getFromandTo($to,$from)
    {
        
        $from = $from;
        $to = $to;
        return $this->model()::whereBetween('release_date', [$from, $to])->get();
    }

    public function createSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = Str::slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 100; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return $this->model()::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }

    public function getFilmbySlug($slug)
    {
        return $this->model()::where('slug', 'like', $slug.'%')
            // ->where('id', '<>', $id)
            ->first();
    }
}
