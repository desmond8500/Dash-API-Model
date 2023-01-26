<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLangueAPIRequest;
use App\Http\Requests\API\UpdateLangueAPIRequest;
use App\Models\Langue;
use App\Repositories\LangueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\LangueResource;
use Response;

/**
 * Class LangueController
 * @package App\Http\Controllers\API
 */

class LangueAPIController extends AppBaseController
{
    /** @var  LangueRepository */
    private $langueRepository;

    public function __construct(LangueRepository $langueRepo)
    {
        $this->langueRepository = $langueRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/langues",
     *      summary="Get a listing of the Langues.",
     *      tags={"Langue"},
     *      description="Get all Langues",
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
     *                  @SWG\Items(ref="#/definitions/Langue")
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
        $langues = $this->langueRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(LangueResource::collection($langues), 'Langues retrieved successfully');
    }

    /**
     * @param CreateLangueAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/langues",
     *      summary="Store a newly created Langue in storage",
     *      tags={"Langue"},
     *      description="Store Langue",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Langue that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Langue")
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
     *                  ref="#/definitions/Langue"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateLangueAPIRequest $request)
    {
        $input = $request->all();

        $langue = $this->langueRepository->create($input);

        return $this->sendResponse(new LangueResource($langue), 'Langue saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/langues/{id}",
     *      summary="Display the specified Langue",
     *      tags={"Langue"},
     *      description="Get Langue",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Langue",
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
     *                  ref="#/definitions/Langue"
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
        /** @var Langue $langue */
        $langue = $this->langueRepository->find($id);

        if (empty($langue)) {
            return $this->sendError('Langue not found');
        }

        return $this->sendResponse(new LangueResource($langue), 'Langue retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateLangueAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/langues/{id}",
     *      summary="Update the specified Langue in storage",
     *      tags={"Langue"},
     *      description="Update Langue",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Langue",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Langue that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Langue")
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
     *                  ref="#/definitions/Langue"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateLangueAPIRequest $request)
    {
        $input = $request->all();

        /** @var Langue $langue */
        $langue = $this->langueRepository->find($id);

        if (empty($langue)) {
            return $this->sendError('Langue not found');
        }

        $langue = $this->langueRepository->update($input, $id);

        return $this->sendResponse(new LangueResource($langue), 'Langue updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/langues/{id}",
     *      summary="Remove the specified Langue from storage",
     *      tags={"Langue"},
     *      description="Delete Langue",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Langue",
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
        /** @var Langue $langue */
        $langue = $this->langueRepository->find($id);

        if (empty($langue)) {
            return $this->sendError('Langue not found');
        }

        $langue->delete();

        return $this->sendSuccess('Langue deleted successfully');
    }
}
