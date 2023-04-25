<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFicheAPIRequest;
use App\Http\Requests\API\UpdateFicheAPIRequest;
use App\Models\Fiche;
use App\Repositories\FicheRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FicheResource;
use Response;

/**
 * Class FicheController
 * @package App\Http\Controllers\API
 */

class FicheAPIController extends AppBaseController
{
    /** @var  FicheRepository */
    private $ficheRepository;

    public function __construct(FicheRepository $ficheRepo)
    {
        $this->ficheRepository = $ficheRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/fiches",
     *      summary="Get a listing of the Fiches.",
     *      tags={"Fiche"},
     *      description="Get all Fiches",
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
     *                  @SWG\Items(ref="#/definitions/Fiche")
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
        $fiches = $this->ficheRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FicheResource::collection($fiches), 'Fiches retrieved successfully');
    }

    /**
     * @param CreateFicheAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/fiches",
     *      summary="Store a newly created Fiche in storage",
     *      tags={"Fiche"},
     *      description="Store Fiche",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Fiche that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Fiche")
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
     *                  ref="#/definitions/Fiche"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFicheAPIRequest $request)
    {
        $input = $request->all();

        $fiche = $this->ficheRepository->create($input);

        return $this->sendResponse(new FicheResource($fiche), 'Fiche saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/fiches/{id}",
     *      summary="Display the specified Fiche",
     *      tags={"Fiche"},
     *      description="Get Fiche",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Fiche",
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
     *                  ref="#/definitions/Fiche"
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
        /** @var Fiche $fiche */
        $fiche = $this->ficheRepository->find($id);

        if (empty($fiche)) {
            return $this->sendError('Fiche not found');
        }

        return $this->sendResponse(new FicheResource($fiche), 'Fiche retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFicheAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/fiches/{id}",
     *      summary="Update the specified Fiche in storage",
     *      tags={"Fiche"},
     *      description="Update Fiche",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Fiche",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Fiche that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Fiche")
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
     *                  ref="#/definitions/Fiche"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFicheAPIRequest $request)
    {
        $input = $request->all();

        /** @var Fiche $fiche */
        $fiche = $this->ficheRepository->find($id);

        if (empty($fiche)) {
            return $this->sendError('Fiche not found');
        }

        $fiche = $this->ficheRepository->update($input, $id);

        return $this->sendResponse(new FicheResource($fiche), 'Fiche updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/fiches/{id}",
     *      summary="Remove the specified Fiche from storage",
     *      tags={"Fiche"},
     *      description="Delete Fiche",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Fiche",
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
        /** @var Fiche $fiche */
        $fiche = $this->ficheRepository->find($id);

        if (empty($fiche)) {
            return $this->sendError('Fiche not found');
        }

        $fiche->delete();

        return $this->sendSuccess('Fiche deleted successfully');
    }
}
