<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCompetenceAPIRequest;
use App\Http\Requests\API\UpdateCompetenceAPIRequest;
use App\Models\Competence;
use App\Repositories\CompetenceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CompetenceResource;
use Response;

/**
 * Class CompetenceController
 * @package App\Http\Controllers\API
 */

class CompetenceAPIController extends AppBaseController
{
    /** @var  CompetenceRepository */
    private $competenceRepository;

    public function __construct(CompetenceRepository $competenceRepo)
    {
        $this->competenceRepository = $competenceRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/competences",
     *      summary="Get a listing of the Competences.",
     *      tags={"Competence"},
     *      description="Get all Competences",
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
     *                  @SWG\Items(ref="#/definitions/Competence")
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
        $competences = $this->competenceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CompetenceResource::collection($competences), 'Competences retrieved successfully');
    }

    /**
     * @param CreateCompetenceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/competences",
     *      summary="Store a newly created Competence in storage",
     *      tags={"Competence"},
     *      description="Store Competence",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Competence that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Competence")
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
     *                  ref="#/definitions/Competence"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCompetenceAPIRequest $request)
    {
        $input = $request->all();

        $competence = $this->competenceRepository->create($input);

        return $this->sendResponse(new CompetenceResource($competence), 'Competence saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/competences/{id}",
     *      summary="Display the specified Competence",
     *      tags={"Competence"},
     *      description="Get Competence",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Competence",
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
     *                  ref="#/definitions/Competence"
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
        /** @var Competence $competence */
        $competence = $this->competenceRepository->find($id);

        if (empty($competence)) {
            return $this->sendError('Competence not found');
        }

        return $this->sendResponse(new CompetenceResource($competence), 'Competence retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCompetenceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/competences/{id}",
     *      summary="Update the specified Competence in storage",
     *      tags={"Competence"},
     *      description="Update Competence",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Competence",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Competence that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Competence")
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
     *                  ref="#/definitions/Competence"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCompetenceAPIRequest $request)
    {
        $input = $request->all();

        /** @var Competence $competence */
        $competence = $this->competenceRepository->find($id);

        if (empty($competence)) {
            return $this->sendError('Competence not found');
        }

        $competence = $this->competenceRepository->update($input, $id);

        return $this->sendResponse(new CompetenceResource($competence), 'Competence updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/competences/{id}",
     *      summary="Remove the specified Competence from storage",
     *      tags={"Competence"},
     *      description="Delete Competence",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Competence",
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
        /** @var Competence $competence */
        $competence = $this->competenceRepository->find($id);

        if (empty($competence)) {
            return $this->sendError('Competence not found');
        }

        $competence->delete();

        return $this->sendSuccess('Competence deleted successfully');
    }
}
