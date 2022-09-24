<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStorageAPIRequest;
use App\Http\Requests\API\UpdateStorageAPIRequest;
use App\Models\Storage;
use App\Repositories\StorageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\StorageResource;
use Response;

/**
 * Class StorageController
 * @package App\Http\Controllers\API
 */

class StorageAPIController extends AppBaseController
{
    /** @var  StorageRepository */
    private $storageRepository;

    public function __construct(StorageRepository $storageRepo)
    {
        $this->storageRepository = $storageRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/storages",
     *      summary="Get a listing of the Storages.",
     *      tags={"Storage"},
     *      description="Get all Storages",
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
     *                  @SWG\Items(ref="#/definitions/Storage")
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
        $storages = $this->storageRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(StorageResource::collection($storages), 'Storages retrieved successfully');
    }

    /**
     * @param CreateStorageAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/storages",
     *      summary="Store a newly created Storage in storage",
     *      tags={"Storage"},
     *      description="Store Storage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Storage that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Storage")
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
     *                  ref="#/definitions/Storage"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStorageAPIRequest $request)
    {
        $input = $request->all();

        $storage = $this->storageRepository->create($input);

        return $this->sendResponse(new StorageResource($storage), 'Storage saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/storages/{id}",
     *      summary="Display the specified Storage",
     *      tags={"Storage"},
     *      description="Get Storage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Storage",
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
     *                  ref="#/definitions/Storage"
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
        /** @var Storage $storage */
        $storage = $this->storageRepository->find($id);

        if (empty($storage)) {
            return $this->sendError('Storage not found');
        }

        return $this->sendResponse(new StorageResource($storage), 'Storage retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStorageAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/storages/{id}",
     *      summary="Update the specified Storage in storage",
     *      tags={"Storage"},
     *      description="Update Storage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Storage",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Storage that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Storage")
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
     *                  ref="#/definitions/Storage"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStorageAPIRequest $request)
    {
        $input = $request->all();

        /** @var Storage $storage */
        $storage = $this->storageRepository->find($id);

        if (empty($storage)) {
            return $this->sendError('Storage not found');
        }

        $storage = $this->storageRepository->update($input, $id);

        return $this->sendResponse(new StorageResource($storage), 'Storage updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/storages/{id}",
     *      summary="Remove the specified Storage from storage",
     *      tags={"Storage"},
     *      description="Delete Storage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Storage",
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
        /** @var Storage $storage */
        $storage = $this->storageRepository->find($id);

        if (empty($storage)) {
            return $this->sendError('Storage not found');
        }

        $storage->delete();

        return $this->sendSuccess('Storage deleted successfully');
    }
}
