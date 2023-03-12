<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReportFilesAPIRequest;
use App\Http\Requests\API\UpdateReportFilesAPIRequest;
use App\Models\ReportFiles;
use App\Repositories\ReportFilesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ReportFilesResource;
use Response;

/**
 * Class ReportFilesController
 * @package App\Http\Controllers\API
 */

class ReportFilesAPIController extends AppBaseController
{
    /** @var  ReportFilesRepository */
    private $reportFilesRepository;

    public function __construct(ReportFilesRepository $reportFilesRepo)
    {
        $this->reportFilesRepository = $reportFilesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/reportFiles",
     *      summary="Get a listing of the ReportFiles.",
     *      tags={"ReportFiles"},
     *      description="Get all ReportFiles",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/ReportFiles")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $reportFiles = $this->reportFilesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ReportFilesResource::collection($reportFiles), 'Report Files retrieved successfully');
    }

    /**
     * @param CreateReportFilesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/reportFiles",
     *      summary="Store a newly created ReportFiles in storage",
     *      tags={"ReportFiles"},
     *      description="Store ReportFiles",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ReportFiles that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ReportFiles")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/ReportFiles"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateReportFilesAPIRequest $request)
    {
        $input = $request->all();

        $reportFiles = $this->reportFilesRepository->create($input);

        return $this->sendResponse(new ReportFilesResource($reportFiles), 'Report Files saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/reportFiles/{id}",
     *      summary="Display the specified ReportFiles",
     *      tags={"ReportFiles"},
     *      description="Get ReportFiles",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportFiles",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/ReportFiles"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var ReportFiles $reportFiles */
        $reportFiles = $this->reportFilesRepository->find($id);

        if (empty($reportFiles)) {
            return $this->sendError('Report Files not found');
        }

        return $this->sendResponse(new ReportFilesResource($reportFiles), 'Report Files retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateReportFilesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/reportFiles/{id}",
     *      summary="Update the specified ReportFiles in storage",
     *      tags={"ReportFiles"},
     *      description="Update ReportFiles",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportFiles",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ReportFiles that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ReportFiles")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/ReportFiles"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateReportFilesAPIRequest $request)
    {
        $input = $request->all();

        /** @var ReportFiles $reportFiles */
        $reportFiles = $this->reportFilesRepository->find($id);

        if (empty($reportFiles)) {
            return $this->sendError('Report Files not found');
        }

        $reportFiles = $this->reportFilesRepository->update($input, $id);

        return $this->sendResponse(new ReportFilesResource($reportFiles), 'ReportFiles updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/reportFiles/{id}",
     *      summary="Remove the specified ReportFiles from storage",
     *      tags={"ReportFiles"},
     *      description="Delete ReportFiles",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportFiles",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var ReportFiles $reportFiles */
        $reportFiles = $this->reportFilesRepository->find($id);

        if (empty($reportFiles)) {
            return $this->sendError('Report Files not found');
        }

        $reportFiles->delete();

        return $this->sendSuccess('Report Files deleted successfully');
    }
}
