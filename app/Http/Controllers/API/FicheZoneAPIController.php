<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFicheZoneAPIRequest;
use App\Http\Requests\API\UpdateFicheZoneAPIRequest;
use App\Models\FicheZone;
use App\Repositories\FicheZoneRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FicheZoneResource;
use Response;

/**
 * Class FicheZoneController
 * @package App\Http\Controllers\API
 */

class FicheZoneAPIController extends AppBaseController
{
    /** @var  FicheZoneRepository */
    private $ficheZoneRepository;

    public function __construct(FicheZoneRepository $ficheZoneRepo)
    {
        $this->ficheZoneRepository = $ficheZoneRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/ficheZones",
     *      summary="Get a listing of the FicheZones.",
     *      tags={"FicheZone"},
     *      description="Get all FicheZones",
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
     *                  @SWG\Items(ref="#/definitions/FicheZone")
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
        $ficheZones = $this->ficheZoneRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FicheZoneResource::collection($ficheZones), 'Fiche Zones retrieved successfully');
    }

    /**
     * @param CreateFicheZoneAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/ficheZones",
     *      summary="Store a newly created FicheZone in storage",
     *      tags={"FicheZone"},
     *      description="Store FicheZone",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FicheZone that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FicheZone")
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
     *                  ref="#/definitions/FicheZone"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFicheZoneAPIRequest $request)
    {
        $input = $request->all();

        $ficheZone = $this->ficheZoneRepository->create($input);

        return $this->sendResponse(new FicheZoneResource($ficheZone), 'Fiche Zone saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/ficheZones/{id}",
     *      summary="Display the specified FicheZone",
     *      tags={"FicheZone"},
     *      description="Get FicheZone",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FicheZone",
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
     *                  ref="#/definitions/FicheZone"
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
        /** @var FicheZone $ficheZone */
        $ficheZone = $this->ficheZoneRepository->find($id);

        if (empty($ficheZone)) {
            return $this->sendError('Fiche Zone not found');
        }

        return $this->sendResponse(new FicheZoneResource($ficheZone), 'Fiche Zone retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFicheZoneAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/ficheZones/{id}",
     *      summary="Update the specified FicheZone in storage",
     *      tags={"FicheZone"},
     *      description="Update FicheZone",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FicheZone",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FicheZone that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FicheZone")
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
     *                  ref="#/definitions/FicheZone"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFicheZoneAPIRequest $request)
    {
        $input = $request->all();

        /** @var FicheZone $ficheZone */
        $ficheZone = $this->ficheZoneRepository->find($id);

        if (empty($ficheZone)) {
            return $this->sendError('Fiche Zone not found');
        }

        $ficheZone = $this->ficheZoneRepository->update($input, $id);

        return $this->sendResponse(new FicheZoneResource($ficheZone), 'FicheZone updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ficheZones/{id}",
     *      summary="Remove the specified FicheZone from storage",
     *      tags={"FicheZone"},
     *      description="Delete FicheZone",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FicheZone",
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
        /** @var FicheZone $ficheZone */
        $ficheZone = $this->ficheZoneRepository->find($id);

        if (empty($ficheZone)) {
            return $this->sendError('Fiche Zone not found');
        }

        $ficheZone->delete();

        return $this->sendSuccess('Fiche Zone deleted successfully');
    }
}
