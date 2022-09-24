<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateManualAPIRequest;
use App\Http\Requests\API\UpdateManualAPIRequest;
use App\Models\Manual;
use App\Repositories\ManualRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ManualResource;
use Response;

/**
 * Class ManualController
 * @package App\Http\Controllers\API
 */

class ManualAPIController extends AppBaseController
{
    /** @var  ManualRepository */
    private $manualRepository;

    public function __construct(ManualRepository $manualRepo)
    {
        $this->manualRepository = $manualRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/manuals",
     *      summary="Get a listing of the Manuals.",
     *      tags={"Manual"},
     *      description="Get all Manuals",
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
     *                  @SWG\Items(ref="#/definitions/Manual")
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
        $manuals = $this->manualRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ManualResource::collection($manuals), 'Manuals retrieved successfully');
    }

    /**
     * @param CreateManualAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/manuals",
     *      summary="Store a newly created Manual in storage",
     *      tags={"Manual"},
     *      description="Store Manual",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Manual that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Manual")
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
     *                  ref="#/definitions/Manual"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateManualAPIRequest $request)
    {
        $input = $request->all();

        $manual = $this->manualRepository->create($input);

        return $this->sendResponse(new ManualResource($manual), 'Manual saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/manuals/{id}",
     *      summary="Display the specified Manual",
     *      tags={"Manual"},
     *      description="Get Manual",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Manual",
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
     *                  ref="#/definitions/Manual"
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
        /** @var Manual $manual */
        $manual = $this->manualRepository->find($id);

        if (empty($manual)) {
            return $this->sendError('Manual not found');
        }

        return $this->sendResponse(new ManualResource($manual), 'Manual retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateManualAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/manuals/{id}",
     *      summary="Update the specified Manual in storage",
     *      tags={"Manual"},
     *      description="Update Manual",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Manual",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Manual that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Manual")
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
     *                  ref="#/definitions/Manual"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateManualAPIRequest $request)
    {
        $input = $request->all();

        /** @var Manual $manual */
        $manual = $this->manualRepository->find($id);

        if (empty($manual)) {
            return $this->sendError('Manual not found');
        }

        $manual = $this->manualRepository->update($input, $id);

        return $this->sendResponse(new ManualResource($manual), 'Manual updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/manuals/{id}",
     *      summary="Remove the specified Manual from storage",
     *      tags={"Manual"},
     *      description="Delete Manual",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Manual",
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
        /** @var Manual $manual */
        $manual = $this->manualRepository->find($id);

        if (empty($manual)) {
            return $this->sendError('Manual not found');
        }

        $manual->delete();

        return $this->sendSuccess('Manual deleted successfully');
    }
}
