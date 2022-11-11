<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/priorities",
     *      summary="Récupérer la liste des priorités",
     *      tags={"Listes"},
     *      description="Récupérer la liste des priorités",
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
     *                  @SWG\Items(ref="#/definitions/Client")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function priorities()
    {
        $list = [
          array('name'=> 'Nouveau',  'niveau'=>1),
          array('name'=> 'En Cours', 'niveau'=>2),
          array('name'=> 'En Pause', 'niveau'=>3),
          array('name'=> 'Annulé',   'niveau'=>4),
          array('name'=> 'Terminé',  'niveau'=>5),
        ];

        return ResponseController::response(true, "Priorités récupérés", $list);
    }

}
