<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateArticleDocAPIRequest;
use App\Http\Requests\API\UpdateArticleDocAPIRequest;
use App\Models\ArticleDoc;
use App\Repositories\ArticleDocRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ArticleDocResource;
use Response;

/**
 * Class ArticleDocController
 * @package App\Http\Controllers\API
 */

class ArticleDocAPIController extends AppBaseController
{
    /** @var  ArticleDocRepository */
    private $articleDocRepository;

    public function __construct(ArticleDocRepository $articleDocRepo)
    {
        $this->articleDocRepository = $articleDocRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/articleDocs",
     *      summary="Get a listing of the ArticleDocs.",
     *      tags={"ArticleDoc"},
     *      description="Get all ArticleDocs",
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
     *                  @SWG\Items(ref="#/definitions/ArticleDoc")
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
        $articleDocs = $this->articleDocRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ArticleDocResource::collection($articleDocs), 'Article Docs retrieved successfully');
    }

    /**
     * @param CreateArticleDocAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/articleDocs",
     *      summary="Store a newly created ArticleDoc in storage",
     *      tags={"ArticleDoc"},
     *      description="Store ArticleDoc",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ArticleDoc that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ArticleDoc")
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
     *                  ref="#/definitions/ArticleDoc"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateArticleDocAPIRequest $request)
    {
        $input = $request->all();

        $articleDoc = $this->articleDocRepository->create($input);

        return $this->sendResponse(new ArticleDocResource($articleDoc), 'Article Doc saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/articleDocs/{id}",
     *      summary="Display the specified ArticleDoc",
     *      tags={"ArticleDoc"},
     *      description="Get ArticleDoc",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ArticleDoc",
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
     *                  ref="#/definitions/ArticleDoc"
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
        /** @var ArticleDoc $articleDoc */
        $articleDoc = $this->articleDocRepository->find($id);

        if (empty($articleDoc)) {
            return $this->sendError('Article Doc not found');
        }

        return $this->sendResponse(new ArticleDocResource($articleDoc), 'Article Doc retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateArticleDocAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/articleDocs/{id}",
     *      summary="Update the specified ArticleDoc in storage",
     *      tags={"ArticleDoc"},
     *      description="Update ArticleDoc",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ArticleDoc",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ArticleDoc that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ArticleDoc")
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
     *                  ref="#/definitions/ArticleDoc"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateArticleDocAPIRequest $request)
    {
        $input = $request->all();

        /** @var ArticleDoc $articleDoc */
        $articleDoc = $this->articleDocRepository->find($id);

        if (empty($articleDoc)) {
            return $this->sendError('Article Doc not found');
        }

        $articleDoc = $this->articleDocRepository->update($input, $id);

        return $this->sendResponse(new ArticleDocResource($articleDoc), 'ArticleDoc updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/articleDocs/{id}",
     *      summary="Remove the specified ArticleDoc from storage",
     *      tags={"ArticleDoc"},
     *      description="Delete ArticleDoc",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ArticleDoc",
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
        /** @var ArticleDoc $articleDoc */
        $articleDoc = $this->articleDocRepository->find($id);

        if (empty($articleDoc)) {
            return $this->sendError('Article Doc not found');
        }

        $articleDoc->delete();

        return $this->sendSuccess('Article Doc deleted successfully');
    }
}
