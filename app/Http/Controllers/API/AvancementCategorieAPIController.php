<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAvancementCategorieAPIRequest;
use App\Http\Requests\API\UpdateAvancementCategorieAPIRequest;
use App\Models\AvancementCategorie;
use App\Repositories\AvancementCategorieRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AvancementCategorieResource;
use Response;

/**
 * Class AvancementCategorieController
 * @package App\Http\Controllers\API
 */

class AvancementCategorieAPIController extends AppBaseController
{
    /** @var  AvancementCategorieRepository */
    private $avancementCategorieRepository;

    public function __construct(AvancementCategorieRepository $avancementCategorieRepo)
    {
        $this->avancementCategorieRepository = $avancementCategorieRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/avancementCategories",
     *      summary="Get a listing of the AvancementCategories.",
     *      tags={"AvancementCategorie"},
     *      description="Get all AvancementCategories",
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
     *                  @SWG\Items(ref="#/definitions/AvancementCategorie")
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
        $avancementCategories = $this->avancementCategorieRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AvancementCategorieResource::collection($avancementCategories), 'Avancement Categories retrieved successfully');
    }

    /**
     * @param CreateAvancementCategorieAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/avancementCategories",
     *      summary="Store a newly created AvancementCategorie in storage",
     *      tags={"AvancementCategorie"},
     *      description="Store AvancementCategorie",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AvancementCategorie that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AvancementCategorie")
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
     *                  ref="#/definitions/AvancementCategorie"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAvancementCategorieAPIRequest $request)
    {
        $input = $request->all();

        $avancementCategorie = $this->avancementCategorieRepository->create($input);

        return $this->sendResponse(new AvancementCategorieResource($avancementCategorie), 'Avancement Categorie saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/avancementCategories/{id}",
     *      summary="Display the specified AvancementCategorie",
     *      tags={"AvancementCategorie"},
     *      description="Get AvancementCategorie",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AvancementCategorie",
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
     *                  ref="#/definitions/AvancementCategorie"
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
        /** @var AvancementCategorie $avancementCategorie */
        $avancementCategorie = $this->avancementCategorieRepository->find($id);

        if (empty($avancementCategorie)) {
            return $this->sendError('Avancement Categorie not found');
        }

        return $this->sendResponse(new AvancementCategorieResource($avancementCategorie), 'Avancement Categorie retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAvancementCategorieAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/avancementCategories/{id}",
     *      summary="Update the specified AvancementCategorie in storage",
     *      tags={"AvancementCategorie"},
     *      description="Update AvancementCategorie",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AvancementCategorie",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AvancementCategorie that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AvancementCategorie")
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
     *                  ref="#/definitions/AvancementCategorie"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAvancementCategorieAPIRequest $request)
    {
        $input = $request->all();

        /** @var AvancementCategorie $avancementCategorie */
        $avancementCategorie = $this->avancementCategorieRepository->find($id);

        if (empty($avancementCategorie)) {
            return $this->sendError('Avancement Categorie not found');
        }

        $avancementCategorie = $this->avancementCategorieRepository->update($input, $id);

        return $this->sendResponse(new AvancementCategorieResource($avancementCategorie), 'AvancementCategorie updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/avancementCategories/{id}",
     *      summary="Remove the specified AvancementCategorie from storage",
     *      tags={"AvancementCategorie"},
     *      description="Delete AvancementCategorie",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AvancementCategorie",
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
        /** @var AvancementCategorie $avancementCategorie */
        $avancementCategorie = $this->avancementCategorieRepository->find($id);

        if (empty($avancementCategorie)) {
            return $this->sendError('Avancement Categorie not found');
        }

        $avancementCategorie->delete();

        return $this->sendSuccess('Avancement Categorie deleted successfully');
    }
}
