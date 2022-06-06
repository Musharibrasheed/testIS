<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFilmsRequest;
use App\Http\Requests\UpdateFilmsRequest;
use App\Repositories\FilmsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FilmsController extends AppBaseController
{
    /** @var FilmsRepository $filmsRepository*/
    private $filmsRepository;

    public function __construct(FilmsRepository $filmsRepo)
    {
        $this->filmsRepository = $filmsRepo;
    }

    /**
     * Display a listing of the Films.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $films = $this->filmsRepository->paginate(11);

        return view('films.index')
            ->with('filmss', $films);
    }

    /**
     * Show the form for creating a new Films.
     *
     * @return Response
     */
    public function create()
    {
        return view('films.create');
    }

    /**
     * Store a newly created Films in storage.
     *
     * @param CreateFilmsRequest $request
     *
     * @return Response
     */
    public function store(CreateFilmsRequest $request)
    {
        $input = $request->all();

        $films = $this->filmsRepository->create($input);

        $films['slug'] = $this->filmsRepository->createSlug($input['name'], $films['id']);
     
        $films = $this->filmsRepository->update($films->toArray(), $films['id']);

        Flash::success('Films saved successfully.');

        return redirect(route('films.index'));
    }

    /**
     * Display the specified Films.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $films = $this->filmsRepository->find($id);

        if (empty($films)) {
            Flash::error('Films not found');

            return redirect(route('films.index'));
        }

        return view('films.show')->with('films', $films);
    }

    public function getFilm($slug)
    {
        /** @var Films $films */
        $films = $this->filmsRepository->getFilmbySlug($slug);

        if (empty($films)) {
            return $this->sendError('Films not found');
        }

        return view('films.show')->with('films', $films);
    }

    /**
     * Show the form for editing the specified Films.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $films = $this->filmsRepository->find($id);

        if (empty($films)) {
            Flash::error('Films not found');

            return redirect(route('films.index'));
        }

        return view('films.edit')->with('films', $films);
    }

    /**
     * Update the specified Films in storage.
     *
     * @param int $id
     * @param UpdateFilmsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFilmsRequest $request)
    {
        $films = $this->filmsRepository->find($id);

        if (empty($films)) {
            Flash::error('Films not found');

            return redirect(route('films.index'));
        }

        $films = $this->filmsRepository->update($request->all(), $id);

        Flash::success('Films updated successfully.');

        return redirect(route('films.index'));
    }

    /**
     * Remove the specified Films from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $films = $this->filmsRepository->find($id);

        if (empty($films)) {
            Flash::error('Films not found');

            return redirect(route('films.index'));
        }

        $this->filmsRepository->delete($id);

        Flash::success('Films deleted successfully.');

        return redirect(route('films.index'));
    }
}
