<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTaskPhotoAPIRequest;
use App\Http\Requests\API\UpdateTaskPhotoAPIRequest;
use App\Models\TaskPhoto;
use App\Repositories\TaskPhotoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\TaskPhotoResource;
use Response;

/**
 * Class TaskPhotoController
 * @package App\Http\Controllers\API
 */

class TaskPhotoAPIController extends AppBaseController
{
    /** @var  TaskPhotoRepository */
    private $taskPhotoRepository;

    public function __construct(TaskPhotoRepository $taskPhotoRepo)
    {
        $this->taskPhotoRepository = $taskPhotoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/taskPhotos",
     *      summary="Get a listing of the TaskPhotos.",
     *      tags={"TaskPhoto"},
     *      description="Get all TaskPhotos",
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
     *                  @SWG\Items(ref="#/definitions/TaskPhoto")
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
        $taskPhotos = $this->taskPhotoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(TaskPhotoResource::collection($taskPhotos), 'Task Photos retrieved successfully');
    }

    /**
     * @param CreateTaskPhotoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/taskPhotos",
     *      summary="Store a newly created TaskPhoto in storage",
     *      tags={"TaskPhoto"},
     *      description="Store TaskPhoto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TaskPhoto that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TaskPhoto")
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
     *                  ref="#/definitions/TaskPhoto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTaskPhotoAPIRequest $request)
    {
        $input = $request->all();

        $taskPhoto = $this->taskPhotoRepository->create($input);

        return $this->sendResponse(new TaskPhotoResource($taskPhoto), 'Task Photo saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/taskPhotos/{id}",
     *      summary="Display the specified TaskPhoto",
     *      tags={"TaskPhoto"},
     *      description="Get TaskPhoto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TaskPhoto",
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
     *                  ref="#/definitions/TaskPhoto"
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
        /** @var TaskPhoto $taskPhoto */
        $taskPhoto = $this->taskPhotoRepository->find($id);

        if (empty($taskPhoto)) {
            return $this->sendError('Task Photo not found');
        }

        return $this->sendResponse(new TaskPhotoResource($taskPhoto), 'Task Photo retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTaskPhotoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/taskPhotos/{id}",
     *      summary="Update the specified TaskPhoto in storage",
     *      tags={"TaskPhoto"},
     *      description="Update TaskPhoto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TaskPhoto",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TaskPhoto that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TaskPhoto")
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
     *                  ref="#/definitions/TaskPhoto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTaskPhotoAPIRequest $request)
    {
        $input = $request->all();

        /** @var TaskPhoto $taskPhoto */
        $taskPhoto = $this->taskPhotoRepository->find($id);

        if (empty($taskPhoto)) {
            return $this->sendError('Task Photo not found');
        }

        $taskPhoto = $this->taskPhotoRepository->update($input, $id);

        return $this->sendResponse(new TaskPhotoResource($taskPhoto), 'TaskPhoto updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/taskPhotos/{id}",
     *      summary="Remove the specified TaskPhoto from storage",
     *      tags={"TaskPhoto"},
     *      description="Delete TaskPhoto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TaskPhoto",
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
        /** @var TaskPhoto $taskPhoto */
        $taskPhoto = $this->taskPhotoRepository->find($id);

        if (empty($taskPhoto)) {
            return $this->sendError('Task Photo not found');
        }

        $taskPhoto->delete();

        return $this->sendSuccess('Task Photo deleted successfully');
    }
}
