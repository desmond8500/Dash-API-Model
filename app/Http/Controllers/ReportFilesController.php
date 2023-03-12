<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportFilesRequest;
use App\Http\Requests\UpdateReportFilesRequest;
use App\Repositories\ReportFilesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ReportFilesController extends AppBaseController
{
    /** @var ReportFilesRepository $reportFilesRepository*/
    private $reportFilesRepository;

    public function __construct(ReportFilesRepository $reportFilesRepo)
    {
        $this->reportFilesRepository = $reportFilesRepo;
    }

    /**
     * Display a listing of the ReportFiles.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $reportFiles = $this->reportFilesRepository->paginate(10);

        return view('report_files.index')
            ->with('reportFiles', $reportFiles);
    }

    /**
     * Show the form for creating a new ReportFiles.
     *
     * @return Response
     */
    public function create()
    {
        return view('report_files.create');
    }

    /**
     * Store a newly created ReportFiles in storage.
     *
     * @param CreateReportFilesRequest $request
     *
     * @return Response
     */
    public function store(CreateReportFilesRequest $request)
    {
        $input = $request->all();

        $reportFiles = $this->reportFilesRepository->create($input);

        Flash::success('Report Files saved successfully.');

        return redirect(route('reportFiles.index'));
    }

    /**
     * Display the specified ReportFiles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reportFiles = $this->reportFilesRepository->find($id);

        if (empty($reportFiles)) {
            Flash::error('Report Files not found');

            return redirect(route('reportFiles.index'));
        }

        return view('report_files.show')->with('reportFiles', $reportFiles);
    }

    /**
     * Show the form for editing the specified ReportFiles.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reportFiles = $this->reportFilesRepository->find($id);

        if (empty($reportFiles)) {
            Flash::error('Report Files not found');

            return redirect(route('reportFiles.index'));
        }

        return view('report_files.edit')->with('reportFiles', $reportFiles);
    }

    /**
     * Update the specified ReportFiles in storage.
     *
     * @param int $id
     * @param UpdateReportFilesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReportFilesRequest $request)
    {
        $reportFiles = $this->reportFilesRepository->find($id);

        if (empty($reportFiles)) {
            Flash::error('Report Files not found');

            return redirect(route('reportFiles.index'));
        }

        $reportFiles = $this->reportFilesRepository->update($request->all(), $id);

        Flash::success('Report Files updated successfully.');

        return redirect(route('reportFiles.index'));
    }

    /**
     * Remove the specified ReportFiles from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reportFiles = $this->reportFilesRepository->find($id);

        if (empty($reportFiles)) {
            Flash::error('Report Files not found');

            return redirect(route('reportFiles.index'));
        }

        $this->reportFilesRepository->delete($id);

        Flash::success('Report Files deleted successfully.');

        return redirect(route('reportFiles.index'));
    }
}
