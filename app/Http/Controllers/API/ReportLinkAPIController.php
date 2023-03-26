<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReportLinkAPIRequest;
use App\Http\Requests\API\UpdateReportLinkAPIRequest;
use App\Models\ReportLink;
use App\Repositories\ReportLinkRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ReportLinkResource;
use Response;

/**
 * Class ReportLinkController
 * @package App\Http\Controllers\API
 */

class ReportLinkAPIController extends AppBaseController
{
    /** @var  ReportLinkRepository */
    private $reportLinkRepository;

    public function __construct(ReportLinkRepository $reportLinkRepo)
    {
        $this->reportLinkRepository = $reportLinkRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/reportLinks",
     *      summary="Get a listing of the ReportLinks.",
     *      tags={"ReportLink"},
     *      description="Get all ReportLinks",
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
     *                  @SWG\Items(ref="#/definitions/ReportLink")
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
        $reportLinks = $this->reportLinkRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ReportLinkResource::collection($reportLinks), 'Report Links retrieved successfully');
    }

    /**
     * @param CreateReportLinkAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/reportLinks",
     *      summary="Store a newly created ReportLink in storage",
     *      tags={"ReportLink"},
     *      description="Store ReportLink",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ReportLink that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ReportLink")
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
     *                  ref="#/definitions/ReportLink"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateReportLinkAPIRequest $request)
    {
        $input = $request->all();

        $reportLink = $this->reportLinkRepository->create($input);

        return $this->sendResponse(new ReportLinkResource($reportLink), 'Report Link saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/reportLinks/{id}",
     *      summary="Display the specified ReportLink",
     *      tags={"ReportLink"},
     *      description="Get ReportLink",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportLink",
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
     *                  ref="#/definitions/ReportLink"
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
        /** @var ReportLink $reportLink */
        $reportLink = $this->reportLinkRepository->find($id);

        if (empty($reportLink)) {
            return $this->sendError('Report Link not found');
        }

        return $this->sendResponse(new ReportLinkResource($reportLink), 'Report Link retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateReportLinkAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/reportLinks/{id}",
     *      summary="Update the specified ReportLink in storage",
     *      tags={"ReportLink"},
     *      description="Update ReportLink",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportLink",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ReportLink that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ReportLink")
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
     *                  ref="#/definitions/ReportLink"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateReportLinkAPIRequest $request)
    {
        $input = $request->all();

        /** @var ReportLink $reportLink */
        $reportLink = $this->reportLinkRepository->find($id);

        if (empty($reportLink)) {
            return $this->sendError('Report Link not found');
        }

        $reportLink = $this->reportLinkRepository->update($input, $id);

        return $this->sendResponse(new ReportLinkResource($reportLink), 'ReportLink updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/reportLinks/{id}",
     *      summary="Remove the specified ReportLink from storage",
     *      tags={"ReportLink"},
     *      description="Delete ReportLink",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportLink",
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
        /** @var ReportLink $reportLink */
        $reportLink = $this->reportLinkRepository->find($id);

        if (empty($reportLink)) {
            return $this->sendError('Report Link not found');
        }

        $reportLink->delete();

        return $this->sendSuccess('Report Link deleted successfully');
    }
}
