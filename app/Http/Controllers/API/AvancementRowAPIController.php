<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAvancementRowAPIRequest;
use App\Http\Requests\API\UpdateAvancementRowAPIRequest;
use App\Models\AvancementRow;
use App\Repositories\AvancementRowRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AvancementRowResource;
use Response;

/**
 * Class AvancementRowController
 * @package App\Http\Controllers\API
 */

class AvancementRowAPIController extends AppBaseController
{
    /** @var  AvancementRowRepository */
    private $avancementRowRepository;

    public function __construct(AvancementRowRepository $avancementRowRepo)
    {
        $this->avancementRowRepository = $avancementRowRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/avancementRows",
     *      summary="Get a listing of the AvancementRows.",
     *      tags={"AvancementRow"},
     *      description="Get all AvancementRows",
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
     *                  @SWG\Items(ref="#/definitions/AvancementRow")
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
        $avancementRows = $this->avancementRowRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AvancementRowResource::collection($avancementRows), 'Avancement Rows retrieved successfully');
    }

    /**
     * @param CreateAvancementRowAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/avancementRows",
     *      summary="Store a newly created AvancementRow in storage",
     *      tags={"AvancementRow"},
     *      description="Store AvancementRow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AvancementRow that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AvancementRow")
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
     *                  ref="#/definitions/AvancementRow"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAvancementRowAPIRequest $request)
    {
        $input = $request->all();

        $avancementRow = $this->avancementRowRepository->create($input);

        return $this->sendResponse(new AvancementRowResource($avancementRow), 'Avancement Row saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/avancementRows/{id}",
     *      summary="Display the specified AvancementRow",
     *      tags={"AvancementRow"},
     *      description="Get AvancementRow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AvancementRow",
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
     *                  ref="#/definitions/AvancementRow"
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
        /** @var AvancementRow $avancementRow */
        $avancementRow = $this->avancementRowRepository->find($id);

        if (empty($avancementRow)) {
            return $this->sendError('Avancement Row not found');
        }

        return $this->sendResponse(new AvancementRowResource($avancementRow), 'Avancement Row retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAvancementRowAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/avancementRows/{id}",
     *      summary="Update the specified AvancementRow in storage",
     *      tags={"AvancementRow"},
     *      description="Update AvancementRow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AvancementRow",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AvancementRow that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AvancementRow")
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
     *                  ref="#/definitions/AvancementRow"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAvancementRowAPIRequest $request)
    {
        $input = $request->all();

        /** @var AvancementRow $avancementRow */
        $avancementRow = $this->avancementRowRepository->find($id);

        if (empty($avancementRow)) {
            return $this->sendError('Avancement Row not found');
        }

        $avancementRow = $this->avancementRowRepository->update($input, $id);

        return $this->sendResponse(new AvancementRowResource($avancementRow), 'AvancementRow updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/avancementRows/{id}",
     *      summary="Remove the specified AvancementRow from storage",
     *      tags={"AvancementRow"},
     *      description="Delete AvancementRow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AvancementRow",
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
        /** @var AvancementRow $avancementRow */
        $avancementRow = $this->avancementRowRepository->find($id);

        if (empty($avancementRow)) {
            return $this->sendError('Avancement Row not found');
        }

        $avancementRow->delete();

        return $this->sendSuccess('Avancement Row deleted successfully');
    }
}
