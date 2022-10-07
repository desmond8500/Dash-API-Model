<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInvoiceRowAPIRequest;
use App\Http\Requests\API\UpdateInvoiceRowAPIRequest;
use App\Models\InvoiceRow;
use App\Repositories\InvoiceRowRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\InvoiceRowResource;
use Response;

/**
 * Class InvoiceRowController
 * @package App\Http\Controllers\API
 */

class InvoiceRowAPIController extends AppBaseController
{
    /** @var  InvoiceRowRepository */
    private $invoiceRowRepository;

    public function __construct(InvoiceRowRepository $invoiceRowRepo)
    {
        $this->invoiceRowRepository = $invoiceRowRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/invoiceRows",
     *      summary="Get a listing of the InvoiceRows.",
     *      tags={"InvoiceRow"},
     *      description="Get all InvoiceRows",
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
     *                  @SWG\Items(ref="#/definitions/InvoiceRow")
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
        $invoiceRows = $this->invoiceRowRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(InvoiceRowResource::collection($invoiceRows), 'Invoice Rows retrieved successfully');
    }

    /**
     * @param CreateInvoiceRowAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/invoiceRows",
     *      summary="Store a newly created InvoiceRow in storage",
     *      tags={"InvoiceRow"},
     *      description="Store InvoiceRow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InvoiceRow that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InvoiceRow")
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
     *                  ref="#/definitions/InvoiceRow"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInvoiceRowAPIRequest $request)
    {
        $input = $request->all();

        $invoiceRow = $this->invoiceRowRepository->create($input);

        return $this->sendResponse(new InvoiceRowResource($invoiceRow), 'Invoice Row saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/invoiceRows/{id}",
     *      summary="Display the specified InvoiceRow",
     *      tags={"InvoiceRow"},
     *      description="Get InvoiceRow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InvoiceRow",
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
     *                  ref="#/definitions/InvoiceRow"
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
        /** @var InvoiceRow $invoiceRow */
        $invoiceRow = $this->invoiceRowRepository->find($id);

        if (empty($invoiceRow)) {
            return $this->sendError('Invoice Row not found');
        }

        return $this->sendResponse(new InvoiceRowResource($invoiceRow), 'Invoice Row retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInvoiceRowAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/invoiceRows/{id}",
     *      summary="Update the specified InvoiceRow in storage",
     *      tags={"InvoiceRow"},
     *      description="Update InvoiceRow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InvoiceRow",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InvoiceRow that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InvoiceRow")
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
     *                  ref="#/definitions/InvoiceRow"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInvoiceRowAPIRequest $request)
    {
        $input = $request->all();

        /** @var InvoiceRow $invoiceRow */
        $invoiceRow = $this->invoiceRowRepository->find($id);

        if (empty($invoiceRow)) {
            return $this->sendError('Invoice Row not found');
        }

        $invoiceRow = $this->invoiceRowRepository->update($input, $id);

        return $this->sendResponse(new InvoiceRowResource($invoiceRow), 'InvoiceRow updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/invoiceRows/{id}",
     *      summary="Remove the specified InvoiceRow from storage",
     *      tags={"InvoiceRow"},
     *      description="Delete InvoiceRow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InvoiceRow",
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
        /** @var InvoiceRow $invoiceRow */
        $invoiceRow = $this->invoiceRowRepository->find($id);

        if (empty($invoiceRow)) {
            return $this->sendError('Invoice Row not found');
        }

        $invoiceRow->delete();

        return $this->sendSuccess('Invoice Row deleted successfully');
    }
}
