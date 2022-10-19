<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReportDevisAPIRequest;
use App\Http\Requests\API\UpdateReportDevisAPIRequest;
use App\Models\ReportDevis;
use App\Repositories\ReportDevisRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ReportDevisResource;
use Response;

/**
 * Class ReportDevisController
 * @package App\Http\Controllers\API
 */

class ReportDevisAPIController extends AppBaseController
{
    /** @var  ReportDevisRepository */
    private $reportDevisRepository;

    public function __construct(ReportDevisRepository $reportDevisRepo)
    {
        $this->reportDevisRepository = $reportDevisRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/reportDevis",
     *      summary="Get a listing of the ReportDevis.",
     *      tags={"ReportDevis"},
     *      description="Get all ReportDevis",
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
     *                  @SWG\Items(ref="#/definitions/ReportDevis")
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
        $reportDevis = $this->reportDevisRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ReportDevisResource::collection($reportDevis), 'Report Devis retrieved successfully');
    }

    /**
     * @param CreateReportDevisAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/reportDevis",
     *      summary="Store a newly created ReportDevis in storage",
     *      tags={"ReportDevis"},
     *      description="Store ReportDevis",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ReportDevis that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ReportDevis")
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
     *                  ref="#/definitions/ReportDevis"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateReportDevisAPIRequest $request)
    {
        $input = $request->all();

        $reportDevis = $this->reportDevisRepository->create($input);

        return $this->sendResponse(new ReportDevisResource($reportDevis), 'Report Devis saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/reportDevis/{id}",
     *      summary="Display the specified ReportDevis",
     *      tags={"ReportDevis"},
     *      description="Get ReportDevis",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportDevis",
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
     *                  ref="#/definitions/ReportDevis"
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
        /** @var ReportDevis $reportDevis */
        $reportDevis = $this->reportDevisRepository->find($id);

        if (empty($reportDevis)) {
            return $this->sendError('Report Devis not found');
        }

        return $this->sendResponse(new ReportDevisResource($reportDevis), 'Report Devis retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateReportDevisAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/reportDevis/{id}",
     *      summary="Update the specified ReportDevis in storage",
     *      tags={"ReportDevis"},
     *      description="Update ReportDevis",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportDevis",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ReportDevis that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ReportDevis")
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
     *                  ref="#/definitions/ReportDevis"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateReportDevisAPIRequest $request)
    {
        $input = $request->all();

        /** @var ReportDevis $reportDevis */
        $reportDevis = $this->reportDevisRepository->find($id);

        if (empty($reportDevis)) {
            return $this->sendError('Report Devis not found');
        }

        $reportDevis = $this->reportDevisRepository->update($input, $id);

        return $this->sendResponse(new ReportDevisResource($reportDevis), 'ReportDevis updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/reportDevis/{id}",
     *      summary="Remove the specified ReportDevis from storage",
     *      tags={"ReportDevis"},
     *      description="Delete ReportDevis",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportDevis",
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
        /** @var ReportDevis $reportDevis */
        $reportDevis = $this->reportDevisRepository->find($id);

        if (empty($reportDevis)) {
            return $this->sendError('Report Devis not found');
        }

        $reportDevis->delete();

        return $this->sendSuccess('Report Devis deleted successfully');
    }
}
