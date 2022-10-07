<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContactTelAPIRequest;
use App\Http\Requests\API\UpdateContactTelAPIRequest;
use App\Models\ContactTel;
use App\Repositories\ContactTelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ContactTelResource;
use Response;

/**
 * Class ContactTelController
 * @package App\Http\Controllers\API
 */

class ContactTelAPIController extends AppBaseController
{
    /** @var  ContactTelRepository */
    private $contactTelRepository;

    public function __construct(ContactTelRepository $contactTelRepo)
    {
        $this->contactTelRepository = $contactTelRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contactTels",
     *      summary="Get a listing of the ContactTels.",
     *      tags={"ContactTel"},
     *      description="Get all ContactTels",
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
     *                  @SWG\Items(ref="#/definitions/ContactTel")
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
        $contactTels = $this->contactTelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ContactTelResource::collection($contactTels), 'Contact Tels retrieved successfully');
    }

    /**
     * @param CreateContactTelAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contactTels",
     *      summary="Store a newly created ContactTel in storage",
     *      tags={"ContactTel"},
     *      description="Store ContactTel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContactTel that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContactTel")
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
     *                  ref="#/definitions/ContactTel"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateContactTelAPIRequest $request)
    {
        $input = $request->all();

        $contactTel = $this->contactTelRepository->create($input);

        return $this->sendResponse(new ContactTelResource($contactTel), 'Contact Tel saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/contactTels/{id}",
     *      summary="Display the specified ContactTel",
     *      tags={"ContactTel"},
     *      description="Get ContactTel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContactTel",
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
     *                  ref="#/definitions/ContactTel"
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
        /** @var ContactTel $contactTel */
        $contactTel = $this->contactTelRepository->find($id);

        if (empty($contactTel)) {
            return $this->sendError('Contact Tel not found');
        }

        return $this->sendResponse(new ContactTelResource($contactTel), 'Contact Tel retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateContactTelAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contactTels/{id}",
     *      summary="Update the specified ContactTel in storage",
     *      tags={"ContactTel"},
     *      description="Update ContactTel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContactTel",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContactTel that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContactTel")
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
     *                  ref="#/definitions/ContactTel"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateContactTelAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContactTel $contactTel */
        $contactTel = $this->contactTelRepository->find($id);

        if (empty($contactTel)) {
            return $this->sendError('Contact Tel not found');
        }

        $contactTel = $this->contactTelRepository->update($input, $id);

        return $this->sendResponse(new ContactTelResource($contactTel), 'ContactTel updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contactTels/{id}",
     *      summary="Remove the specified ContactTel from storage",
     *      tags={"ContactTel"},
     *      description="Delete ContactTel",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContactTel",
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
        /** @var ContactTel $contactTel */
        $contactTel = $this->contactTelRepository->find($id);

        if (empty($contactTel)) {
            return $this->sendError('Contact Tel not found');
        }

        $contactTel->delete();

        return $this->sendSuccess('Contact Tel deleted successfully');
    }
}
