<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateManualRequest;
use App\Http\Requests\UpdateManualRequest;
use App\Repositories\ManualRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ManualController extends AppBaseController
{
    /** @var ManualRepository $manualRepository*/
    private $manualRepository;

    public function __construct(ManualRepository $manualRepo)
    {
        $this->manualRepository = $manualRepo;
    }

    /**
     * Display a listing of the Manual.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $manuals = $this->manualRepository->paginate(10);

        return view('manuals.index')
            ->with('manuals', $manuals);
    }

    /**
     * Show the form for creating a new Manual.
     *
     * @return Response
     */
    public function create()
    {
        return view('manuals.create');
    }

    /**
     * Store a newly created Manual in storage.
     *
     * @param CreateManualRequest $request
     *
     * @return Response
     */
    public function store(CreateManualRequest $request)
    {
        $input = $request->all();

        $manual = $this->manualRepository->create($input);

        Flash::success('Manual saved successfully.');

        return redirect(route('manuals.index'));
    }

    /**
     * Display the specified Manual.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $manual = $this->manualRepository->find($id);

        if (empty($manual)) {
            Flash::error('Manual not found');

            return redirect(route('manuals.index'));
        }

        return view('manuals.show')->with('manual', $manual);
    }

    /**
     * Show the form for editing the specified Manual.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $manual = $this->manualRepository->find($id);

        if (empty($manual)) {
            Flash::error('Manual not found');

            return redirect(route('manuals.index'));
        }

        return view('manuals.edit')->with('manual', $manual);
    }

    /**
     * Update the specified Manual in storage.
     *
     * @param int $id
     * @param UpdateManualRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateManualRequest $request)
    {
        $manual = $this->manualRepository->find($id);

        if (empty($manual)) {
            Flash::error('Manual not found');

            return redirect(route('manuals.index'));
        }

        $manual = $this->manualRepository->update($request->all(), $id);

        Flash::success('Manual updated successfully.');

        return redirect(route('manuals.index'));
    }

    /**
     * Remove the specified Manual from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $manual = $this->manualRepository->find($id);

        if (empty($manual)) {
            Flash::error('Manual not found');

            return redirect(route('manuals.index'));
        }

        $this->manualRepository->delete($id);

        Flash::success('Manual deleted successfully.');

        return redirect(route('manuals.index'));
    }
}
