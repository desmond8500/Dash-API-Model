<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportDevisRequest;
use App\Http\Requests\UpdateReportDevisRequest;
use App\Repositories\ReportDevisRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ReportDevisController extends AppBaseController
{
    /** @var ReportDevisRepository $reportDevisRepository*/
    private $reportDevisRepository;

    public function __construct(ReportDevisRepository $reportDevisRepo)
    {
        $this->reportDevisRepository = $reportDevisRepo;
    }

    /**
     * Display a listing of the ReportDevis.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $reportDevis = $this->reportDevisRepository->paginate(10);

        return view('report_devis.index')
            ->with('reportDevis', $reportDevis);
    }

    /**
     * Show the form for creating a new ReportDevis.
     *
     * @return Response
     */
    public function create()
    {
        return view('report_devis.create');
    }

    /**
     * Store a newly created ReportDevis in storage.
     *
     * @param CreateReportDevisRequest $request
     *
     * @return Response
     */
    public function store(CreateReportDevisRequest $request)
    {
        $input = $request->all();

        $reportDevis = $this->reportDevisRepository->create($input);

        Flash::success('Report Devis saved successfully.');

        return redirect(route('reportDevis.index'));
    }

    /**
     * Display the specified ReportDevis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reportDevis = $this->reportDevisRepository->find($id);

        if (empty($reportDevis)) {
            Flash::error('Report Devis not found');

            return redirect(route('reportDevis.index'));
        }

        return view('report_devis.show')->with('reportDevis', $reportDevis);
    }

    /**
     * Show the form for editing the specified ReportDevis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reportDevis = $this->reportDevisRepository->find($id);

        if (empty($reportDevis)) {
            Flash::error('Report Devis not found');

            return redirect(route('reportDevis.index'));
        }

        return view('report_devis.edit')->with('reportDevis', $reportDevis);
    }

    /**
     * Update the specified ReportDevis in storage.
     *
     * @param int $id
     * @param UpdateReportDevisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportDevisRequest $request)
    {
        $reportDevis = $this->reportDevisRepository->find($id);

        if (empty($reportDevis)) {
            Flash::error('Report Devis not found');

            return redirect(route('reportDevis.index'));
        }

        $reportDevis = $this->reportDevisRepository->update($request->all(), $id);

        Flash::success('Report Devis updated successfully.');

        return redirect(route('reportDevis.index'));
    }

    /**
     * Remove the specified ReportDevis from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reportDevis = $this->reportDevisRepository->find($id);

        if (empty($reportDevis)) {
            Flash::error('Report Devis not found');

            return redirect(route('reportDevis.index'));
        }

        $this->reportDevisRepository->delete($id);

        Flash::success('Report Devis deleted successfully.');

        return redirect(route('reportDevis.index'));
    }
}
