<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTaskDocumentAPIRequest;
use App\Http\Requests\API\UpdateTaskDocumentAPIRequest;
use App\Models\TaskDocument;
use App\Repositories\TaskDocumentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\TaskDocumentResource;
use Response;

/**
 * Class TaskDocumentController
 * @package App\Http\Controllers\API
 */

class TaskDocumentAPIController extends AppBaseController
{
    /** @var  TaskDocumentRepository */
    private $taskDocumentRepository;

    public function __construct(TaskDocumentRepository $taskDocumentRepo)
    {
        $this->taskDocumentRepository = $taskDocumentRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/taskDocuments",
     *      summary="Get a listing of the TaskDocuments.",
     *      tags={"TaskDocument"},
     *      description="Get all TaskDocuments",
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
     *                  @SWG\Items(ref="#/definitions/TaskDocument")
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
        $taskDocuments = $this->taskDocumentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(TaskDocumentResource::collection($taskDocuments), 'Task Documents retrieved successfully');
    }

    /**
     * @param CreateTaskDocumentAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/taskDocuments",
     *      summary="Store a newly created TaskDocument in storage",
     *      tags={"TaskDocument"},
     *      description="Store TaskDocument",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TaskDocument that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TaskDocument")
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
     *                  ref="#/definitions/TaskDocument"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTaskDocumentAPIRequest $request)
    {
        $input = $request->all();

        $taskDocument = $this->taskDocumentRepository->create($input);

        return $this->sendResponse(new TaskDocumentResource($taskDocument), 'Task Document saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/taskDocuments/{id}",
     *      summary="Display the specified TaskDocument",
     *      tags={"TaskDocument"},
     *      description="Get TaskDocument",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TaskDocument",
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
     *                  ref="#/definitions/TaskDocument"
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
        /** @var TaskDocument $taskDocument */
        $taskDocument = $this->taskDocumentRepository->find($id);

        if (empty($taskDocument)) {
            return $this->sendError('Task Document not found');
        }

        return $this->sendResponse(new TaskDocumentResource($taskDocument), 'Task Document retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTaskDocumentAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/taskDocuments/{id}",
     *      summary="Update the specified TaskDocument in storage",
     *      tags={"TaskDocument"},
     *      description="Update TaskDocument",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TaskDocument",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TaskDocument that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TaskDocument")
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
     *                  ref="#/definitions/TaskDocument"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTaskDocumentAPIRequest $request)
    {
        $input = $request->all();

        /** @var TaskDocument $taskDocument */
        $taskDocument = $this->taskDocumentRepository->find($id);

        if (empty($taskDocument)) {
            return $this->sendError('Task Document not found');
        }

        $taskDocument = $this->taskDocumentRepository->update($input, $id);

        return $this->sendResponse(new TaskDocumentResource($taskDocument), 'TaskDocument updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/taskDocuments/{id}",
     *      summary="Remove the specified TaskDocument from storage",
     *      tags={"TaskDocument"},
     *      description="Delete TaskDocument",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TaskDocument",
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
        /** @var TaskDocument $taskDocument */
        $taskDocument = $this->taskDocumentRepository->find($id);

        if (empty($taskDocument)) {
            return $this->sendError('Task Document not found');
        }

        $taskDocument->delete();

        return $this->sendSuccess('Task Document deleted successfully');
    }
}
