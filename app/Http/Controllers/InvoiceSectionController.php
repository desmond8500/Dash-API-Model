<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoiceSectionRequest;
use App\Http\Requests\UpdateInvoiceSectionRequest;
use App\Repositories\InvoiceSectionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class InvoiceSectionController extends AppBaseController
{
    /** @var InvoiceSectionRepository $invoiceSectionRepository*/
    private $invoiceSectionRepository;

    public function __construct(InvoiceSectionRepository $invoiceSectionRepo)
    {
        $this->invoiceSectionRepository = $invoiceSectionRepo;
    }

    /**
     * Display a listing of the InvoiceSection.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $invoiceSections = $this->invoiceSectionRepository->paginate(10);

        return view('invoice_sections.index')
            ->with('invoiceSections', $invoiceSections);
    }

    /**
     * Show the form for creating a new InvoiceSection.
     *
     * @return Response
     */
    public function create()
    {
        return view('invoice_sections.create');
    }

    /**
     * Store a newly created InvoiceSection in storage.
     *
     * @param CreateInvoiceSectionRequest $request
     *
     * @return Response
     */
    public function store(CreateInvoiceSectionRequest $request)
    {
        $input = $request->all();

        $invoiceSection = $this->invoiceSectionRepository->create($input);

        Flash::success('Invoice Section saved successfully.');

        return redirect(route('invoiceSections.index'));
    }

    /**
     * Display the specified InvoiceSection.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invoiceSection = $this->invoiceSectionRepository->find($id);

        if (empty($invoiceSection)) {
            Flash::error('Invoice Section not found');

            return redirect(route('invoiceSections.index'));
        }

        return view('invoice_sections.show')->with('invoiceSection', $invoiceSection);
    }

    /**
     * Show the form for editing the specified InvoiceSection.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invoiceSection = $this->invoiceSectionRepository->find($id);

        if (empty($invoiceSection)) {
            Flash::error('Invoice Section not found');

            return redirect(route('invoiceSections.index'));
        }

        return view('invoice_sections.edit')->with('invoiceSection', $invoiceSection);
    }

    /**
     * Update the specified InvoiceSection in storage.
     *
     * @param int $id
     * @param UpdateInvoiceSectionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvoiceSectionRequest $request)
    {
        $invoiceSection = $this->invoiceSectionRepository->find($id);

        if (empty($invoiceSection)) {
            Flash::error('Invoice Section not found');

            return redirect(route('invoiceSections.index'));
        }

        $invoiceSection = $this->invoiceSectionRepository->update($request->all(), $id);

        Flash::success('Invoice Section updated successfully.');

        return redirect(route('invoiceSections.index'));
    }

    /**
     * Remove the specified InvoiceSection from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invoiceSection = $this->invoiceSectionRepository->find($id);

        if (empty($invoiceSection)) {
            Flash::error('Invoice Section not found');

            return redirect(route('invoiceSections.index'));
        }

        $this->invoiceSectionRepository->delete($id);

        Flash::success('Invoice Section deleted successfully.');

        return redirect(route('invoiceSections.index'));
    }
}
