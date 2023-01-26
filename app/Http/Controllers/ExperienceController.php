<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use App\Repositories\ExperienceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ExperienceController extends AppBaseController
{
    /** @var ExperienceRepository $experienceRepository*/
    private $experienceRepository;

    public function __construct(ExperienceRepository $experienceRepo)
    {
        $this->experienceRepository = $experienceRepo;
    }

    /**
     * Display a listing of the Experience.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $experiences = $this->experienceRepository->paginate(10);

        return view('experiences.index')
            ->with('experiences', $experiences);
    }

    /**
     * Show the form for creating a new Experience.
     *
     * @return Response
     */
    public function create()
    {
        return view('experiences.create');
    }

    /**
     * Store a newly created Experience in storage.
     *
     * @param CreateExperienceRequest $request
     *
     * @return Response
     */
    public function store(CreateExperienceRequest $request)
    {
        $input = $request->all();

        $experience = $this->experienceRepository->create($input);

        Flash::success('Experience saved successfully.');

        return redirect(route('experiences.index'));
    }

    /**
     * Display the specified Experience.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $experience = $this->experienceRepository->find($id);

        if (empty($experience)) {
            Flash::error('Experience not found');

            return redirect(route('experiences.index'));
        }

        return view('experiences.show')->with('experience', $experience);
    }

    /**
     * Show the form for editing the specified Experience.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $experience = $this->experienceRepository->find($id);

        if (empty($experience)) {
            Flash::error('Experience not found');

            return redirect(route('experiences.index'));
        }

        return view('experiences.edit')->with('experience', $experience);
    }

    /**
     * Update the specified Experience in storage.
     *
     * @param int $id
     * @param UpdateExperienceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExperienceRequest $request)
    {
        $experience = $this->experienceRepository->find($id);

        if (empty($experience)) {
            Flash::error('Experience not found');

            return redirect(route('experiences.index'));
        }

        $experience = $this->experienceRepository->update($request->all(), $id);

        Flash::success('Experience updated successfully.');

        return redirect(route('experiences.index'));
    }

    /**
     * Remove the specified Experience from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $experience = $this->experienceRepository->find($id);

        if (empty($experience)) {
            Flash::error('Experience not found');

            return redirect(route('experiences.index'));
        }

        $this->experienceRepository->delete($id);

        Flash::success('Experience deleted successfully.');

        return redirect(route('experiences.index'));
    }
}
