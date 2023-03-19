<div class="row">

    <div class="col"></div>
    <div class="col-auto">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPlanningTask">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
            Tache
        </button>


    </div>



    <div class="card">
        Plannig hebomadaire
    </div>



     <div class="table-responsive">
        <table class="table table-primary">
            <tbody>
                <tr class="">
                    <td>Name</td>
                    <td>
                        <div>Planning Hebdomadaire</div>
                        <div>Date</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>




    <div class="table-responsive">
        <table class="table">
            <thead class="thead">
                <tr>
                    <th style="width: 20px; text-align: center">#</th>
                    <th >Batiment</th>
                    <th >Détails</th>
                    <th colspan="7">Semaine 1</th>
                    <th colspan="7">Semaine 2</th>
                </tr>
            </thead>
            <tr>
                <th colspan="3" rowspan="2">Semaine du projet</th>

                <th style="width: 20px; text-align: center">L</th>
                <th style="width: 20px; text-align: center">M</th>
                <th style="width: 20px; text-align: center">M</th>
                <th style="width: 20px; text-align: center">J</th>
                <th style="width: 20px; text-align: center">V</th>
                <th style="width: 20px; text-align: center">S</th>
                <th style="width: 20px; text-align: center">D</th>

                <th style="width: 20px; text-align: center">L</th>
                <th style="width: 20px; text-align: center">M</th>
                <th style="width: 20px; text-align: center">M</th>
                <th style="width: 20px; text-align: center">J</th>
                <th style="width: 20px; text-align: center">V</th>
                <th style="width: 20px; text-align: center">S</th>
                <th style="width: 20px; text-align: center">D</th>
            </tr>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>

                <th>8</th>
                <th>9</th>
                <th>10</th>
                <th>11</th>
                <th>12</th>
                <th>13</th>
                <th>14</th>
            </tr>
            @foreach ($plannings as $key => $planning)
                <tr>
                    <td style="width: 20px; text-align: center">{{ $key+1 }}</td>
                    <td>Hotel</td>
                    <td>
                        <b>GRMS</b>
                        <div>Travaux</div>
                    </td>

                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>

                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>
                    <td>14</td>
                </tr>
            @endforeach
        </table>
    </div>


    <div class="modal fade" id="addPlanningTask" tabindex="-1" aria-labelledby="addPlanningTaskLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <form class="modal-content" wire:submit.prevent="add_task">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une tache</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        @include('_tabler.erp.planning_form')
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
    <script> window.addEventListener('close-modal', event => { $("#addPlanningTask").modal('hide'); }) </script>

</div>
