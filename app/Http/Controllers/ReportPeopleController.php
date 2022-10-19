<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportPeopleRequest;
use App\Http\Requests\UpdateReportPeopleRequest;
use App\Repositories\ReportPeopleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ReportPeopleController extends AppBaseController
{
    /** @var ReportPeopleRepository $reportPeopleRepository*/
    private $reportPeopleRepository;

    public function __construct(ReportPeopleRepository $reportPeopleRepo)
    {
        $this->reportPeopleRepository = $reportPeopleRepo;
    }

    /**
     * Display a listing of the ReportPeople.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $reportPeoples = $this->reportPeopleRepository->paginate(10);

        return view('report_peoples.index')
            ->with('reportPeoples', $reportPeoples);
    }

    /**
     * Show the form for creating a new ReportPeople.
     *
     * @return Response
     */
    public function create()
    {
        return view('report_peoples.create');
    }

    /**
     * Store a newly created ReportPeople in storage.
     *
     * @param CreateReportPeopleRequest $request
     *
     * @return Response
     */
    public function store(CreateReportPeopleRequest $request)
    {
        $input = $request->all();

        $reportPeople = $this->reportPeopleRepository->create($input);

        Flash::success('Report People saved successfully.');

        return redirect(route('reportPeoples.index'));
    }

    /**
     * Display the specified ReportPeople.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reportPeople = $this->reportPeopleRepository->find($id);

        if (empty($reportPeople)) {
            Flash::error('Report People not found');

            return redirect(route('reportPeoples.index'));
        }

        return view('report_peoples.show')->with('reportPeople', $reportPeople);
    }

    /**
     * Show the form for editing the specified ReportPeople.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reportPeople = $this->reportPeopleRepository->find($id);

        if (empty($reportPeople)) {
            Flash::error('Report People not found');

            return redirect(route('reportPeoples.index'));
        }

        return view('report_peoples.edit')->with('reportPeople', $reportPeople);
    }

    /**
     * Update the specified ReportPeople in storage.
     *
     * @param int $id
     * @param UpdateReportPeopleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportPeopleRequest $request)
    {
        $reportPeople = $this->reportPeopleRepository->find($id);

        if (empty($reportPeople)) {
            Flash::error('Report People not found');

            return redirect(route('reportPeoples.index'));
        }

        $reportPeople = $this->reportPeopleRepository->update($request->all(), $id);

        Flash::success('Report People updated successfully.');

        return redirect(route('reportPeoples.index'));
    }

    /**
     * Remove the specified ReportPeople from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reportPeople = $this->reportPeopleRepository->find($id);

        if (empty($reportPeople)) {
            Flash::error('Report People not found');

            return redirect(route('reportPeoples.index'));
        }

        $this->reportPeopleRepository->delete($id);

        Flash::success('Report People deleted successfully.');

        return redirect(route('reportPeoples.index'));
    }
}
