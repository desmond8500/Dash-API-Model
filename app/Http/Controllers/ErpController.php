<?php

namespace App\Http\Controllers;

use App\Http\Resources\BuildingResource;
use App\Http\Resources\InvoiceResource;
use App\Http\Resources\ProjetResource;
use App\Http\Resources\RoomResource;
use App\Http\Resources\StageResource;
use App\Models\Building;
use App\Models\Invoice;
use App\Models\Projet;
use App\Models\Room;
use App\Models\Stage;
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
        $projets = ProjetResource::collection($projets);

        return ResponseController::response(true, 'Les projets ont été recupérés avec succès', $projets);
    }

    /**
     * @SWG\Post(
     *      path="/projet_buildings",
     *      summary="Get projects by client_id",
     *      tags={"Projet"},
     *      description="Get projects by client_id",
     *      produces={"application/json"},
     *
     *      @SWG\Parameter(
     *          name="projet_id",
     *          description="Identifiant du ptojet",
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

    public function projet_buildings(Request $request)
    {
        $batiments = Building::where('projet_id', $request->projet_id)->get();
        $batiments = BuildingResource::collection($batiments);

        return ResponseController::response(true, 'Les batiments ont été recupérés avec succès', $batiments);
    }
    /**
     * @SWG\Post(
     *      path="/building_stages",
     *      summary="Récupérer les niveaux d'un batiment en fonction de l'identifiant",
     *      tags={"Building"},
     *      description="Récupérer les niveaux d'un batiment en fonction de l'identifiant",
     *      produces={"application/json"},
     *
     *      @SWG\Parameter(
     *          name="building_id",
     *          description="Identifiant du ptojet",
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

    public function building_stages(Request $request)
    {
        $stages = Stage::where('building_id', $request->building_id)->get();
        $stages = StageResource::collection($stages);

        return ResponseController::response(true, 'Les niveaux ont été recupérés avec succès', $stages);
    }
    /**
     * @SWG\Post(
     *      path="/stage_rooms",
     *      summary="Get projects by client_id",
     *      tags={"Stage"},
     *      description="Get projects by client_id",
     *      produces={"application/json"},
     *
     *      @SWG\Parameter(
     *          name="stage_id",
     *          description="Identifiant du ptojet",
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

    public function stage_rooms(Request $request)
    {
        $rooms = Room::where('stage_id', $request->stage_id)->get();
        $rooms = RoomResource::collection($rooms);

        return ResponseController::response(true, 'Les niveaux ont été recupérés avec succès', $rooms);
    }

    /**
     * @SWG\Post(
     *      path="/projet_invoices",
     *      summary="Get invoices by project_id",
     *      tags={"Invoice"},
     *      description="Get invoices by project_id",
     *      produces={"application/json"},
     *
     *      @SWG\Parameter(
     *          name="projet_id",
     *          description="Identifiant du projet",
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

    public function projet_invoices(Request $request)
    {
        $invoices = Invoice::where('projet_id', $request->projet_id)->get();
        $invoices = InvoiceResource::collection($invoices);

        return ResponseController::response(true, 'Les niveaux ont été recupérés avec succès', $invoices);
    }
    /**
     * @SWG\Post(
     *      path="/room_invoices",
     *      summary="Get invoices by room_id",
     *      tags={"Invoice"},
     *      description="Get invoices by room_id",
     *      produces={"application/json"},
     *
     *      @SWG\Parameter(
     *          name="room_id",
     *          description="Identifiant du projet",
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

    public function room_invoices(Request $request)
    {
        $room = Room::find($request->room_id);
        $projet = $room->stage->building->projet;

        $invoices = Invoice::where('projet_id', $projet->id)->get();
        $invoices = InvoiceResource::collection($invoices);

        return ResponseController::response(true, 'Les niveaux ont été recupérés avec succès', $invoices);
    }
}
