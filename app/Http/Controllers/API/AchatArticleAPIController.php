<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAchatArticleAPIRequest;
use App\Http\Requests\API\UpdateAchatArticleAPIRequest;
use App\Models\AchatArticle;
use App\Repositories\AchatArticleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AchatArticleResource;
use Response;

/**
 * Class AchatArticleController
 * @package App\Http\Controllers\API
 */

class AchatArticleAPIController extends AppBaseController
{
    /** @var  AchatArticleRepository */
    private $achatArticleRepository;

    public function __construct(AchatArticleRepository $achatArticleRepo)
    {
        $this->achatArticleRepository = $achatArticleRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/achatArticles",
     *      summary="Get a listing of the AchatArticles.",
     *      tags={"AchatArticle"},
     *      description="Get all AchatArticles",
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
     *                  @SWG\Items(ref="#/definitions/AchatArticle")
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
        $achatArticles = $this->achatArticleRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AchatArticleResource::collection($achatArticles), 'Achat Articles retrieved successfully');
    }

    /**
     * @param CreateAchatArticleAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/achatArticles",
     *      summary="Store a newly created AchatArticle in storage",
     *      tags={"AchatArticle"},
     *      description="Store AchatArticle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AchatArticle that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AchatArticle")
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
     *                  ref="#/definitions/AchatArticle"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAchatArticleAPIRequest $request)
    {
        $input = $request->all();

        $achatArticle = $this->achatArticleRepository->create($input);

        return $this->sendResponse(new AchatArticleResource($achatArticle), 'Achat Article saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/achatArticles/{id}",
     *      summary="Display the specified AchatArticle",
     *      tags={"AchatArticle"},
     *      description="Get AchatArticle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AchatArticle",
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
     *                  ref="#/definitions/AchatArticle"
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
        /** @var AchatArticle $achatArticle */
        $achatArticle = $this->achatArticleRepository->find($id);

        if (empty($achatArticle)) {
            return $this->sendError('Achat Article not found');
        }

        return $this->sendResponse(new AchatArticleResource($achatArticle), 'Achat Article retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAchatArticleAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/achatArticles/{id}",
     *      summary="Update the specified AchatArticle in storage",
     *      tags={"AchatArticle"},
     *      description="Update AchatArticle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AchatArticle",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AchatArticle that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AchatArticle")
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
     *                  ref="#/definitions/AchatArticle"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAchatArticleAPIRequest $request)
    {
        $input = $request->all();

        /** @var AchatArticle $achatArticle */
        $achatArticle = $this->achatArticleRepository->find($id);

        if (empty($achatArticle)) {
            return $this->sendError('Achat Article not found');
        }

        $achatArticle = $this->achatArticleRepository->update($input, $id);

        return $this->sendResponse(new AchatArticleResource($achatArticle), 'AchatArticle updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/achatArticles/{id}",
     *      summary="Remove the specified AchatArticle from storage",
     *      tags={"AchatArticle"},
     *      description="Delete AchatArticle",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AchatArticle",
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
        /** @var AchatArticle $achatArticle */
        $achatArticle = $this->achatArticleRepository->find($id);

        if (empty($achatArticle)) {
            return $this->sendError('Achat Article not found');
        }

        $achatArticle->delete();

        return $this->sendSuccess('Achat Article deleted successfully');
    }
}
