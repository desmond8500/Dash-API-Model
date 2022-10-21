<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class ErpController extends Controller
{
    /**
     * @SWG\Post(
     *      path="/client_projects",
     *      summary="Get projects by client_id",
     *      tags={"Projet"},
     *      description="Get projects by client_id",
     *      produces={"application/json"},
     *
     *      @SWG\Parameter(
     *          name="client_id",
     *          description="Identifiant du client",
     *          type="string",
     *          required=true,
     *          in="formData"
     *      ),
     *
     *      @SWG\Response(
     *          response=404,
     *          description="Projet non trouvé",
     *      ),
     *
     *      @SWG\Response(
     *          response=200,
     *          description="Opération réussie",
     *      ),
     * )
     */

    public function client_projects(Request $request)
    {
        $projets = Projet::where('client_id', $request->client_id)->get();

        return ResponseController::response(true, 'Les projets ont été recupérés avec succès', $projets);
    }
}
