<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInvoiceSectionAPIRequest;
use App\Http\Requests\API\UpdateInvoiceSectionAPIRequest;
use App\Models\InvoiceSection;
use App\Repositories\InvoiceSectionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\InvoiceSectionResource;
use Response;

/**
 * Class InvoiceSectionController
 * @package App\Http\Controllers\API
 */

class InvoiceSectionAPIController extends AppBaseController
{
    /** @var  InvoiceSectionRepository */
    private $invoiceSectionRepository;

    public function __construct(InvoiceSectionRepository $invoiceSectionRepo)
    {
        $this->invoiceSectionRepository = $invoiceSectionRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/invoiceSections",
     *      summary="Get a listing of the InvoiceSections.",
     *      tags={"InvoiceSection"},
     *      description="Get all InvoiceSections",
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
     *                  @SWG\Items(ref="#/definitions/InvoiceSection")
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
        $invoiceSections = $this->invoiceSectionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(InvoiceSectionResource::collection($invoiceSections), 'Invoice Sections retrieved successfully');
    }

    /**
     * @param CreateInvoiceSectionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/invoiceSections",
     *      summary="Store a newly created InvoiceSection in storage",
     *      tags={"InvoiceSection"},
     *      description="Store InvoiceSection",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InvoiceSection that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InvoiceSection")
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
     *                  ref="#/definitions/InvoiceSection"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInvoiceSectionAPIRequest $request)
    {
        $input = $request->all();

        $invoiceSection = $this->invoiceSectionRepository->create($input);

        return $this->sendResponse(new InvoiceSectionResource($invoiceSection), 'Invoice Section saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/invoiceSections/{id}",
     *      summary="Display the specified InvoiceSection",
     *      tags={"InvoiceSection"},
     *      description="Get InvoiceSection",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InvoiceSection",
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
     *                  ref="#/definitions/InvoiceSection"
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
        /** @var InvoiceSection $invoiceSection */
        $invoiceSection = $this->invoiceSectionRepository->find($id);

        if (empty($invoiceSection)) {
            return $this->sendError('Invoice Section not found');
        }

        return $this->sendResponse(new InvoiceSectionResource($invoiceSection), 'Invoice Section retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInvoiceSectionAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/invoiceSections/{id}",
     *      summary="Update the specified InvoiceSection in storage",
     *      tags={"InvoiceSection"},
     *      description="Update InvoiceSection",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InvoiceSection",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InvoiceSection that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InvoiceSection")
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
     *                  ref="#/definitions/InvoiceSection"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInvoiceSectionAPIRequest $request)
    {
        $input = $request->all();

        /** @var InvoiceSection $invoiceSection */
        $invoiceSection = $this->invoiceSectionRepository->find($id);

        if (empty($invoiceSection)) {
            return $this->sendError('Invoice Section not found');
        }

        $invoiceSection = $this->invoiceSectionRepository->update($input, $id);

        return $this->sendResponse(new InvoiceSectionResource($invoiceSection), 'InvoiceSection updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/invoiceSections/{id}",
     *      summary="Remove the specified InvoiceSection from storage",
     *      tags={"InvoiceSection"},
     *      description="Delete InvoiceSection",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InvoiceSection",
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
        /** @var InvoiceSection $invoiceSection */
        $invoiceSection = $this->invoiceSectionRepository->find($id);

        if (empty($invoiceSection)) {
            return $this->sendError('Invoice Section not found');
        }

        $invoiceSection->delete();

        return $this->sendSuccess('Invoice Section deleted successfully');
    }
}
