<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEntrepriseAPIRequest;
use App\Http\Requests\API\UpdateEntrepriseAPIRequest;
use App\Models\Entreprise;
use App\Repositories\EntrepriseRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\EntrepriseResource;
use Response;

/**
 * Class EntrepriseController
 * @package App\Http\Controllers\API
 */

class EntrepriseAPIController extends AppBaseController
{
    /** @var  EntrepriseRepository */
    private $entrepriseRepository;

    public function __construct(EntrepriseRepository $entrepriseRepo)
    {
        $this->entrepriseRepository = $entrepriseRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/entreprises",
     *      summary="Get a listing of the Entreprises.",
     *      tags={"Entreprise"},
     *      description="Get all Entreprises",
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
     *                  @SWG\Items(ref="#/definitions/Entreprise")
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
        $entreprises = $this->entrepriseRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(EntrepriseResource::collection($entreprises), 'Entreprises retrieved successfully');
    }

    /**
     * @param CreateEntrepriseAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/entreprises",
     *      summary="Store a newly created Entreprise in storage",
     *      tags={"Entreprise"},
     *      description="Store Entreprise",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Entreprise that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Entreprise")
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
     *                  ref="#/definitions/Entreprise"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEntrepriseAPIRequest $request)
    {
        $input = $request->all();

        $entreprise = $this->entrepriseRepository->create($input);

        return $this->sendResponse(new EntrepriseResource($entreprise), 'Entreprise saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/entreprises/{id}",
     *      summary="Display the specified Entreprise",
     *      tags={"Entreprise"},
     *      description="Get Entreprise",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Entreprise",
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
     *                  ref="#/definitions/Entreprise"
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
        /** @var Entreprise $entreprise */
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            return $this->sendError('Entreprise not found');
        }

        return $this->sendResponse(new EntrepriseResource($entreprise), 'Entreprise retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateEntrepriseAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/entreprises/{id}",
     *      summary="Update the specified Entreprise in storage",
     *      tags={"Entreprise"},
     *      description="Update Entreprise",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Entreprise",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Entreprise that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Entreprise")
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
     *                  ref="#/definitions/Entreprise"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEntrepriseAPIRequest $request)
    {
        $input = $request->all();

        /** @var Entreprise $entreprise */
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            return $this->sendError('Entreprise not found');
        }

        $entreprise = $this->entrepriseRepository->update($input, $id);

        return $this->sendResponse(new EntrepriseResource($entreprise), 'Entreprise updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/entreprises/{id}",
     *      summary="Remove the specified Entreprise from storage",
     *      tags={"Entreprise"},
     *      description="Delete Entreprise",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Entreprise",
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
        /** @var Entreprise $entreprise */
        $entreprise = $this->entrepriseRepository->find($id);

        if (empty($entreprise)) {
            return $this->sendError('Entreprise not found');
        }

        $entreprise->delete();

        return $this->sendSuccess('Entreprise deleted successfully');
    }
}
