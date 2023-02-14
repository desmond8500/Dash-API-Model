<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFichierAPIRequest;
use App\Http\Requests\API\UpdateFichierAPIRequest;
use App\Models\Fichier;
use App\Repositories\FichierRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FichierResource;
use Response;

/**
 * Class FichierController
 * @package App\Http\Controllers\API
 */

class FichierAPIController extends AppBaseController
{
    /** @var  FichierRepository */
    private $fichierRepository;

    public function __construct(FichierRepository $fichierRepo)
    {
        $this->fichierRepository = $fichierRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/fichiers",
     *      summary="Get a listing of the Fichiers.",
     *      tags={"Fichier"},
     *      description="Get all Fichiers",
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
     *                  @SWG\Items(ref="#/definitions/Fichier")
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
        $fichiers = $this->fichierRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FichierResource::collection($fichiers), 'Fichiers retrieved successfully');
    }

    /**
     * @param CreateFichierAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/fichiers",
     *      summary="Store a newly created Fichier in storage",
     *      tags={"Fichier"},
     *      description="Store Fichier",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Fichier that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Fichier")
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
     *                  ref="#/definitions/Fichier"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFichierAPIRequest $request)
    {
        $input = $request->all();

        $fichier = $this->fichierRepository->create($input);

        return $this->sendResponse(new FichierResource($fichier), 'Fichier saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/fichiers/{id}",
     *      summary="Display the specified Fichier",
     *      tags={"Fichier"},
     *      description="Get Fichier",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Fichier",
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
     *                  ref="#/definitions/Fichier"
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
        /** @var Fichier $fichier */
        $fichier = $this->fichierRepository->find($id);

        if (empty($fichier)) {
            return $this->sendError('Fichier not found');
        }

        return $this->sendResponse(new FichierResource($fichier), 'Fichier retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFichierAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/fichiers/{id}",
     *      summary="Update the specified Fichier in storage",
     *      tags={"Fichier"},
     *      description="Update Fichier",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Fichier",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Fichier that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Fichier")
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
     *                  ref="#/definitions/Fichier"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFichierAPIRequest $request)
    {
        $input = $request->all();

        /** @var Fichier $fichier */
        $fichier = $this->fichierRepository->find($id);

        if (empty($fichier)) {
            return $this->sendError('Fichier not found');
        }

        $fichier = $this->fichierRepository->update($input, $id);

        return $this->sendResponse(new FichierResource($fichier), 'Fichier updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/fichiers/{id}",
     *      summary="Remove the specified Fichier from storage",
     *      tags={"Fichier"},
     *      description="Delete Fichier",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Fichier",
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
        /** @var Fichier $fichier */
        $fichier = $this->fichierRepository->find($id);

        if (empty($fichier)) {
            return $this->sendError('Fichier not found');
        }

        $fichier->delete();

        return $this->sendSuccess('Fichier deleted successfully');
    }
}
