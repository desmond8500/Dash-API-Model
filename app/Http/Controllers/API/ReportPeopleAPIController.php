<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReportPeopleAPIRequest;
use App\Http\Requests\API\UpdateReportPeopleAPIRequest;
use App\Models\ReportPeople;
use App\Repositories\ReportPeopleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ReportPeopleResource;
use Response;

/**
 * Class ReportPeopleController
 * @package App\Http\Controllers\API
 */

class ReportPeopleAPIController extends AppBaseController
{
    /** @var  ReportPeopleRepository */
    private $reportPeopleRepository;

    public function __construct(ReportPeopleRepository $reportPeopleRepo)
    {
        $this->reportPeopleRepository = $reportPeopleRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/reportPeoples",
     *      summary="Get a listing of the ReportPeoples.",
     *      tags={"ReportPeople"},
     *      description="Get all ReportPeoples",
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
     *                  @SWG\Items(ref="#/definitions/ReportPeople")
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
        $reportPeoples = $this->reportPeopleRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ReportPeopleResource::collection($reportPeoples), 'Report Peoples retrieved successfully');
    }

    /**
     * @param CreateReportPeopleAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/reportPeoples",
     *      summary="Store a newly created ReportPeople in storage",
     *      tags={"ReportPeople"},
     *      description="Store ReportPeople",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ReportPeople that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ReportPeople")
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
     *                  ref="#/definitions/ReportPeople"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateReportPeopleAPIRequest $request)
    {
        $input = $request->all();

        $reportPeople = $this->reportPeopleRepository->create($input);

        return $this->sendResponse(new ReportPeopleResource($reportPeople), 'Report People saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/reportPeoples/{id}",
     *      summary="Display the specified ReportPeople",
     *      tags={"ReportPeople"},
     *      description="Get ReportPeople",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportPeople",
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
     *                  ref="#/definitions/ReportPeople"
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
        /** @var ReportPeople $reportPeople */
        $reportPeople = $this->reportPeopleRepository->find($id);

        if (empty($reportPeople)) {
            return $this->sendError('Report People not found');
        }

        return $this->sendResponse(new ReportPeopleResource($reportPeople), 'Report People retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateReportPeopleAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/reportPeoples/{id}",
     *      summary="Update the specified ReportPeople in storage",
     *      tags={"ReportPeople"},
     *      description="Update ReportPeople",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportPeople",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ReportPeople that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ReportPeople")
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
     *                  ref="#/definitions/ReportPeople"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateReportPeopleAPIRequest $request)
    {
        $input = $request->all();

        /** @var ReportPeople $reportPeople */
        $reportPeople = $this->reportPeopleRepository->find($id);

        if (empty($reportPeople)) {
            return $this->sendError('Report People not found');
        }

        $reportPeople = $this->reportPeopleRepository->update($input, $id);

        return $this->sendResponse(new ReportPeopleResource($reportPeople), 'ReportPeople updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/reportPeoples/{id}",
     *      summary="Remove the specified ReportPeople from storage",
     *      tags={"ReportPeople"},
     *      description="Delete ReportPeople",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ReportPeople",
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
        /** @var ReportPeople $reportPeople */
        $reportPeople = $this->reportPeopleRepository->find($id);

        if (empty($reportPeople)) {
            return $this->sendError('Report People not found');
        }

        $reportPeople->delete();

        return $this->sendSuccess('Report People deleted successfully');
    }
}
