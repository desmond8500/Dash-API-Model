<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFormationAPIRequest;
use App\Http\Requests\API\UpdateFormationAPIRequest;
use App\Models\Formation;
use App\Repositories\FormationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FormationResource;
use Response;

/**
 * Class FormationController
 * @package App\Http\Controllers\API
 */

class FormationAPIController extends AppBaseController
{
    /** @var  FormationRepository */
    private $formationRepository;

    public function __construct(FormationRepository $formationRepo)
    {
        $this->formationRepository = $formationRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/formations",
     *      summary="Get a listing of the Formations.",
     *      tags={"Formation"},
     *      description="Get all Formations",
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
     *                  @SWG\Items(ref="#/definitions/Formation")
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
        $formations = $this->formationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FormationResource::collection($formations), 'Formations retrieved successfully');
    }

    /**
     * @param CreateFormationAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/formations",
     *      summary="Store a newly created Formation in storage",
     *      tags={"Formation"},
     *      description="Store Formation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Formation that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Formation")
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
     *                  ref="#/definitions/Formation"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFormationAPIRequest $request)
    {
        $input = $request->all();

        $formation = $this->formationRepository->create($input);

        return $this->sendResponse(new FormationResource($formation), 'Formation saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/formations/{id}",
     *      summary="Display the specified Formation",
     *      tags={"Formation"},
     *      description="Get Formation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Formation",
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
     *                  ref="#/definitions/Formation"
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
        /** @var Formation $formation */
        $formation = $this->formationRepository->find($id);

        if (empty($formation)) {
            return $this->sendError('Formation not found');
        }

        return $this->sendResponse(new FormationResource($formation), 'Formation retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFormationAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/formations/{id}",
     *      summary="Update the specified Formation in storage",
     *      tags={"Formation"},
     *      description="Update Formation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Formation",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Formation that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Formation")
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
     *                  ref="#/definitions/Formation"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFormationAPIRequest $request)
    {
        $input = $request->all();

        /** @var Formation $formation */
        $formation = $this->formationRepository->find($id);

        if (empty($formation)) {
            return $this->sendError('Formation not found');
        }

        $formation = $this->formationRepository->update($input, $id);

        return $this->sendResponse(new FormationResource($formation), 'Formation updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/formations/{id}",
     *      summary="Remove the specified Formation from storage",
     *      tags={"Formation"},
     *      description="Delete Formation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Formation",
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
        /** @var Formation $formation */
        $formation = $this->formationRepository->find($id);

        if (empty($formation)) {
            return $this->sendError('Formation not found');
        }

        $formation->delete();

        return $this->sendSuccess('Formation deleted successfully');
    }
}
