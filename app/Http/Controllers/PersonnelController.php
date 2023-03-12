<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonnelRequest;
use App\Http\Requests\UpdatePersonnelRequest;
use App\Repositories\PersonnelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PersonnelController extends AppBaseController
{
    /** @var PersonnelRepository $personnelRepository*/
    private $personnelRepository;

    public function __construct(PersonnelRepository $personnelRepo)
    {
        $this->personnelRepository = $personnelRepo;
    }

    /**
     * Display a listing of the Personnel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $personnels = $this->personnelRepository->paginate(10);

        return view('personnels.index')
            ->with('personnels', $personnels);
    }

    /**
     * Show the form for creating a new Personnel.
     *
     * @return Response
     */
    public function create()
    {
        return view('personnels.create');
    }

    /**
     * Store a newly created Personnel in storage.
     *
     * @param CreatePersonnelRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonnelRequest $request)
    {
        $input = $request->all();

        $personnel = $this->personnelRepository->create($input);

        Flash::success('Personnel saved successfully.');

        return redirect(route('personnels.index'));
    }

    /**
     * Display the specified Personnel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personnel = $this->personnelRepository->find($id);

        if (empty($personnel)) {
            Flash::error('Personnel not found');

            return redirect(route('personnels.index'));
        }

        return view('personnels.show')->with('personnel', $personnel);
    }

    /**
     * Show the form for editing the specified Personnel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personnel = $this->personnelRepository->find($id);

        if (empty($personnel)) {
            Flash::error('Personnel not found');

            return redirect(route('personnels.index'));
        }

        return view('personnels.edit')->with('personnel', $personnel);
    }

    /**
     * Update the specified Personnel in storage.
     *
     * @param int $id
     * @param UpdatePersonnelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonnelRequest $request)
    {
        $personnel = $this->personnelRepository->find($id);

        if (empty($personnel)) {
            Flash::error('Personnel not found');

            return redirect(route('personnels.index'));
        }

        $personnel = $this->personnelRepository->update($request->all(), $id);

        Flash::success('Personnel updated successfully.');

        return redirect(route('personnels.index'));
    }

    /**
     * Remove the specified Personnel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personnel = $this->personnelRepository->find($id);

        if (empty($personnel)) {
            Flash::error('Personnel not found');

            return redirect(route('personnels.index'));
        }

        $this->personnelRepository->delete($id);

        Flash::success('Personnel deleted successfully.');

        return redirect(route('personnels.index'));
    }
}
