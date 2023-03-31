<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAvancementSubRowAPIRequest;
use App\Http\Requests\API\UpdateAvancementSubRowAPIRequest;
use App\Models\AvancementSubRow;
use App\Repositories\AvancementSubRowRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AvancementSubRowResource;
use Response;

/**
 * Class AvancementSubRowController
 * @package App\Http\Controllers\API
 */

class AvancementSubRowAPIController extends AppBaseController
{
    /** @var  AvancementSubRowRepository */
    private $avancementSubRowRepository;

    public function __construct(AvancementSubRowRepository $avancementSubRowRepo)
    {
        $this->avancementSubRowRepository = $avancementSubRowRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/avancementSubRows",
     *      summary="Get a listing of the AvancementSubRows.",
     *      tags={"AvancementSubRow"},
     *      description="Get all AvancementSubRows",
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
     *                  @SWG\Items(ref="#/definitions/AvancementSubRow")
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
        $avancementSubRows = $this->avancementSubRowRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AvancementSubRowResource::collection($avancementSubRows), 'Avancement Sub Rows retrieved successfully');
    }

    /**
     * @param CreateAvancementSubRowAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/avancementSubRows",
     *      summary="Store a newly created AvancementSubRow in storage",
     *      tags={"AvancementSubRow"},
     *      description="Store AvancementSubRow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AvancementSubRow that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AvancementSubRow")
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
     *                  ref="#/definitions/AvancementSubRow"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAvancementSubRowAPIRequest $request)
    {
        $input = $request->all();

        $avancementSubRow = $this->avancementSubRowRepository->create($input);

        return $this->sendResponse(new AvancementSubRowResource($avancementSubRow), 'Avancement Sub Row saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/avancementSubRows/{id}",
     *      summary="Display the specified AvancementSubRow",
     *      tags={"AvancementSubRow"},
     *      description="Get AvancementSubRow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AvancementSubRow",
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
     *                  ref="#/definitions/AvancementSubRow"
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
        /** @var AvancementSubRow $avancementSubRow */
        $avancementSubRow = $this->avancementSubRowRepository->find($id);

        if (empty($avancementSubRow)) {
            return $this->sendError('Avancement Sub Row not found');
        }

        return $this->sendResponse(new AvancementSubRowResource($avancementSubRow), 'Avancement Sub Row retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAvancementSubRowAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/avancementSubRows/{id}",
     *      summary="Update the specified AvancementSubRow in storage",
     *      tags={"AvancementSubRow"},
     *      description="Update AvancementSubRow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AvancementSubRow",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AvancementSubRow that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AvancementSubRow")
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
     *                  ref="#/definitions/AvancementSubRow"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAvancementSubRowAPIRequest $request)
    {
        $input = $request->all();

        /** @var AvancementSubRow $avancementSubRow */
        $avancementSubRow = $this->avancementSubRowRepository->find($id);

        if (empty($avancementSubRow)) {
            return $this->sendError('Avancement Sub Row not found');
        }

        $avancementSubRow = $this->avancementSubRowRepository->update($input, $id);

        return $this->sendResponse(new AvancementSubRowResource($avancementSubRow), 'AvancementSubRow updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/avancementSubRows/{id}",
     *      summary="Remove the specified AvancementSubRow from storage",
     *      tags={"AvancementSubRow"},
     *      description="Delete AvancementSubRow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AvancementSubRow",
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
        /** @var AvancementSubRow $avancementSubRow */
        $avancementSubRow = $this->avancementSubRowRepository->find($id);

        if (empty($avancementSubRow)) {
            return $this->sendError('Avancement Sub Row not found');
        }

        $avancementSubRow->delete();

        return $this->sendSuccess('Avancement Sub Row deleted successfully');
    }
}
