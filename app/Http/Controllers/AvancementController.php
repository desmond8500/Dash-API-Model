<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAvancementRequest;
use App\Http\Requests\UpdateAvancementRequest;
use App\Repositories\AvancementRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AvancementController extends AppBaseController
{
    /** @var AvancementRepository $avancementRepository*/
    private $avancementRepository;

    public function __construct(AvancementRepository $avancementRepo)
    {
        $this->avancementRepository = $avancementRepo;
    }

    /**
     * Display a listing of the Avancement.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $avancements = $this->avancementRepository->paginate(10);

        return view('avancements.index')
            ->with('avancements', $avancements);
    }

    /**
     * Show the form for creating a new Avancement.
     *
     * @return Response
     */
    public function create()
    {
        return view('avancements.create');
    }

    /**
     * Store a newly created Avancement in storage.
     *
     * @param CreateAvancementRequest $request
     *
     * @return Response
     */
    public function store(CreateAvancementRequest $request)
    {
        $input = $request->all();

        $avancement = $this->avancementRepository->create($input);

        Flash::success('Avancement saved successfully.');

        return redirect(route('avancements.index'));
    }

    /**
     * Display the specified Avancement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $avancement = $this->avancementRepository->find($id);

        if (empty($avancement)) {
            Flash::error('Avancement not found');

            return redirect(route('avancements.index'));
        }

        return view('avancements.show')->with('avancement', $avancement);
    }

    /**
     * Show the form for editing the specified Avancement.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $avancement = $this->avancementRepository->find($id);

        if (empty($avancement)) {
            Flash::error('Avancement not found');

            return redirect(route('avancements.index'));
        }

        return view('avancements.edit')->with('avancement', $avancement);
    }

    /**
     * Update the specified Avancement in storage.
     *
     * @param int $id
     * @param UpdateAvancementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAvancementRequest $request)
    {
        $avancement = $this->avancementRepository->find($id);

        if (empty($avancement)) {
            Flash::error('Avancement not found');

            return redirect(route('avancements.index'));
        }

        $avancement = $this->avancementRepository->update($request->all(), $id);

        Flash::success('Avancement updated successfully.');

        return redirect(route('avancements.index'));
    }

    /**
     * Remove the specified Avancement from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $avancement = $this->avancementRepository->find($id);

        if (empty($avancement)) {
            Flash::error('Avancement not found');

            return redirect(route('avancements.index'));
        }

        $this->avancementRepository->delete($id);

        Flash::success('Avancement deleted successfully.');

        return redirect(route('avancements.index'));
    }
}
