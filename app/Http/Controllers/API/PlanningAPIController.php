<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePlanningAPIRequest;
use App\Http\Requests\API\UpdatePlanningAPIRequest;
use App\Models\Planning;
use App\Repositories\PlanningRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PlanningResource;
use Response;

/**
 * Class PlanningController
 * @package App\Http\Controllers\API
 */

class PlanningAPIController extends AppBaseController
{
    /** @var  PlanningRepository */
    private $planningRepository;

    public function __construct(PlanningRepository $planningRepo)
    {
        $this->planningRepository = $planningRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/plannings",
     *      summary="Get a listing of the Plannings.",
     *      tags={"Planning"},
     *      description="Get all Plannings",
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
     *                  @SWG\Items(ref="#/definitions/Planning")
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
        $plannings = $this->planningRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(PlanningResource::collection($plannings), 'Plannings retrieved successfully');
    }

    /**
     * @param CreatePlanningAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/plannings",
     *      summary="Store a newly created Planning in storage",
     *      tags={"Planning"},
     *      description="Store Planning",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Planning that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Planning")
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
     *                  ref="#/definitions/Planning"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePlanningAPIRequest $request)
    {
        $input = $request->all();

        $planning = $this->planningRepository->create($input);

        return $this->sendResponse(new PlanningResource($planning), 'Planning saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/plannings/{id}",
     *      summary="Display the specified Planning",
     *      tags={"Planning"},
     *      description="Get Planning",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Planning",
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
     *                  ref="#/definitions/Planning"
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
        /** @var Planning $planning */
        $planning = $this->planningRepository->find($id);

        if (empty($planning)) {
            return $this->sendError('Planning not found');
        }

        return $this->sendResponse(new PlanningResource($planning), 'Planning retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePlanningAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/plannings/{id}",
     *      summary="Update the specified Planning in storage",
     *      tags={"Planning"},
     *      description="Update Planning",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Planning",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Planning that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Planning")
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
     *                  ref="#/definitions/Planning"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePlanningAPIRequest $request)
    {
        $input = $request->all();

        /** @var Planning $planning */
        $planning = $this->planningRepository->find($id);

        if (empty($planning)) {
            return $this->sendError('Planning not found');
        }

        $planning = $this->planningRepository->update($input, $id);

        return $this->sendResponse(new PlanningResource($planning), 'Planning updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/plannings/{id}",
     *      summary="Remove the specified Planning from storage",
     *      tags={"Planning"},
     *      description="Delete Planning",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Planning",
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
        /** @var Planning $planning */
        $planning = $this->planningRepository->find($id);

        if (empty($planning)) {
            return $this->sendError('Planning not found');
        }

        $planning->delete();

        return $this->sendSuccess('Planning deleted successfully');
    }
}
