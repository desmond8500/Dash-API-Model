<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonneRequest;
use App\Http\Requests\UpdatePersonneRequest;
use App\Repositories\PersonneRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PersonneController extends AppBaseController
{
    /** @var PersonneRepository $personneRepository*/
    private $personneRepository;

    public function __construct(PersonneRepository $personneRepo)
    {
        $this->personneRepository = $personneRepo;
    }

    /**
     * Display a listing of the Personne.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $personnes = $this->personneRepository->paginate(10);

        return view('personnes.index')
            ->with('personnes', $personnes);
    }

    /**
     * Show the form for creating a new Personne.
     *
     * @return Response
     */
    public function create()
    {
        return view('personnes.create');
    }

    /**
     * Store a newly created Personne in storage.
     *
     * @param CreatePersonneRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonneRequest $request)
    {
        $input = $request->all();

        $personne = $this->personneRepository->create($input);

        Flash::success('Personne saved successfully.');

        return redirect(route('personnes.index'));
    }

    /**
     * Display the specified Personne.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            Flash::error('Personne not found');

            return redirect(route('personnes.index'));
        }

        return view('personnes.show')->with('personne', $personne);
    }

    /**
     * Show the form for editing the specified Personne.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            Flash::error('Personne not found');

            return redirect(route('personnes.index'));
        }

        return view('personnes.edit')->with('personne', $personne);
    }

    /**
     * Update the specified Personne in storage.
     *
     * @param int $id
     * @param UpdatePersonneRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonneRequest $request)
    {
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            Flash::error('Personne not found');

            return redirect(route('personnes.index'));
        }

        $personne = $this->personneRepository->update($request->all(), $id);

        Flash::success('Personne updated successfully.');

        return redirect(route('personnes.index'));
    }

    /**
     * Remove the specified Personne from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            Flash::error('Personne not found');

            return redirect(route('personnes.index'));
        }

        $this->personneRepository->delete($id);

        Flash::success('Personne deleted successfully.');

        return redirect(route('personnes.index'));
    }
}
