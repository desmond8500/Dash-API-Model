<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAvancementSubRowRequest;
use App\Http\Requests\UpdateAvancementSubRowRequest;
use App\Repositories\AvancementSubRowRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AvancementSubRowController extends AppBaseController
{
    /** @var AvancementSubRowRepository $avancementSubRowRepository*/
    private $avancementSubRowRepository;

    public function __construct(AvancementSubRowRepository $avancementSubRowRepo)
    {
        $this->avancementSubRowRepository = $avancementSubRowRepo;
    }

    /**
     * Display a listing of the AvancementSubRow.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $avancementSubRows = $this->avancementSubRowRepository->paginate(10);

        return view('avancement_sub_rows.index')
            ->with('avancementSubRows', $avancementSubRows);
    }

    /**
     * Show the form for creating a new AvancementSubRow.
     *
     * @return Response
     */
    public function create()
    {
        return view('avancement_sub_rows.create');
    }

    /**
     * Store a newly created AvancementSubRow in storage.
     *
     * @param CreateAvancementSubRowRequest $request
     *
     * @return Response
     */
    public function store(CreateAvancementSubRowRequest $request)
    {
        $input = $request->all();

        $avancementSubRow = $this->avancementSubRowRepository->create($input);

        Flash::success('Avancement Sub Row saved successfully.');

        return redirect(route('avancementSubRows.index'));
    }

    /**
     * Display the specified AvancementSubRow.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $avancementSubRow = $this->avancementSubRowRepository->find($id);

        if (empty($avancementSubRow)) {
            Flash::error('Avancement Sub Row not found');

            return redirect(route('avancementSubRows.index'));
        }

        return view('avancement_sub_rows.show')->with('avancementSubRow', $avancementSubRow);
    }

    /**
     * Show the form for editing the specified AvancementSubRow.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $avancementSubRow = $this->avancementSubRowRepository->find($id);

        if (empty($avancementSubRow)) {
            Flash::error('Avancement Sub Row not found');

            return redirect(route('avancementSubRows.index'));
        }

        return view('avancement_sub_rows.edit')->with('avancementSubRow', $avancementSubRow);
    }

    /**
     * Update the specified AvancementSubRow in storage.
     *
     * @param int $id
     * @param UpdateAvancementSubRowRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAvancementSubRowRequest $request)
    {
        $avancementSubRow = $this->avancementSubRowRepository->find($id);

        if (empty($avancementSubRow)) {
            Flash::error('Avancement Sub Row not found');

            return redirect(route('avancementSubRows.index'));
        }

        $avancementSubRow = $this->avancementSubRowRepository->update($request->all(), $id);

        Flash::success('Avancement Sub Row updated successfully.');

        return redirect(route('avancementSubRows.index'));
    }

    /**
     * Remove the specified AvancementSubRow from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $avancementSubRow = $this->avancementSubRowRepository->find($id);

        if (empty($avancementSubRow)) {
            Flash::error('Avancement Sub Row not found');

            return redirect(route('avancementSubRows.index'));
        }

        $this->avancementSubRowRepository->delete($id);

        Flash::success('Avancement Sub Row deleted successfully.');

        return redirect(route('avancementSubRows.index'));
    }
}
