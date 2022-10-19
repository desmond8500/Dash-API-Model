<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportSectionRequest;
use App\Http\Requests\UpdateReportSectionRequest;
use App\Repositories\ReportSectionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ReportSectionController extends AppBaseController
{
    /** @var ReportSectionRepository $reportSectionRepository*/
    private $reportSectionRepository;

    public function __construct(ReportSectionRepository $reportSectionRepo)
    {
        $this->reportSectionRepository = $reportSectionRepo;
    }

    /**
     * Display a listing of the ReportSection.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $reportSections = $this->reportSectionRepository->paginate(10);

        return view('report_sections.index')
            ->with('reportSections', $reportSections);
    }

    /**
     * Show the form for creating a new ReportSection.
     *
     * @return Response
     */
    public function create()
    {
        return view('report_sections.create');
    }

    /**
     * Store a newly created ReportSection in storage.
     *
     * @param CreateReportSectionRequest $request
     *
     * @return Response
     */
    public function store(CreateReportSectionRequest $request)
    {
        $input = $request->all();

        $reportSection = $this->reportSectionRepository->create($input);

        Flash::success('Report Section saved successfully.');

        return redirect(route('reportSections.index'));
    }

    /**
     * Display the specified ReportSection.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reportSection = $this->reportSectionRepository->find($id);

        if (empty($reportSection)) {
            Flash::error('Report Section not found');

            return redirect(route('reportSections.index'));
        }

        return view('report_sections.show')->with('reportSection', $reportSection);
    }

    /**
     * Show the form for editing the specified ReportSection.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reportSection = $this->reportSectionRepository->find($id);

        if (empty($reportSection)) {
            Flash::error('Report Section not found');

            return redirect(route('reportSections.index'));
        }

        return view('report_sections.edit')->with('reportSection', $reportSection);
    }

    /**
     * Update the specified ReportSection in storage.
     *
     * @param int $id
     * @param UpdateReportSectionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportSectionRequest $request)
    {
        $reportSection = $this->reportSectionRepository->find($id);

        if (empty($reportSection)) {
            Flash::error('Report Section not found');

            return redirect(route('reportSections.index'));
        }

        $reportSection = $this->reportSectionRepository->update($request->all(), $id);

        Flash::success('Report Section updated successfully.');

        return redirect(route('reportSections.index'));
    }

    /**
     * Remove the specified ReportSection from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reportSection = $this->reportSectionRepository->find($id);

        if (empty($reportSection)) {
            Flash::error('Report Section not found');

            return redirect(route('reportSections.index'));
        }

        $this->reportSectionRepository->delete($id);

        Flash::success('Report Section deleted successfully.');

        return redirect(route('reportSections.index'));
    }
}
