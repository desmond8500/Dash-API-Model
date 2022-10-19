<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportModaliteRequest;
use App\Http\Requests\UpdateReportModaliteRequest;
use App\Repositories\ReportModaliteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ReportModaliteController extends AppBaseController
{
    /** @var ReportModaliteRepository $reportModaliteRepository*/
    private $reportModaliteRepository;

    public function __construct(ReportModaliteRepository $reportModaliteRepo)
    {
        $this->reportModaliteRepository = $reportModaliteRepo;
    }

    /**
     * Display a listing of the ReportModalite.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $reportModalites = $this->reportModaliteRepository->paginate(10);

        return view('report_modalites.index')
            ->with('reportModalites', $reportModalites);
    }

    /**
     * Show the form for creating a new ReportModalite.
     *
     * @return Response
     */
    public function create()
    {
        return view('report_modalites.create');
    }

    /**
     * Store a newly created ReportModalite in storage.
     *
     * @param CreateReportModaliteRequest $request
     *
     * @return Response
     */
    public function store(CreateReportModaliteRequest $request)
    {
        $input = $request->all();

        $reportModalite = $this->reportModaliteRepository->create($input);

        Flash::success('Report Modalite saved successfully.');

        return redirect(route('reportModalites.index'));
    }

    /**
     * Display the specified ReportModalite.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reportModalite = $this->reportModaliteRepository->find($id);

        if (empty($reportModalite)) {
            Flash::error('Report Modalite not found');

            return redirect(route('reportModalites.index'));
        }

        return view('report_modalites.show')->with('reportModalite', $reportModalite);
    }

    /**
     * Show the form for editing the specified ReportModalite.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reportModalite = $this->reportModaliteRepository->find($id);

        if (empty($reportModalite)) {
            Flash::error('Report Modalite not found');

            return redirect(route('reportModalites.index'));
        }

        return view('report_modalites.edit')->with('reportModalite', $reportModalite);
    }

    /**
     * Update the specified ReportModalite in storage.
     *
     * @param int $id
     * @param UpdateReportModaliteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportModaliteRequest $request)
    {
        $reportModalite = $this->reportModaliteRepository->find($id);

        if (empty($reportModalite)) {
            Flash::error('Report Modalite not found');

            return redirect(route('reportModalites.index'));
        }

        $reportModalite = $this->reportModaliteRepository->update($request->all(), $id);

        Flash::success('Report Modalite updated successfully.');

        return redirect(route('reportModalites.index'));
    }

    /**
     * Remove the specified ReportModalite from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reportModalite = $this->reportModaliteRepository->find($id);

        if (empty($reportModalite)) {
            Flash::error('Report Modalite not found');

            return redirect(route('reportModalites.index'));
        }

        $this->reportModaliteRepository->delete($id);

        Flash::success('Report Modalite deleted successfully.');

        return redirect(route('reportModalites.index'));
    }
}
