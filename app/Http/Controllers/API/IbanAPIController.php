<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIbanAPIRequest;
use App\Http\Requests\API\UpdateIbanAPIRequest;
use App\Models\Iban;
use App\Repositories\IbanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\IbanResource;
use Response;

/**
 * Class IbanController
 * @package App\Http\Controllers\API
 */

class IbanAPIController extends AppBaseController
{
    /** @var  IbanRepository */
    private $ibanRepository;

    public function __construct(IbanRepository $ibanRepo)
    {
        $this->ibanRepository = $ibanRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/ibans",
     *      summary="Get a listing of the Ibans.",
     *      tags={"Iban"},
     *      description="Get all Ibans",
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
     *                  @SWG\Items(ref="#/definitions/Iban")
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
        $ibans = $this->ibanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(IbanResource::collection($ibans), 'Ibans retrieved successfully');
    }

    /**
     * @param CreateIbanAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/ibans",
     *      summary="Store a newly created Iban in storage",
     *      tags={"Iban"},
     *      description="Store Iban",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Iban that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Iban")
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
     *                  ref="#/definitions/Iban"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateIbanAPIRequest $request)
    {
        $input = $request->all();

        $iban = $this->ibanRepository->create($input);

        return $this->sendResponse(new IbanResource($iban), 'Iban saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/ibans/{id}",
     *      summary="Display the specified Iban",
     *      tags={"Iban"},
     *      description="Get Iban",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Iban",
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
     *                  ref="#/definitions/Iban"
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
        /** @var Iban $iban */
        $iban = $this->ibanRepository->find($id);

        if (empty($iban)) {
            return $this->sendError('Iban not found');
        }

        return $this->sendResponse(new IbanResource($iban), 'Iban retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateIbanAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/ibans/{id}",
     *      summary="Update the specified Iban in storage",
     *      tags={"Iban"},
     *      description="Update Iban",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Iban",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Iban that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Iban")
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
     *                  ref="#/definitions/Iban"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateIbanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Iban $iban */
        $iban = $this->ibanRepository->find($id);

        if (empty($iban)) {
            return $this->sendError('Iban not found');
        }

        $iban = $this->ibanRepository->update($input, $id);

        return $this->sendResponse(new IbanResource($iban), 'Iban updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ibans/{id}",
     *      summary="Remove the specified Iban from storage",
     *      tags={"Iban"},
     *      description="Delete Iban",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Iban",
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
        /** @var Iban $iban */
        $iban = $this->ibanRepository->find($id);

        if (empty($iban)) {
            return $this->sendError('Iban not found');
        }

        $iban->delete();

        return $this->sendSuccess('Iban deleted successfully');
    }
}
