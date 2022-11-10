<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProviderTelAPIRequest;
use App\Http\Requests\API\UpdateProviderTelAPIRequest;
use App\Models\ProviderTel;
use App\Repositories\ProviderTelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ProviderTelResource;
use Response;

/**
 * Class ProviderTelController
 * @package App\Http\Controllers\API
 */

class ProviderTelAPIController extends AppBaseController
{
    /** @var  ProviderTelRepository */
    private $providerTelRepository;

    public function __construct(ProviderTelRepository $providerTelRepo)
    {
        $this->providerTelRepository = $providerTelRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/providerTels",
     *      summary="Get a listing of the ProviderTels.",
     *      tags={"ProviderTel"},
     *      description="Get all ProviderTels",
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
     *                  @SWG\Items(ref="#/definitions/ProviderTel")
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
        $providerTels = $this->providerTelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ProviderTelResource::collection($providerTels), 'Provider Tels retrieved successfully');
    }

    /**
     * @param CreateProviderTelAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/providerTels",
     *      summary="Store a newly created ProviderTel in storage",
     *      tags={"ProviderTel"},
     *      description="Store ProviderTel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProviderTel that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProviderTel")
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
     *                  ref="#/definitions/ProviderTel"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProviderTelAPIRequest $request)
    {
        $input = $request->all();

        $providerTel = $this->providerTelRepository->create($input);

        return $this->sendResponse(new ProviderTelResource($providerTel), 'Provider Tel saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/providerTels/{id}",
     *      summary="Display the specified ProviderTel",
     *      tags={"ProviderTel"},
     *      description="Get ProviderTel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProviderTel",
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
     *                  ref="#/definitions/ProviderTel"
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
        /** @var ProviderTel $providerTel */
        $providerTel = $this->providerTelRepository->find($id);

        if (empty($providerTel)) {
            return $this->sendError('Provider Tel not found');
        }

        return $this->sendResponse(new ProviderTelResource($providerTel), 'Provider Tel retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProviderTelAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/providerTels/{id}",
     *      summary="Update the specified ProviderTel in storage",
     *      tags={"ProviderTel"},
     *      description="Update ProviderTel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProviderTel",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProviderTel that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProviderTel")
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
     *                  ref="#/definitions/ProviderTel"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProviderTelAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProviderTel $providerTel */
        $providerTel = $this->providerTelRepository->find($id);

        if (empty($providerTel)) {
            return $this->sendError('Provider Tel not found');
        }

        $providerTel = $this->providerTelRepository->update($input, $id);

        return $this->sendResponse(new ProviderTelResource($providerTel), 'ProviderTel updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/providerTels/{id}",
     *      summary="Remove the specified ProviderTel from storage",
     *      tags={"ProviderTel"},
     *      description="Delete ProviderTel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProviderTel",
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
        /** @var ProviderTel $providerTel */
        $providerTel = $this->providerTelRepository->find($id);

        if (empty($providerTel)) {
            return $this->sendError('Provider Tel not found');
        }

        $providerTel->delete();

        return $this->sendSuccess('Provider Tel deleted successfully');
    }
}
