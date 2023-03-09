<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTacheAPIRequest;
use App\Http\Requests\API\UpdateTacheAPIRequest;
use App\Models\Tache;
use App\Repositories\TacheRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\TacheResource;
use Response;

/**
 * Class TacheController
 * @package App\Http\Controllers\API
 */

class TacheAPIController extends AppBaseController
{
    /** @var  TacheRepository */
    private $tacheRepository;

    public function __construct(TacheRepository $tacheRepo)
    {
        $this->tacheRepository = $tacheRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/taches",
     *      summary="Get a listing of the Taches.",
     *      tags={"Tache"},
     *      description="Get all Taches",
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
     *                  @SWG\Items(ref="#/definitions/Tache")
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
        $taches = $this->tacheRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(TacheResource::collection($taches), 'Taches retrieved successfully');
    }

    /**
     * @param CreateTacheAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/taches",
     *      summary="Store a newly created Tache in storage",
     *      tags={"Tache"},
     *      description="Store Tache",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Tache that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Tache")
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
     *                  ref="#/definitions/Tache"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTacheAPIRequest $request)
    {
        $input = $request->all();

        $tache = $this->tacheRepository->create($input);

        return $this->sendResponse(new TacheResource($tache), 'Tache saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/taches/{id}",
     *      summary="Display the specified Tache",
     *      tags={"Tache"},
     *      description="Get Tache",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tache",
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
     *                  ref="#/definitions/Tache"
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
        /** @var Tache $tache */
        $tache = $this->tacheRepository->find($id);

        if (empty($tache)) {
            return $this->sendError('Tache not found');
        }

        return $this->sendResponse(new TacheResource($tache), 'Tache retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTacheAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/taches/{id}",
     *      summary="Update the specified Tache in storage",
     *      tags={"Tache"},
     *      description="Update Tache",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tache",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Tache that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Tache")
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
     *                  ref="#/definitions/Tache"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTacheAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tache $tache */
        $tache = $this->tacheRepository->find($id);

        if (empty($tache)) {
            return $this->sendError('Tache not found');
        }

        $tache = $this->tacheRepository->update($input, $id);

        return $this->sendResponse(new TacheResource($tache), 'Tache updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/taches/{id}",
     *      summary="Remove the specified Tache from storage",
     *      tags={"Tache"},
     *      description="Delete Tache",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Tache",
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
        /** @var Tache $tache */
        $tache = $this->tacheRepository->find($id);

        if (empty($tache)) {
            return $this->sendError('Tache not found');
        }

        $tache->delete();

        return $this->sendSuccess('Tache deleted successfully');
    }
}
