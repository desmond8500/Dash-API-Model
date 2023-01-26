<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInteretRequest;
use App\Http\Requests\UpdateInteretRequest;
use App\Repositories\InteretRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class InteretController extends AppBaseController
{
    /** @var InteretRepository $interetRepository*/
    private $interetRepository;

    public function __construct(InteretRepository $interetRepo)
    {
        $this->interetRepository = $interetRepo;
    }

    /**
     * Display a listing of the Interet.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $interets = $this->interetRepository->paginate(10);

        return view('interets.index')
            ->with('interets', $interets);
    }

    /**
     * Show the form for creating a new Interet.
     *
     * @return Response
     */
    public function create()
    {
        return view('interets.create');
    }

    /**
     * Store a newly created Interet in storage.
     *
     * @param CreateInteretRequest $request
     *
     * @return Response
     */
    public function store(CreateInteretRequest $request)
    {
        $input = $request->all();

        $interet = $this->interetRepository->create($input);

        Flash::success('Interet saved successfully.');

        return redirect(route('interets.index'));
    }

    /**
     * Display the specified Interet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $interet = $this->interetRepository->find($id);

        if (empty($interet)) {
            Flash::error('Interet not found');

            return redirect(route('interets.index'));
        }

        return view('interets.show')->with('interet', $interet);
    }

    /**
     * Show the form for editing the specified Interet.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $interet = $this->interetRepository->find($id);

        if (empty($interet)) {
            Flash::error('Interet not found');

            return redirect(route('interets.index'));
        }

        return view('interets.edit')->with('interet', $interet);
    }

    /**
     * Update the specified Interet in storage.
     *
     * @param int $id
     * @param UpdateInteretRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInteretRequest $request)
    {
        $interet = $this->interetRepository->find($id);

        if (empty($interet)) {
            Flash::error('Interet not found');

            return redirect(route('interets.index'));
        }

        $interet = $this->interetRepository->update($request->all(), $id);

        Flash::success('Interet updated successfully.');

        return redirect(route('interets.index'));
    }

    /**
     * Remove the specified Interet from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $interet = $this->interetRepository->find($id);

        if (empty($interet)) {
            Flash::error('Interet not found');

            return redirect(route('interets.index'));
        }

        $this->interetRepository->delete($id);

        Flash::success('Interet deleted successfully.');

        return redirect(route('interets.index'));
    }
}
