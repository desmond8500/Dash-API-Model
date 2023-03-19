<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlanningRequest;
use App\Http\Requests\UpdatePlanningRequest;
use App\Repositories\PlanningRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PlanningController extends AppBaseController
{
    /** @var PlanningRepository $planningRepository*/
    private $planningRepository;

    public function __construct(PlanningRepository $planningRepo)
    {
        $this->planningRepository = $planningRepo;
    }

    /**
     * Display a listing of the Planning.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $plannings = $this->planningRepository->paginate(10);

        return view('plannings.index')
            ->with('plannings', $plannings);
    }

    /**
     * Show the form for creating a new Planning.
     *
     * @return Response
     */
    public function create()
    {
        return view('plannings.create');
    }

    /**
     * Store a newly created Planning in storage.
     *
     * @param CreatePlanningRequest $request
     *
     * @return Response
     */
    public function store(CreatePlanningRequest $request)
    {
        $input = $request->all();

        $planning = $this->planningRepository->create($input);

        Flash::success('Planning saved successfully.');

        return redirect(route('plannings.index'));
    }

    /**
     * Display the specified Planning.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $planning = $this->planningRepository->find($id);

        if (empty($planning)) {
            Flash::error('Planning not found');

            return redirect(route('plannings.index'));
        }

        return view('plannings.show')->with('planning', $planning);
    }

    /**
     * Show the form for editing the specified Planning.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $planning = $this->planningRepository->find($id);

        if (empty($planning)) {
            Flash::error('Planning not found');

            return redirect(route('plannings.index'));
        }

        return view('plannings.edit')->with('planning', $planning);
    }

    /**
     * Update the specified Planning in storage.
     *
     * @param int $id
     * @param UpdatePlanningRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlanningRequest $request)
    {
        $planning = $this->planningRepository->find($id);

        if (empty($planning)) {
            Flash::error('Planning not found');

            return redirect(route('plannings.index'));
        }

        $planning = $this->planningRepository->update($request->all(), $id);

        Flash::success('Planning updated successfully.');

        return redirect(route('plannings.index'));
    }

    /**
     * Remove the specified Planning from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $planning = $this->planningRepository->find($id);

        if (empty($planning)) {
            Flash::error('Planning not found');

            return redirect(route('plannings.index'));
        }

        $this->planningRepository->delete($id);

        Flash::success('Planning deleted successfully.');

        return redirect(route('plannings.index'));
    }
}
