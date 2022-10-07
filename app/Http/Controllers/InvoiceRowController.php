<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoiceRowRequest;
use App\Http\Requests\UpdateInvoiceRowRequest;
use App\Repositories\InvoiceRowRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class InvoiceRowController extends AppBaseController
{
    /** @var InvoiceRowRepository $invoiceRowRepository*/
    private $invoiceRowRepository;

    public function __construct(InvoiceRowRepository $invoiceRowRepo)
    {
        $this->invoiceRowRepository = $invoiceRowRepo;
    }

    /**
     * Display a listing of the InvoiceRow.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $invoiceRows = $this->invoiceRowRepository->paginate(10);

        return view('invoice_rows.index')
            ->with('invoiceRows', $invoiceRows);
    }

    /**
     * Show the form for creating a new InvoiceRow.
     *
     * @return Response
     */
    public function create()
    {
        return view('invoice_rows.create');
    }

    /**
     * Store a newly created InvoiceRow in storage.
     *
     * @param CreateInvoiceRowRequest $request
     *
     * @return Response
     */
    public function store(CreateInvoiceRowRequest $request)
    {
        $input = $request->all();

        $invoiceRow = $this->invoiceRowRepository->create($input);

        Flash::success('Invoice Row saved successfully.');

        return redirect(route('invoiceRows.index'));
    }

    /**
     * Display the specified InvoiceRow.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invoiceRow = $this->invoiceRowRepository->find($id);

        if (empty($invoiceRow)) {
            Flash::error('Invoice Row not found');

            return redirect(route('invoiceRows.index'));
        }

        return view('invoice_rows.show')->with('invoiceRow', $invoiceRow);
    }

    /**
     * Show the form for editing the specified InvoiceRow.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invoiceRow = $this->invoiceRowRepository->find($id);

        if (empty($invoiceRow)) {
            Flash::error('Invoice Row not found');

            return redirect(route('invoiceRows.index'));
        }

        return view('invoice_rows.edit')->with('invoiceRow', $invoiceRow);
    }

    /**
     * Update the specified InvoiceRow in storage.
     *
     * @param int $id
     * @param UpdateInvoiceRowRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvoiceRowRequest $request)
    {
        $invoiceRow = $this->invoiceRowRepository->find($id);

        if (empty($invoiceRow)) {
            Flash::error('Invoice Row not found');

            return redirect(route('invoiceRows.index'));
        }

        $invoiceRow = $this->invoiceRowRepository->update($request->all(), $id);

        Flash::success('Invoice Row updated successfully.');

        return redirect(route('invoiceRows.index'));
    }

    /**
     * Remove the specified InvoiceRow from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invoiceRow = $this->invoiceRowRepository->find($id);

        if (empty($invoiceRow)) {
            Flash::error('Invoice Row not found');

            return redirect(route('invoiceRows.index'));
        }

        $this->invoiceRowRepository->delete($id);

        Flash::success('Invoice Row deleted successfully.');

        return redirect(route('invoiceRows.index'));
    }
}
