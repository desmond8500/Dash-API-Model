<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLangueRequest;
use App\Http\Requests\UpdateLangueRequest;
use App\Repositories\LangueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class LangueController extends AppBaseController
{
    /** @var LangueRepository $langueRepository*/
    private $langueRepository;

    public function __construct(LangueRepository $langueRepo)
    {
        $this->langueRepository = $langueRepo;
    }

    /**
     * Display a listing of the Langue.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $langues = $this->langueRepository->paginate(10);

        return view('langues.index')
            ->with('langues', $langues);
    }

    /**
     * Show the form for creating a new Langue.
     *
     * @return Response
     */
    public function create()
    {
        return view('langues.create');
    }

    /**
     * Store a newly created Langue in storage.
     *
     * @param CreateLangueRequest $request
     *
     * @return Response
     */
    public function store(CreateLangueRequest $request)
    {
        $input = $request->all();

        $langue = $this->langueRepository->create($input);

        Flash::success('Langue saved successfully.');

        return redirect(route('langues.index'));
    }

    /**
     * Display the specified Langue.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $langue = $this->langueRepository->find($id);

        if (empty($langue)) {
            Flash::error('Langue not found');

            return redirect(route('langues.index'));
        }

        return view('langues.show')->with('langue', $langue);
    }

    /**
     * Show the form for editing the specified Langue.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $langue = $this->langueRepository->find($id);

        if (empty($langue)) {
            Flash::error('Langue not found');

            return redirect(route('langues.index'));
        }

        return view('langues.edit')->with('langue', $langue);
    }

    /**
     * Update the specified Langue in storage.
     *
     * @param int $id
     * @param UpdateLangueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLangueRequest $request)
    {
        $langue = $this->langueRepository->find($id);

        if (empty($langue)) {
            Flash::error('Langue not found');

            return redirect(route('langues.index'));
        }

        $langue = $this->langueRepository->update($request->all(), $id);

        Flash::success('Langue updated successfully.');

        return redirect(route('langues.index'));
    }

    /**
     * Remove the specified Langue from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $langue = $this->langueRepository->find($id);

        if (empty($langue)) {
            Flash::error('Langue not found');

            return redirect(route('langues.index'));
        }

        $this->langueRepository->delete($id);

        Flash::success('Langue deleted successfully.');

        return redirect(route('langues.index'));
    }
}
