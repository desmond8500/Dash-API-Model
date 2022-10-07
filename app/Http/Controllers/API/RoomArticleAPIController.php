<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRoomArticleAPIRequest;
use App\Http\Requests\API\UpdateRoomArticleAPIRequest;
use App\Models\RoomArticle;
use App\Repositories\RoomArticleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\RoomArticleResource;
use Response;

/**
 * Class RoomArticleController
 * @package App\Http\Controllers\API
 */

class RoomArticleAPIController extends AppBaseController
{
    /** @var  RoomArticleRepository */
    private $roomArticleRepository;

    public function __construct(RoomArticleRepository $roomArticleRepo)
    {
        $this->roomArticleRepository = $roomArticleRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/roomArticles",
     *      summary="Get a listing of the RoomArticles.",
     *      tags={"RoomArticle"},
     *      description="Get all RoomArticles",
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
     *                  @SWG\Items(ref="#/definitions/RoomArticle")
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
        $roomArticles = $this->roomArticleRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(RoomArticleResource::collection($roomArticles), 'Room Articles retrieved successfully');
    }

    /**
     * @param CreateRoomArticleAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/roomArticles",
     *      summary="Store a newly created RoomArticle in storage",
     *      tags={"RoomArticle"},
     *      description="Store RoomArticle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RoomArticle that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RoomArticle")
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
     *                  ref="#/definitions/RoomArticle"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRoomArticleAPIRequest $request)
    {
        $input = $request->all();

        $roomArticle = $this->roomArticleRepository->create($input);

        return $this->sendResponse(new RoomArticleResource($roomArticle), 'Room Article saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/roomArticles/{id}",
     *      summary="Display the specified RoomArticle",
     *      tags={"RoomArticle"},
     *      description="Get RoomArticle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RoomArticle",
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
     *                  ref="#/definitions/RoomArticle"
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
        /** @var RoomArticle $roomArticle */
        $roomArticle = $this->roomArticleRepository->find($id);

        if (empty($roomArticle)) {
            return $this->sendError('Room Article not found');
        }

        return $this->sendResponse(new RoomArticleResource($roomArticle), 'Room Article retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateRoomArticleAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/roomArticles/{id}",
     *      summary="Update the specified RoomArticle in storage",
     *      tags={"RoomArticle"},
     *      description="Update RoomArticle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RoomArticle",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RoomArticle that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RoomArticle")
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
     *                  ref="#/definitions/RoomArticle"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRoomArticleAPIRequest $request)
    {
        $input = $request->all();

        /** @var RoomArticle $roomArticle */
        $roomArticle = $this->roomArticleRepository->find($id);

        if (empty($roomArticle)) {
            return $this->sendError('Room Article not found');
        }

        $roomArticle = $this->roomArticleRepository->update($input, $id);

        return $this->sendResponse(new RoomArticleResource($roomArticle), 'RoomArticle updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/roomArticles/{id}",
     *      summary="Remove the specified RoomArticle from storage",
     *      tags={"RoomArticle"},
     *      description="Delete RoomArticle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RoomArticle",
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
        /** @var RoomArticle $roomArticle */
        $roomArticle = $this->roomArticleRepository->find($id);

        if (empty($roomArticle)) {
            return $this->sendError('Room Article not found');
        }

        $roomArticle->delete();

        return $this->sendSuccess('Room Article deleted successfully');
    }
}
