<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePersonnelAPIRequest;
use App\Http\Requests\API\UpdatePersonnelAPIRequest;
use App\Models\Personnel;
use App\Repositories\PersonnelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PersonnelResource;
use Response;

/**
 * Class PersonnelController
 * @package App\Http\Controllers\API
 */

class PersonnelAPIController extends AppBaseController
{
    /** @var  PersonnelRepository */
    private $personnelRepository;

    public function __construct(PersonnelRepository $personnelRepo)
    {
        $this->personnelRepository = $personnelRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/personnels",
     *      summary="Get a listing of the Personnels.",
     *      tags={"Personnel"},
     *      description="Get all Personnels",
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
     *                  @SWG\Items(ref="#/definitions/Personnel")
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
        $personnels = $this->personnelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(PersonnelResource::collection($personnels), 'Personnels retrieved successfully');
    }

    /**
     * @param CreatePersonnelAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/personnels",
     *      summary="Store a newly created Personnel in storage",
     *      tags={"Personnel"},
     *      description="Store Personnel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Personnel that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Personnel")
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
     *                  ref="#/definitions/Personnel"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePersonnelAPIRequest $request)
    {
        $input = $request->all();

        $personnel = $this->personnelRepository->create($input);

        return $this->sendResponse(new PersonnelResource($personnel), 'Personnel saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/personnels/{id}",
     *      summary="Display the specified Personnel",
     *      tags={"Personnel"},
     *      description="Get Personnel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Personnel",
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
     *                  ref="#/definitions/Personnel"
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
        /** @var Personnel $personnel */
        $personnel = $this->personnelRepository->find($id);

        if (empty($personnel)) {
            return $this->sendError('Personnel not found');
        }

        return $this->sendResponse(new PersonnelResource($personnel), 'Personnel retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePersonnelAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/personnels/{id}",
     *      summary="Update the specified Personnel in storage",
     *      tags={"Personnel"},
     *      description="Update Personnel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Personnel",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Personnel that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Personnel")
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
     *                  ref="#/definitions/Personnel"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePersonnelAPIRequest $request)
    {
        $input = $request->all();

        /** @var Personnel $personnel */
        $personnel = $this->personnelRepository->find($id);

        if (empty($personnel)) {
            return $this->sendError('Personnel not found');
        }

        $personnel = $this->personnelRepository->update($input, $id);

        return $this->sendResponse(new PersonnelResource($personnel), 'Personnel updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/personnels/{id}",
     *      summary="Remove the specified Personnel from storage",
     *      tags={"Personnel"},
     *      description="Delete Personnel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Personnel",
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
        /** @var Personnel $personnel */
        $personnel = $this->personnelRepository->find($id);

        if (empty($personnel)) {
            return $this->sendError('Personnel not found');
        }

        $personnel->delete();

        return $this->sendSuccess('Personnel deleted successfully');
    }
}
