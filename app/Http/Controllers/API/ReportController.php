<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Models\Report;
use App\Models\ReportSection;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * @param CreateReportSectionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/get_projet_report",
     *      summary="Récupérer la liste des rapports de projet",
     *      tags={"Report"},
     *      description="Récupérer la liste des rapports de projet",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="projet_id",
     *          description="Identifiant du projet",
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
     *                  ref="#/definitions/ReportSection"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function getReports(Request $request)
    {
        if ($request->projet_id) {
            $reports = Report::where('projet_id', $request->projet_id)->get();
            return ResponseController::response(true, "Les rapports ont été récupérées avec succès", $reports);
        } else {
            return ResponseController::response(false, "Le champ projet_id est requis");
        }
    }
    /**
     * @param CreateReportSectionAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/get_report_section",
     *      summary="Récupérer la liste de sections d'un rapport",
     *      tags={"ReportSection"},
     *      description="Récupérer la liste de sections d'un rapport",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="report_id",
     *          description="Identifiant du rapport",
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
     *                  ref="#/definitions/ReportSection"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function getSection(Request $request)
    {
        if ($request->report_id) {
            $sections = ReportSection::where('report_id', $request->report_id)->get();
            return ResponseController::response(true, "Les sections ont été récupérées avec succès", $sections);
        } else {
            return ResponseController::response(false, "Le champ report_id est requis");
        }
    }
}
