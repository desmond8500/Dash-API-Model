<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReportModaliteAPIRequest;
use App\Http\Requests\API\UpdateReportModaliteAPIRequest;
use App\Models\ReportModalite;
use App\Repositories\ReportModaliteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ReportModaliteResource;
use Response;

/**
 * Class ReportModaliteController
 * @package App\Http\Controllers\API
 */

class ReportModaliteAPIController extends AppBaseController
{
    /** @var  ReportModaliteRepository */
    private $reportModaliteRepository;

    public function __construct(ReportModaliteRepository $reportModaliteRepo)
    {
        $this->reportModaliteRepository = $reportModaliteRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/reportModalites",
     *      summary="Get a listing of the ReportModalites.",
     *      tags={"ReportModalite"},
     *      description="Get all ReportModalites",
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
     *                  @SWG\Items(ref="#/definitions/ReportModalite")
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
        $reportModalites = $this->reportModaliteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ReportModaliteResource::collection($reportModalites), 'Report Modalites retrieved successfully');
    }

    /**
     * @param CreateReportModaliteAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/reportModalites",
     *      summary="Store a newly created ReportModalite in storage",
     *      tags={"ReportModalite"},
     *      description="Store ReportModalite",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ReportModalite that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ReportModalite")
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
     *                  ref="#/definitions/ReportModalite"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateReportModaliteAPIRequest $request)
    {
        $input = $request->all();

        $reportModalite = $this->reportModaliteRepository->create($input);

        return $this->sendResponse(new ReportModaliteResource($reportModalite), 'Report Modalite saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/reportModalites/{id}",
     *      summary="Display the specified ReportModalite",
     *      tags={"ReportModalite"},
     *      description="Get ReportModalite",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportModalite",
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
     *                  ref="#/definitions/ReportModalite"
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
        /** @var ReportModalite $reportModalite */
        $reportModalite = $this->reportModaliteRepository->find($id);

        if (empty($reportModalite)) {
            return $this->sendError('Report Modalite not found');
        }

        return $this->sendResponse(new ReportModaliteResource($reportModalite), 'Report Modalite retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateReportModaliteAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/reportModalites/{id}",
     *      summary="Update the specified ReportModalite in storage",
     *      tags={"ReportModalite"},
     *      description="Update ReportModalite",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportModalite",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ReportModalite that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ReportModalite")
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
     *                  ref="#/definitions/ReportModalite"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateReportModaliteAPIRequest $request)
    {
        $input = $request->all();

        /** @var ReportModalite $reportModalite */
        $reportModalite = $this->reportModaliteRepository->find($id);

        if (empty($reportModalite)) {
            return $this->sendError('Report Modalite not found');
        }

        $reportModalite = $this->reportModaliteRepository->update($input, $id);

        return $this->sendResponse(new ReportModaliteResource($reportModalite), 'ReportModalite updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/reportModalites/{id}",
     *      summary="Remove the specified ReportModalite from storage",
     *      tags={"ReportModalite"},
     *      description="Delete ReportModalite",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportModalite",
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
        /** @var ReportModalite $reportModalite */
        $reportModalite = $this->reportModaliteRepository->find($id);

        if (empty($reportModalite)) {
            return $this->sendError('Report Modalite not found');
        }

        $reportModalite->delete();

        return $this->sendSuccess('Report Modalite deleted successfully');
    }
}
