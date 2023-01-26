<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePersonneAPIRequest;
use App\Http\Requests\API\UpdatePersonneAPIRequest;
use App\Models\Personne;
use App\Repositories\PersonneRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PersonneResource;
use Response;

/**
 * Class PersonneController
 * @package App\Http\Controllers\API
 */

class PersonneAPIController extends AppBaseController
{
    /** @var  PersonneRepository */
    private $personneRepository;

    public function __construct(PersonneRepository $personneRepo)
    {
        $this->personneRepository = $personneRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/personnes",
     *      summary="Get a listing of the Personnes.",
     *      tags={"Personne"},
     *      description="Get all Personnes",
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
     *                  @SWG\Items(ref="#/definitions/Personne")
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
        $personnes = $this->personneRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(PersonneResource::collection($personnes), 'Personnes retrieved successfully');
    }

    /**
     * @param CreatePersonneAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/personnes",
     *      summary="Store a newly created Personne in storage",
     *      tags={"Personne"},
     *      description="Store Personne",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Personne that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Personne")
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
     *                  ref="#/definitions/Personne"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePersonneAPIRequest $request)
    {
        $input = $request->all();

        $personne = $this->personneRepository->create($input);

        return $this->sendResponse(new PersonneResource($personne), 'Personne saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/personnes/{id}",
     *      summary="Display the specified Personne",
     *      tags={"Personne"},
     *      description="Get Personne",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Personne",
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
     *                  ref="#/definitions/Personne"
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
        /** @var Personne $personne */
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            return $this->sendError('Personne not found');
        }

        return $this->sendResponse(new PersonneResource($personne), 'Personne retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePersonneAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/personnes/{id}",
     *      summary="Update the specified Personne in storage",
     *      tags={"Personne"},
     *      description="Update Personne",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Personne",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Personne that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Personne")
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
     *                  ref="#/definitions/Personne"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePersonneAPIRequest $request)
    {
        $input = $request->all();

        /** @var Personne $personne */
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            return $this->sendError('Personne not found');
        }

        $personne = $this->personneRepository->update($input, $id);

        return $this->sendResponse(new PersonneResource($personne), 'Personne updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/personnes/{id}",
     *      summary="Remove the specified Personne from storage",
     *      tags={"Personne"},
     *      description="Delete Personne",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Personne",
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
        /** @var Personne $personne */
        $personne = $this->personneRepository->find($id);

        if (empty($personne)) {
            return $this->sendError('Personne not found');
        }

        $personne->delete();

        return $this->sendSuccess('Personne deleted successfully');
    }
}
