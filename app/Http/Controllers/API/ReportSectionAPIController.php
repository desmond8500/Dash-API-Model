<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReportSectionAPIRequest;
use App\Http\Requests\API\UpdateReportSectionAPIRequest;
use App\Models\ReportSection;
use App\Repositories\ReportSectionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ReportSectionResource;
use Response;

/**
 * Class ReportSectionController
 * @package App\Http\Controllers\API
 */

class ReportSectionAPIController extends AppBaseController
{
    /** @var  ReportSectionRepository */
    private $reportSectionRepository;

    public function __construct(ReportSectionRepository $reportSectionRepo)
    {
        $this->reportSectionRepository = $reportSectionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/reportSections",
     *      summary="Get a listing of the ReportSections.",
     *      tags={"ReportSection"},
     *      description="Get all ReportSections",
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
     *                  @SWG\Items(ref="#/definitions/ReportSection")
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
        $reportSections = $this->reportSectionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ReportSectionResource::collection($reportSections), 'Report Sections retrieved successfully');
    }

    /**
     * @param CreateReportSectionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/reportSections",
     *      summary="Store a newly created ReportSection in storage",
     *      tags={"ReportSection"},
     *      description="Store ReportSection",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ReportSection that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ReportSection")
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
     *                  ref="#/definitions/ReportSection"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateReportSectionAPIRequest $request)
    {
        $input = $request->all();

        $reportSection = $this->reportSectionRepository->create($input);

        return $this->sendResponse(new ReportSectionResource($reportSection), 'Report Section saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/reportSections/{id}",
     *      summary="Display the specified ReportSection",
     *      tags={"ReportSection"},
     *      description="Get ReportSection",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportSection",
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
     *                  ref="#/definitions/ReportSection"
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
        /** @var ReportSection $reportSection */
        $reportSection = $this->reportSectionRepository->find($id);

        if (empty($reportSection)) {
            return $this->sendError('Report Section not found');
        }

        return $this->sendResponse(new ReportSectionResource($reportSection), 'Report Section retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateReportSectionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/reportSections/{id}",
     *      summary="Update the specified ReportSection in storage",
     *      tags={"ReportSection"},
     *      description="Update ReportSection",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportSection",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ReportSection that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ReportSection")
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
     *                  ref="#/definitions/ReportSection"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateReportSectionAPIRequest $request)
    {
        $input = $request->all();

        /** @var ReportSection $reportSection */
        $reportSection = $this->reportSectionRepository->find($id);

        if (empty($reportSection)) {
            return $this->sendError('Report Section not found');
        }

        $reportSection = $this->reportSectionRepository->update($input, $id);

        return $this->sendResponse(new ReportSectionResource($reportSection), 'ReportSection updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/reportSections/{id}",
     *      summary="Remove the specified ReportSection from storage",
     *      tags={"ReportSection"},
     *      description="Delete ReportSection",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportSection",
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
        /** @var ReportSection $reportSection */
        $reportSection = $this->reportSectionRepository->find($id);

        if (empty($reportSection)) {
            return $this->sendError('Report Section not found');
        }

        $reportSection->delete();

        return $this->sendSuccess('Report Section deleted successfully');
    }
}
