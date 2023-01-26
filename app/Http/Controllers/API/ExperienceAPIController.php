<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateExperienceAPIRequest;
use App\Http\Requests\API\UpdateExperienceAPIRequest;
use App\Models\Experience;
use App\Repositories\ExperienceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ExperienceResource;
use Response;

/**
 * Class ExperienceController
 * @package App\Http\Controllers\API
 */

class ExperienceAPIController extends AppBaseController
{
    /** @var  ExperienceRepository */
    private $experienceRepository;

    public function __construct(ExperienceRepository $experienceRepo)
    {
        $this->experienceRepository = $experienceRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/experiences",
     *      summary="Get a listing of the Experiences.",
     *      tags={"Experience"},
     *      description="Get all Experiences",
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
     *                  @SWG\Items(ref="#/definitions/Experience")
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
        $experiences = $this->experienceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ExperienceResource::collection($experiences), 'Experiences retrieved successfully');
    }

    /**
     * @param CreateExperienceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/experiences",
     *      summary="Store a newly created Experience in storage",
     *      tags={"Experience"},
     *      description="Store Experience",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Experience that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Experience")
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
     *                  ref="#/definitions/Experience"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateExperienceAPIRequest $request)
    {
        $input = $request->all();

        $experience = $this->experienceRepository->create($input);

        return $this->sendResponse(new ExperienceResource($experience), 'Experience saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/experiences/{id}",
     *      summary="Display the specified Experience",
     *      tags={"Experience"},
     *      description="Get Experience",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Experience",
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
     *                  ref="#/definitions/Experience"
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
        /** @var Experience $experience */
        $experience = $this->experienceRepository->find($id);

        if (empty($experience)) {
            return $this->sendError('Experience not found');
        }

        return $this->sendResponse(new ExperienceResource($experience), 'Experience retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateExperienceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/experiences/{id}",
     *      summary="Update the specified Experience in storage",
     *      tags={"Experience"},
     *      description="Update Experience",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Experience",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Experience that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Experience")
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
     *                  ref="#/definitions/Experience"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateExperienceAPIRequest $request)
    {
        $input = $request->all();

        /** @var Experience $experience */
        $experience = $this->experienceRepository->find($id);

        if (empty($experience)) {
            return $this->sendError('Experience not found');
        }

        $experience = $this->experienceRepository->update($input, $id);

        return $this->sendResponse(new ExperienceResource($experience), 'Experience updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/experiences/{id}",
     *      summary="Remove the specified Experience from storage",
     *      tags={"Experience"},
     *      description="Delete Experience",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Experience",
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
        /** @var Experience $experience */
        $experience = $this->experienceRepository->find($id);

        if (empty($experience)) {
            return $this->sendError('Experience not found');
        }

        $experience->delete();

        return $this->sendSuccess('Experience deleted successfully');
    }
}
