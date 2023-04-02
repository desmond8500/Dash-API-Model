<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProjetContactAPIRequest;
use App\Http\Requests\API\UpdateProjetContactAPIRequest;
use App\Models\ProjetContact;
use App\Repositories\ProjetContactRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ProjetContactResource;
use Response;

/**
 * Class ProjetContactController
 * @package App\Http\Controllers\API
 */

class ProjetContactAPIController extends AppBaseController
{
    /** @var  ProjetContactRepository */
    private $projetContactRepository;

    public function __construct(ProjetContactRepository $projetContactRepo)
    {
        $this->projetContactRepository = $projetContactRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/projetContacts",
     *      summary="Get a listing of the ProjetContacts.",
     *      tags={"ProjetContact"},
     *      description="Get all ProjetContacts",
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
     *                  @SWG\Items(ref="#/definitions/ProjetContact")
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
        $projetContacts = $this->projetContactRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ProjetContactResource::collection($projetContacts), 'Projet Contacts retrieved successfully');
    }

    /**
     * @param CreateProjetContactAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/projetContacts",
     *      summary="Store a newly created ProjetContact in storage",
     *      tags={"ProjetContact"},
     *      description="Store ProjetContact",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjetContact that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjetContact")
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
     *                  ref="#/definitions/ProjetContact"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProjetContactAPIRequest $request)
    {
        $input = $request->all();

        $projetContact = $this->projetContactRepository->create($input);

        return $this->sendResponse(new ProjetContactResource($projetContact), 'Projet Contact saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/projetContacts/{id}",
     *      summary="Display the specified ProjetContact",
     *      tags={"ProjetContact"},
     *      description="Get ProjetContact",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjetContact",
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
     *                  ref="#/definitions/ProjetContact"
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
        /** @var ProjetContact $projetContact */
        $projetContact = $this->projetContactRepository->find($id);

        if (empty($projetContact)) {
            return $this->sendError('Projet Contact not found');
        }

        return $this->sendResponse(new ProjetContactResource($projetContact), 'Projet Contact retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProjetContactAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/projetContacts/{id}",
     *      summary="Update the specified ProjetContact in storage",
     *      tags={"ProjetContact"},
     *      description="Update ProjetContact",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjetContact",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ProjetContact that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ProjetContact")
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
     *                  ref="#/definitions/ProjetContact"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProjetContactAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProjetContact $projetContact */
        $projetContact = $this->projetContactRepository->find($id);

        if (empty($projetContact)) {
            return $this->sendError('Projet Contact not found');
        }

        $projetContact = $this->projetContactRepository->update($input, $id);

        return $this->sendResponse(new ProjetContactResource($projetContact), 'ProjetContact updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/projetContacts/{id}",
     *      summary="Remove the specified ProjetContact from storage",
     *      tags={"ProjetContact"},
     *      description="Delete ProjetContact",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ProjetContact",
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
        /** @var ProjetContact $projetContact */
        $projetContact = $this->projetContactRepository->find($id);

        if (empty($projetContact)) {
            return $this->sendError('Projet Contact not found');
        }

        $projetContact->delete();

        return $this->sendSuccess('Projet Contact deleted successfully');
    }
}
