<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProjetAPIRequest;
use App\Http\Requests\API\UpdateProjetAPIRequest;
use App\Models\Projet;
use App\Repositories\ProjetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ProjetResource;
use Response;

/**
 * Class ProjetController
 * @package App\Http\Controllers\API
 */

class ProjetAPIController extends AppBaseController
{
    /** @var  ProjetRepository */
    private $projetRepository;

    public function __construct(ProjetRepository $projetRepo)
    {
        $this->projetRepository = $projetRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/projets",
     *      summary="Get a listing of the Projets.",
     *      tags={"Projet"},
     *      description="Get all Projets",
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
     *                  @SWG\Items(ref="#/definitions/Projet")
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
        $projets = $this->projetRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ProjetResource::collection($projets), 'Projets retrieved successfully');
    }

    /**
     * @param CreateProjetAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/projets",
     *      summary="Store a newly created Projet in storage",
     *      tags={"Projet"},
     *      description="Store Projet",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Projet that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Projet")
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
     *                  ref="#/definitions/Projet"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProjetAPIRequest $request)
    {
        $input = $request->all();

        $projet = $this->projetRepository->create($input);

        return $this->sendResponse(new ProjetResource($projet), 'Projet saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/projets/{id}",
     *      summary="Display the specified Projet",
     *      tags={"Projet"},
     *      description="Get Projet",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Projet",
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
     *                  ref="#/definitions/Projet"
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
        /** @var Projet $projet */
        $projet = $this->projetRepository->find($id);

        if (empty($projet)) {
            return $this->sendError('Projet not found');
        }

        return $this->sendResponse(new ProjetResource($projet), 'Projet retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProjetAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/projets/{id}",
     *      summary="Update the specified Projet in storage",
     *      tags={"Projet"},
     *      description="Update Projet",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Projet",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Projet that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Projet")
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
     *                  ref="#/definitions/Projet"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProjetAPIRequest $request)
    {
        $input = $request->all();

        /** @var Projet $projet */
        $projet = $this->projetRepository->find($id);

        if (empty($projet)) {
            return $this->sendError('Projet not found');
        }

        $projet = $this->projetRepository->update($input, $id);

        return $this->sendResponse(new ProjetResource($projet), 'Projet updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/projets/{id}",
     *      summary="Remove the specified Projet from storage",
     *      tags={"Projet"},
     *      description="Delete Projet",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Projet",
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
        /** @var Projet $projet */
        $projet = $this->projetRepository->find($id);

        if (empty($projet)) {
            return $this->sendError('Projet not found');
        }

        $projet->delete();

        return $this->sendSuccess('Projet deleted successfully');
    }
}
