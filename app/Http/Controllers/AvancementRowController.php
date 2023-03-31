<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAvancementRowRequest;
use App\Http\Requests\UpdateAvancementRowRequest;
use App\Repositories\AvancementRowRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AvancementRowController extends AppBaseController
{
    /** @var AvancementRowRepository $avancementRowRepository*/
    private $avancementRowRepository;

    public function __construct(AvancementRowRepository $avancementRowRepo)
    {
        $this->avancementRowRepository = $avancementRowRepo;
    }

    /**
     * Display a listing of the AvancementRow.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $avancementRows = $this->avancementRowRepository->paginate(10);

        return view('avancement_rows.index')
            ->with('avancementRows', $avancementRows);
    }

    /**
     * Show the form for creating a new AvancementRow.
     *
     * @return Response
     */
    public function create()
    {
        return view('avancement_rows.create');
    }

    /**
     * Store a newly created AvancementRow in storage.
     *
     * @param CreateAvancementRowRequest $request
     *
     * @return Response
     */
    public function store(CreateAvancementRowRequest $request)
    {
        $input = $request->all();

        $avancementRow = $this->avancementRowRepository->create($input);

        Flash::success('Avancement Row saved successfully.');

        return redirect(route('avancementRows.index'));
    }

    /**
     * Display the specified AvancementRow.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $avancementRow = $this->avancementRowRepository->find($id);

        if (empty($avancementRow)) {
            Flash::error('Avancement Row not found');

            return redirect(route('avancementRows.index'));
        }

        return view('avancement_rows.show')->with('avancementRow', $avancementRow);
    }

    /**
     * Show the form for editing the specified AvancementRow.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $avancementRow = $this->avancementRowRepository->find($id);

        if (empty($avancementRow)) {
            Flash::error('Avancement Row not found');

            return redirect(route('avancementRows.index'));
        }

        return view('avancement_rows.edit')->with('avancementRow', $avancementRow);
    }

    /**
     * Update the specified AvancementRow in storage.
     *
     * @param int $id
     * @param UpdateAvancementRowRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAvancementRowRequest $request)
    {
        $avancementRow = $this->avancementRowRepository->find($id);

        if (empty($avancementRow)) {
            Flash::error('Avancement Row not found');

            return redirect(route('avancementRows.index'));
        }

        $avancementRow = $this->avancementRowRepository->update($request->all(), $id);

        Flash::success('Avancement Row updated successfully.');

        return redirect(route('avancementRows.index'));
    }

    /**
     * Remove the specified AvancementRow from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $avancementRow = $this->avancementRowRepository->find($id);

        if (empty($avancementRow)) {
            Flash::error('Avancement Row not found');

            return redirect(route('avancementRows.index'));
        }

        $this->avancementRowRepository->delete($id);

        Flash::success('Avancement Row deleted successfully.');

        return redirect(route('avancementRows.index'));
    }
}
