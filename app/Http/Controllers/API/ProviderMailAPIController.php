<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProviderMailAPIRequest;
use App\Http\Requests\API\UpdateProviderMailAPIRequest;
use App\Models\ProviderMail;
use App\Repositories\ProviderMailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ProviderMailResource;
use Response;

/**
 * Class ProviderMailController
 * @package App\Http\Controllers\API
 */

class ProviderMailAPIController extends AppBaseController
{
    /** @var  ProviderMailRepository */
    private $providerMailRepository;

    public function __construct(ProviderMailRepository $providerMailRepo)
    {
        $this->providerMailRepository = $providerMailRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/providerMails",
     *      summary="Get a listing of the ProviderMails.",
     *      tags={"ProviderMail"},
     *      description="Get all ProviderMails",
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
     *                  @SWG\Items(ref="#/definitions/ProviderMail")
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
        $providerMails = $this->providerMailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ProviderMailResource::collection($providerMails), 'Provider Mails retrieved successfully');
    }

    /**
     * @param CreateProviderMailAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/providerMails",
     *      summary="Store a newly created ProviderMail in storage",
     *      tags={"ProviderMail"},
     *      description="Store ProviderMail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProviderMail that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProviderMail")
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
     *                  ref="#/definitions/ProviderMail"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProviderMailAPIRequest $request)
    {
        $input = $request->all();

        $providerMail = $this->providerMailRepository->create($input);

        return $this->sendResponse(new ProviderMailResource($providerMail), 'Provider Mail saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/providerMails/{id}",
     *      summary="Display the specified ProviderMail",
     *      tags={"ProviderMail"},
     *      description="Get ProviderMail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProviderMail",
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
     *                  ref="#/definitions/ProviderMail"
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
        /** @var ProviderMail $providerMail */
        $providerMail = $this->providerMailRepository->find($id);

        if (empty($providerMail)) {
            return $this->sendError('Provider Mail not found');
        }

        return $this->sendResponse(new ProviderMailResource($providerMail), 'Provider Mail retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProviderMailAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/providerMails/{id}",
     *      summary="Update the specified ProviderMail in storage",
     *      tags={"ProviderMail"},
     *      description="Update ProviderMail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProviderMail",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProviderMail that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProviderMail")
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
     *                  ref="#/definitions/ProviderMail"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProviderMailAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProviderMail $providerMail */
        $providerMail = $this->providerMailRepository->find($id);

        if (empty($providerMail)) {
            return $this->sendError('Provider Mail not found');
        }

        $providerMail = $this->providerMailRepository->update($input, $id);

        return $this->sendResponse(new ProviderMailResource($providerMail), 'ProviderMail updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/providerMails/{id}",
     *      summary="Remove the specified ProviderMail from storage",
     *      tags={"ProviderMail"},
     *      description="Delete ProviderMail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProviderMail",
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
        /** @var ProviderMail $providerMail */
        $providerMail = $this->providerMailRepository->find($id);

        if (empty($providerMail)) {
            return $this->sendError('Provider Mail not found');
        }

        $providerMail->delete();

        return $this->sendSuccess('Provider Mail deleted successfully');
    }
}
