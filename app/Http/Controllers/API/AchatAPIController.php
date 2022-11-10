<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAchatAPIRequest;
use App\Http\Requests\API\UpdateAchatAPIRequest;
use App\Models\Achat;
use App\Repositories\AchatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AchatResource;
use Response;

/**
 * Class AchatController
 * @package App\Http\Controllers\API
 */

class AchatAPIController extends AppBaseController
{
    /** @var  AchatRepository */
    private $achatRepository;

    public function __construct(AchatRepository $achatRepo)
    {
        $this->achatRepository = $achatRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/achats",
     *      summary="Get a listing of the Achats.",
     *      tags={"Achat"},
     *      description="Get all Achats",
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
     *                  @SWG\Items(ref="#/definitions/Achat")
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
        $achats = $this->achatRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AchatResource::collection($achats), 'Achats retrieved successfully');
    }

    /**
     * @param CreateAchatAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/achats",
     *      summary="Store a newly created Achat in storage",
     *      tags={"Achat"},
     *      description="Store Achat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Achat that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Achat")
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
     *                  ref="#/definitions/Achat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAchatAPIRequest $request)
    {
        $input = $request->all();

        $achat = $this->achatRepository->create($input);

        return $this->sendResponse(new AchatResource($achat), 'Achat saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/achats/{id}",
     *      summary="Display the specified Achat",
     *      tags={"Achat"},
     *      description="Get Achat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Achat",
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
     *                  ref="#/definitions/Achat"
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
        /** @var Achat $achat */
        $achat = $this->achatRepository->find($id);

        if (empty($achat)) {
            return $this->sendError('Achat not found');
        }

        return $this->sendResponse(new AchatResource($achat), 'Achat retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAchatAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/achats/{id}",
     *      summary="Update the specified Achat in storage",
     *      tags={"Achat"},
     *      description="Update Achat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Achat",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Achat that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Achat")
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
     *                  ref="#/definitions/Achat"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAchatAPIRequest $request)
    {
        $input = $request->all();

        /** @var Achat $achat */
        $achat = $this->achatRepository->find($id);

        if (empty($achat)) {
            return $this->sendError('Achat not found');
        }

        $achat = $this->achatRepository->update($input, $id);

        return $this->sendResponse(new AchatResource($achat), 'Achat updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/achats/{id}",
     *      summary="Remove the specified Achat from storage",
     *      tags={"Achat"},
     *      description="Delete Achat",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Achat",
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
        /** @var Achat $achat */
        $achat = $this->achatRepository->find($id);

        if (empty($achat)) {
            return $this->sendError('Achat not found');
        }

        $achat->delete();

        return $this->sendSuccess('Achat deleted successfully');
    }
}
