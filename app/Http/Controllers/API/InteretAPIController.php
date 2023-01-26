<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInteretAPIRequest;
use App\Http\Requests\API\UpdateInteretAPIRequest;
use App\Models\Interet;
use App\Repositories\InteretRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\InteretResource;
use Response;

/**
 * Class InteretController
 * @package App\Http\Controllers\API
 */

class InteretAPIController extends AppBaseController
{
    /** @var  InteretRepository */
    private $interetRepository;

    public function __construct(InteretRepository $interetRepo)
    {
        $this->interetRepository = $interetRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/interets",
     *      summary="Get a listing of the Interets.",
     *      tags={"Interet"},
     *      description="Get all Interets",
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
     *                  @SWG\Items(ref="#/definitions/Interet")
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
        $interets = $this->interetRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(InteretResource::collection($interets), 'Interets retrieved successfully');
    }

    /**
     * @param CreateInteretAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/interets",
     *      summary="Store a newly created Interet in storage",
     *      tags={"Interet"},
     *      description="Store Interet",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Interet that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Interet")
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
     *                  ref="#/definitions/Interet"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInteretAPIRequest $request)
    {
        $input = $request->all();

        $interet = $this->interetRepository->create($input);

        return $this->sendResponse(new InteretResource($interet), 'Interet saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/interets/{id}",
     *      summary="Display the specified Interet",
     *      tags={"Interet"},
     *      description="Get Interet",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Interet",
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
     *                  ref="#/definitions/Interet"
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
        /** @var Interet $interet */
        $interet = $this->interetRepository->find($id);

        if (empty($interet)) {
            return $this->sendError('Interet not found');
        }

        return $this->sendResponse(new InteretResource($interet), 'Interet retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInteretAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/interets/{id}",
     *      summary="Update the specified Interet in storage",
     *      tags={"Interet"},
     *      description="Update Interet",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Interet",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Interet that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Interet")
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
     *                  ref="#/definitions/Interet"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInteretAPIRequest $request)
    {
        $input = $request->all();

        /** @var Interet $interet */
        $interet = $this->interetRepository->find($id);

        if (empty($interet)) {
            return $this->sendError('Interet not found');
        }

        $interet = $this->interetRepository->update($input, $id);

        return $this->sendResponse(new InteretResource($interet), 'Interet updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/interets/{id}",
     *      summary="Remove the specified Interet from storage",
     *      tags={"Interet"},
     *      description="Delete Interet",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Interet",
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
        /** @var Interet $interet */
        $interet = $this->interetRepository->find($id);

        if (empty($interet)) {
            return $this->sendError('Interet not found');
        }

        $interet->delete();

        return $this->sendSuccess('Interet deleted successfully');
    }
}
