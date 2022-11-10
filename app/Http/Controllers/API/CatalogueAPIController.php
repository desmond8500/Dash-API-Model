<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCatalogueAPIRequest;
use App\Http\Requests\API\UpdateCatalogueAPIRequest;
use App\Models\Catalogue;
use App\Repositories\CatalogueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CatalogueResource;
use Response;

/**
 * Class CatalogueController
 * @package App\Http\Controllers\API
 */

class CatalogueAPIController extends AppBaseController
{
    /** @var  CatalogueRepository */
    private $catalogueRepository;

    public function __construct(CatalogueRepository $catalogueRepo)
    {
        $this->catalogueRepository = $catalogueRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/catalogues",
     *      summary="Get a listing of the Catalogues.",
     *      tags={"Catalogue"},
     *      description="Get all Catalogues",
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
     *                  @SWG\Items(ref="#/definitions/Catalogue")
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
        $catalogues = $this->catalogueRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CatalogueResource::collection($catalogues), 'Catalogues retrieved successfully');
    }

    /**
     * @param CreateCatalogueAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/catalogues",
     *      summary="Store a newly created Catalogue in storage",
     *      tags={"Catalogue"},
     *      description="Store Catalogue",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Catalogue that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Catalogue")
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
     *                  ref="#/definitions/Catalogue"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCatalogueAPIRequest $request)
    {
        $input = $request->all();

        $catalogue = $this->catalogueRepository->create($input);

        return $this->sendResponse(new CatalogueResource($catalogue), 'Catalogue saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/catalogues/{id}",
     *      summary="Display the specified Catalogue",
     *      tags={"Catalogue"},
     *      description="Get Catalogue",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Catalogue",
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
     *                  ref="#/definitions/Catalogue"
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
        /** @var Catalogue $catalogue */
        $catalogue = $this->catalogueRepository->find($id);

        if (empty($catalogue)) {
            return $this->sendError('Catalogue not found');
        }

        return $this->sendResponse(new CatalogueResource($catalogue), 'Catalogue retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCatalogueAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/catalogues/{id}",
     *      summary="Update the specified Catalogue in storage",
     *      tags={"Catalogue"},
     *      description="Update Catalogue",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Catalogue",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Catalogue that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Catalogue")
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
     *                  ref="#/definitions/Catalogue"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCatalogueAPIRequest $request)
    {
        $input = $request->all();

        /** @var Catalogue $catalogue */
        $catalogue = $this->catalogueRepository->find($id);

        if (empty($catalogue)) {
            return $this->sendError('Catalogue not found');
        }

        $catalogue = $this->catalogueRepository->update($input, $id);

        return $this->sendResponse(new CatalogueResource($catalogue), 'Catalogue updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/catalogues/{id}",
     *      summary="Remove the specified Catalogue from storage",
     *      tags={"Catalogue"},
     *      description="Delete Catalogue",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Catalogue",
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
        /** @var Catalogue $catalogue */
        $catalogue = $this->catalogueRepository->find($id);

        if (empty($catalogue)) {
            return $this->sendError('Catalogue not found');
        }

        $catalogue->delete();

        return $this->sendSuccess('Catalogue deleted successfully');
    }
}
