<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseController;
use App\Models\Task;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    /** @SWG\Post(
    *      path="/get_tasks",
    *      summary="Récupérer la liste de taches d'un devis",
    *      tags={"Task"},
    *      description="Récupérer la liste de taches d'un devis",
    *      produces={"application/json"},
    *      @SWG\Parameter(
    *          name="devis_id",
    *          description="Identifiant du devis",
    *          type="integer",
    *          required=true,
    *          in="formData"
    *      ),
    *
    *
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
    *                  ref="#/definitions/Task"
    *              ),
    *              @SWG\Property(
    *                  property="message",
    *                  type="string"
    *              )
    *          )
    *      )
    * )
    */
    public function get_tasks(Request $request)
    {
        $taches = Task::where('devis_id', $request->devis_id)->get();

        if (!empty($taches)) {
            return ResponseController::response(true, 'Les taches ont été récupérés');
        } else {
            return ResponseController::response(false, 'Le devis n\'as paps été trouvé');
        }

    }
}
