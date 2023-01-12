<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Models\InvoiceRow;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * @param CreateReportSectionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/get_invoice_rows",
     *      summary="Récupérer la liste des champs d'un devis",
     *      tags={"InvoiceRow"},
     *      description="Récupérer la liste des champs d'un devis",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="invoice_id",
     *          description="Identifiant du devis",
     *          type="string",
     *          required=true,
     *          in="formData",
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
    public function getInvoiceRows(Request $request)
    {
        if ($request->invoice_id) {
            $reports = InvoiceRow::where('invoice_id', $request->invoice_id)->get();
            return ResponseController::response(true, "Les articles ont été récupérées avec succès", $reports);
        } else {
            return ResponseController::response(false, "Le champ invoice_id est requis");
        }
    }
    /**
     * @param CreateReportSectionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/get_section_rows",
     *      summary="Récupérer la liste des champs d'une section",
     *      tags={"InvoiceRow"},
     *      description="Récupérer la liste des champs d'une section",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="invoice_id",
     *          description="Identifiant du devis",
     *          type="string",
     *          required=true,
     *          in="formData",
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
    public function getSectionRows(Request $request)
    {
        if ($request->invoice_id) {
            $reports = InvoiceRow::where('invoice_id', $request->invoice_id)->get();
            return ResponseController::response(true, "Les articles ont été récupérées avec succès", $reports);
        } else {
            return ResponseController::response(false, "Le champ invoice_id est requis");
        }
    }
}
