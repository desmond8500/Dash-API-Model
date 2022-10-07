<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContactMailAPIRequest;
use App\Http\Requests\API\UpdateContactMailAPIRequest;
use App\Models\ContactMail;
use App\Repositories\ContactMailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ContactMailResource;
use Response;

/**
 * Class ContactMailController
 * @package App\Http\Controllers\API
 */

class ContactMailAPIController extends AppBaseController
{
    /** @var  ContactMailRepository */
    private $contactMailRepository;

    public function __construct(ContactMailRepository $contactMailRepo)
    {
        $this->contactMailRepository = $contactMailRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contactMails",
     *      summary="Get a listing of the ContactMails.",
     *      tags={"ContactMail"},
     *      description="Get all ContactMails",
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
     *                  @SWG\Items(ref="#/definitions/ContactMail")
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
        $contactMails = $this->contactMailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ContactMailResource::collection($contactMails), 'Contact Mails retrieved successfully');
    }

    /**
     * @param CreateContactMailAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contactMails",
     *      summary="Store a newly created ContactMail in storage",
     *      tags={"ContactMail"},
     *      description="Store ContactMail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContactMail that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContactMail")
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
     *                  ref="#/definitions/ContactMail"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateContactMailAPIRequest $request)
    {
        $input = $request->all();

        $contactMail = $this->contactMailRepository->create($input);

        return $this->sendResponse(new ContactMailResource($contactMail), 'Contact Mail saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/contactMails/{id}",
     *      summary="Display the specified ContactMail",
     *      tags={"ContactMail"},
     *      description="Get ContactMail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContactMail",
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
     *                  ref="#/definitions/ContactMail"
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
        /** @var ContactMail $contactMail */
        $contactMail = $this->contactMailRepository->find($id);

        if (empty($contactMail)) {
            return $this->sendError('Contact Mail not found');
        }

        return $this->sendResponse(new ContactMailResource($contactMail), 'Contact Mail retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateContactMailAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contactMails/{id}",
     *      summary="Update the specified ContactMail in storage",
     *      tags={"ContactMail"},
     *      description="Update ContactMail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContactMail",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContactMail that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContactMail")
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
     *                  ref="#/definitions/ContactMail"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateContactMailAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContactMail $contactMail */
        $contactMail = $this->contactMailRepository->find($id);

        if (empty($contactMail)) {
            return $this->sendError('Contact Mail not found');
        }

        $contactMail = $this->contactMailRepository->update($input, $id);

        return $this->sendResponse(new ContactMailResource($contactMail), 'ContactMail updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contactMails/{id}",
     *      summary="Remove the specified ContactMail from storage",
     *      tags={"ContactMail"},
     *      description="Delete ContactMail",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContactMail",
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
        /** @var ContactMail $contactMail */
        $contactMail = $this->contactMailRepository->find($id);

        if (empty($contactMail)) {
            return $this->sendError('Contact Mail not found');
        }

        $contactMail->delete();

        return $this->sendSuccess('Contact Mail deleted successfully');
    }
}
