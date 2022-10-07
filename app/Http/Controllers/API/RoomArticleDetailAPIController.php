<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRoomArticleDetailAPIRequest;
use App\Http\Requests\API\UpdateRoomArticleDetailAPIRequest;
use App\Models\RoomArticleDetail;
use App\Repositories\RoomArticleDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\RoomArticleDetailResource;
use Response;

/**
 * Class RoomArticleDetailController
 * @package App\Http\Controllers\API
 */

class RoomArticleDetailAPIController extends AppBaseController
{
    /** @var  RoomArticleDetailRepository */
    private $roomArticleDetailRepository;

    public function __construct(RoomArticleDetailRepository $roomArticleDetailRepo)
    {
        $this->roomArticleDetailRepository = $roomArticleDetailRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/roomArticleDetails",
     *      summary="Get a listing of the RoomArticleDetails.",
     *      tags={"RoomArticleDetail"},
     *      description="Get all RoomArticleDetails",
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
     *                  @SWG\Items(ref="#/definitions/RoomArticleDetail")
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
        $roomArticleDetails = $this->roomArticleDetailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(RoomArticleDetailResource::collection($roomArticleDetails), 'Room Article Details retrieved successfully');
    }

    /**
     * @param CreateRoomArticleDetailAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/roomArticleDetails",
     *      summary="Store a newly created RoomArticleDetail in storage",
     *      tags={"RoomArticleDetail"},
     *      description="Store RoomArticleDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RoomArticleDetail that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RoomArticleDetail")
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
     *                  ref="#/definitions/RoomArticleDetail"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRoomArticleDetailAPIRequest $request)
    {
        $input = $request->all();

        $roomArticleDetail = $this->roomArticleDetailRepository->create($input);

        return $this->sendResponse(new RoomArticleDetailResource($roomArticleDetail), 'Room Article Detail saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/roomArticleDetails/{id}",
     *      summary="Display the specified RoomArticleDetail",
     *      tags={"RoomArticleDetail"},
     *      description="Get RoomArticleDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RoomArticleDetail",
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
     *                  ref="#/definitions/RoomArticleDetail"
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
        /** @var RoomArticleDetail $roomArticleDetail */
        $roomArticleDetail = $this->roomArticleDetailRepository->find($id);

        if (empty($roomArticleDetail)) {
            return $this->sendError('Room Article Detail not found');
        }

        return $this->sendResponse(new RoomArticleDetailResource($roomArticleDetail), 'Room Article Detail retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateRoomArticleDetailAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/roomArticleDetails/{id}",
     *      summary="Update the specified RoomArticleDetail in storage",
     *      tags={"RoomArticleDetail"},
     *      description="Update RoomArticleDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RoomArticleDetail",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RoomArticleDetail that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RoomArticleDetail")
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
     *                  ref="#/definitions/RoomArticleDetail"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRoomArticleDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var RoomArticleDetail $roomArticleDetail */
        $roomArticleDetail = $this->roomArticleDetailRepository->find($id);

        if (empty($roomArticleDetail)) {
            return $this->sendError('Room Article Detail not found');
        }

        $roomArticleDetail = $this->roomArticleDetailRepository->update($input, $id);

        return $this->sendResponse(new RoomArticleDetailResource($roomArticleDetail), 'RoomArticleDetail updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/roomArticleDetails/{id}",
     *      summary="Remove the specified RoomArticleDetail from storage",
     *      tags={"RoomArticleDetail"},
     *      description="Delete RoomArticleDetail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RoomArticleDetail",
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
        /** @var RoomArticleDetail $roomArticleDetail */
        $roomArticleDetail = $this->roomArticleDetailRepository->find($id);

        if (empty($roomArticleDetail)) {
            return $this->sendError('Room Article Detail not found');
        }

        $roomArticleDetail->delete();

        return $this->sendSuccess('Room Article Detail deleted successfully');
    }
}
