<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSystemAPIRequest;
use App\Http\Requests\API\UpdateSystemAPIRequest;
use App\Models\System;
use App\Repositories\SystemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\SystemResource;
use Response;

/**
 * Class SystemController
 * @package App\Http\Controllers\API
 */

class SystemAPIController extends AppBaseController
{
    /** @var  SystemRepository */
    private $systemRepository;

    public function __construct(SystemRepository $systemRepo)
    {
        $this->systemRepository = $systemRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/systems",
     *      summary="Get a listing of the Systems.",
     *      tags={"System"},
     *      description="Get all Systems",
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
     *                  @SWG\Items(ref="#/definitions/System")
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
        $systems = $this->systemRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(SystemResource::collection($systems), 'Systems retrieved successfully');
    }

    /**
     * @param CreateSystemAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/systems",
     *      summary="Store a newly created System in storage",
     *      tags={"System"},
     *      description="Store System",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="System that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/System")
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
     *                  ref="#/definitions/System"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateSystemAPIRequest $request)
    {
        $input = $request->all();

        $system = $this->systemRepository->create($input);

        return $this->sendResponse(new SystemResource($system), 'System saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/systems/{id}",
     *      summary="Display the specified System",
     *      tags={"System"},
     *      description="Get System",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of System",
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
     *                  ref="#/definitions/System"
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
        /** @var System $system */
        $system = $this->systemRepository->find($id);

        if (empty($system)) {
            return $this->sendError('System not found');
        }

        return $this->sendResponse(new SystemResource($system), 'System retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateSystemAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/systems/{id}",
     *      summary="Update the specified System in storage",
     *      tags={"System"},
     *      description="Update System",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of System",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="System that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/System")
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
     *                  ref="#/definitions/System"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateSystemAPIRequest $request)
    {
        $input = $request->all();

        /** @var System $system */
        $system = $this->systemRepository->find($id);

        if (empty($system)) {
            return $this->sendError('System not found');
        }

        $system = $this->systemRepository->update($input, $id);

        return $this->sendResponse(new SystemResource($system), 'System updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/systems/{id}",
     *      summary="Remove the specified System from storage",
     *      tags={"System"},
     *      description="Delete System",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of System",
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
        /** @var System $system */
        $system = $this->systemRepository->find($id);

        if (empty($system)) {
            return $this->sendError('System not found');
        }

        $system->delete();

        return $this->sendSuccess('System deleted successfully');
    }
}
