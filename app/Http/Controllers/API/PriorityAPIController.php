<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePriorityAPIRequest;
use App\Http\Requests\API\UpdatePriorityAPIRequest;
use App\Models\Priority;
use App\Repositories\PriorityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PriorityResource;
use Response;

/**
 * Class PriorityController
 * @package App\Http\Controllers\API
 */

class PriorityAPIController extends AppBaseController
{
    /** @var  PriorityRepository */
    private $priorityRepository;

    public function __construct(PriorityRepository $priorityRepo)
    {
        $this->priorityRepository = $priorityRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/priorities",
     *      summary="Get a listing of the Priorities.",
     *      tags={"Priority"},
     *      description="Get all Priorities",
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
     *                  @SWG\Items(ref="#/definitions/Priority")
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
        $priorities = $this->priorityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(PriorityResource::collection($priorities), 'Priorities retrieved successfully');
    }

    /**
     * @param CreatePriorityAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/priorities",
     *      summary="Store a newly created Priority in storage",
     *      tags={"Priority"},
     *      description="Store Priority",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Priority that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Priority")
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
     *                  ref="#/definitions/Priority"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePriorityAPIRequest $request)
    {
        $input = $request->all();

        $priority = $this->priorityRepository->create($input);

        return $this->sendResponse(new PriorityResource($priority), 'Priority saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/priorities/{id}",
     *      summary="Display the specified Priority",
     *      tags={"Priority"},
     *      description="Get Priority",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Priority",
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
     *                  ref="#/definitions/Priority"
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
        /** @var Priority $priority */
        $priority = $this->priorityRepository->find($id);

        if (empty($priority)) {
            return $this->sendError('Priority not found');
        }

        return $this->sendResponse(new PriorityResource($priority), 'Priority retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePriorityAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/priorities/{id}",
     *      summary="Update the specified Priority in storage",
     *      tags={"Priority"},
     *      description="Update Priority",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Priority",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Priority that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Priority")
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
     *                  ref="#/definitions/Priority"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePriorityAPIRequest $request)
    {
        $input = $request->all();

        /** @var Priority $priority */
        $priority = $this->priorityRepository->find($id);

        if (empty($priority)) {
            return $this->sendError('Priority not found');
        }

        $priority = $this->priorityRepository->update($input, $id);

        return $this->sendResponse(new PriorityResource($priority), 'Priority updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/priorities/{id}",
     *      summary="Remove the specified Priority from storage",
     *      tags={"Priority"},
     *      description="Delete Priority",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Priority",
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
        /** @var Priority $priority */
        $priority = $this->priorityRepository->find($id);

        if (empty($priority)) {
            return $this->sendError('Priority not found');
        }

        $priority->delete();

        return $this->sendSuccess('Priority deleted successfully');
    }
}
