<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAvancementAPIRequest;
use App\Http\Requests\API\UpdateAvancementAPIRequest;
use App\Models\Avancement;
use App\Repositories\AvancementRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AvancementResource;
use Response;

/**
 * Class AvancementController
 * @package App\Http\Controllers\API
 */

class AvancementAPIController extends AppBaseController
{
    /** @var  AvancementRepository */
    private $avancementRepository;

    public function __construct(AvancementRepository $avancementRepo)
    {
        $this->avancementRepository = $avancementRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/avancements",
     *      summary="Get a listing of the Avancements.",
     *      tags={"Avancement"},
     *      description="Get all Avancements",
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
     *                  @SWG\Items(ref="#/definitions/Avancement")
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
        $avancements = $this->avancementRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AvancementResource::collection($avancements), 'Avancements retrieved successfully');
    }

    /**
     * @param CreateAvancementAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/avancements",
     *      summary="Store a newly created Avancement in storage",
     *      tags={"Avancement"},
     *      description="Store Avancement",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Avancement that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Avancement")
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
     *                  ref="#/definitions/Avancement"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAvancementAPIRequest $request)
    {
        $input = $request->all();

        $avancement = $this->avancementRepository->create($input);

        return $this->sendResponse(new AvancementResource($avancement), 'Avancement saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/avancements/{id}",
     *      summary="Display the specified Avancement",
     *      tags={"Avancement"},
     *      description="Get Avancement",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Avancement",
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
     *                  ref="#/definitions/Avancement"
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
        /** @var Avancement $avancement */
        $avancement = $this->avancementRepository->find($id);

        if (empty($avancement)) {
            return $this->sendError('Avancement not found');
        }

        return $this->sendResponse(new AvancementResource($avancement), 'Avancement retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAvancementAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/avancements/{id}",
     *      summary="Update the specified Avancement in storage",
     *      tags={"Avancement"},
     *      description="Update Avancement",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Avancement",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Avancement that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Avancement")
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
     *                  ref="#/definitions/Avancement"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAvancementAPIRequest $request)
    {
        $input = $request->all();

        /** @var Avancement $avancement */
        $avancement = $this->avancementRepository->find($id);

        if (empty($avancement)) {
            return $this->sendError('Avancement not found');
        }

        $avancement = $this->avancementRepository->update($input, $id);

        return $this->sendResponse(new AvancementResource($avancement), 'Avancement updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/avancements/{id}",
     *      summary="Remove the specified Avancement from storage",
     *      tags={"Avancement"},
     *      description="Delete Avancement",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Avancement",
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
        /** @var Avancement $avancement */
        $avancement = $this->avancementRepository->find($id);

        if (empty($avancement)) {
            return $this->sendError('Avancement not found');
        }

        $avancement->delete();

        return $this->sendSuccess('Avancement deleted successfully');
    }
}
