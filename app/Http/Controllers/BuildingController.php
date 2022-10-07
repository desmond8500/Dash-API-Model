<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use App\Repositories\BuildingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BuildingController extends AppBaseController
{
    /** @var BuildingRepository $buildingRepository*/
    private $buildingRepository;

    public function __construct(BuildingRepository $buildingRepo)
    {
        $this->buildingRepository = $buildingRepo;
    }

    /**
     * Display a listing of the Building.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $buildings = $this->buildingRepository->paginate(10);

        return view('buildings.index')
            ->with('buildings', $buildings);
    }

    /**
     * Show the form for creating a new Building.
     *
     * @return Response
     */
    public function create()
    {
        return view('buildings.create');
    }

    /**
     * Store a newly created Building in storage.
     *
     * @param CreateBuildingRequest $request
     *
     * @return Response
     */
    public function store(CreateBuildingRequest $request)
    {
        $input = $request->all();

        $building = $this->buildingRepository->create($input);

        Flash::success('Building saved successfully.');

        return redirect(route('buildings.index'));
    }

    /**
     * Display the specified Building.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $building = $this->buildingRepository->find($id);

        if (empty($building)) {
            Flash::error('Building not found');

            return redirect(route('buildings.index'));
        }

        return view('buildings.show')->with('building', $building);
    }

    /**
     * Show the form for editing the specified Building.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $building = $this->buildingRepository->find($id);

        if (empty($building)) {
            Flash::error('Building not found');

            return redirect(route('buildings.index'));
        }

        return view('buildings.edit')->with('building', $building);
    }

    /**
     * Update the specified Building in storage.
     *
     * @param int $id
     * @param UpdateBuildingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBuildingRequest $request)
    {
        $building = $this->buildingRepository->find($id);

        if (empty($building)) {
            Flash::error('Building not found');

            return redirect(route('buildings.index'));
        }

        $building = $this->buildingRepository->update($request->all(), $id);

        Flash::success('Building updated successfully.');

        return redirect(route('buildings.index'));
    }

    /**
     * Remove the specified Building from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $building = $this->buildingRepository->find($id);

        if (empty($building)) {
            Flash::error('Building not found');

            return redirect(route('buildings.index'));
        }

        $this->buildingRepository->delete($id);

        Flash::success('Building deleted successfully.');

        return redirect(route('buildings.index'));
    }
}
