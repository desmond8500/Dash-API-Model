<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTacheRequest;
use App\Http\Requests\UpdateTacheRequest;
use App\Repositories\TacheRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TacheController extends AppBaseController
{
    /** @var TacheRepository $tacheRepository*/
    private $tacheRepository;

    public function __construct(TacheRepository $tacheRepo)
    {
        $this->tacheRepository = $tacheRepo;
    }

    /**
     * Display a listing of the Tache.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $taches = $this->tacheRepository->paginate(10);

        return view('taches.index')
            ->with('taches', $taches);
    }

    /**
     * Show the form for creating a new Tache.
     *
     * @return Response
     */
    public function create()
    {
        return view('taches.create');
    }

    /**
     * Store a newly created Tache in storage.
     *
     * @param CreateTacheRequest $request
     *
     * @return Response
     */
    public function store(CreateTacheRequest $request)
    {
        $input = $request->all();

        $tache = $this->tacheRepository->create($input);

        Flash::success('Tache saved successfully.');

        return redirect(route('taches.index'));
    }

    /**
     * Display the specified Tache.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tache = $this->tacheRepository->find($id);

        if (empty($tache)) {
            Flash::error('Tache not found');

            return redirect(route('taches.index'));
        }

        return view('taches.show')->with('tache', $tache);
    }

    /**
     * Show the form for editing the specified Tache.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tache = $this->tacheRepository->find($id);

        if (empty($tache)) {
            Flash::error('Tache not found');

            return redirect(route('taches.index'));
        }

        return view('taches.edit')->with('tache', $tache);
    }

    /**
     * Update the specified Tache in storage.
     *
     * @param int $id
     * @param UpdateTacheRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTacheRequest $request)
    {
        $tache = $this->tacheRepository->find($id);

        if (empty($tache)) {
            Flash::error('Tache not found');

            return redirect(route('taches.index'));
        }

        $tache = $this->tacheRepository->update($request->all(), $id);

        Flash::success('Tache updated successfully.');

        return redirect(route('taches.index'));
    }

    /**
     * Remove the specified Tache from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tache = $this->tacheRepository->find($id);

        if (empty($tache)) {
            Flash::error('Tache not found');

            return redirect(route('taches.index'));
        }

        $this->tacheRepository->delete($id);

        Flash::success('Tache deleted successfully.');

        return redirect(route('taches.index'));
    }
}
