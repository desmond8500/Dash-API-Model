<div>
    <div class="card card-body mb-2">
        <div class="row  bg-white">
            <div class="col">
                <div class="fs-1">Planning hebomadaire</div>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPlanningTask">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                    Tache
                </button>
                <a class="btn btn-primary" target="_blank" href="{{ route('tabler.export_planning',['projet_id'=>$projet_id]) }}">
                  PDF
                </a>
            </div>

        </div>
    </div>

    <div class="card mb-2">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead">
                    <tr>
                        {{-- <th style="width: 20px; text-align: center">#</th> --}}
                        <th >Batiment</th>
                        <th >Détails</th>
                        <th colspan="7" class="text-center">Semaine 1</th>
                        <th colspan="7" class="text-center">Semaine 2</th>
                    </tr>
                </thead>
                <tr>
                    <th colspan="2" rowspan="2" style="vertical-align:center">Semaine du projet</th>

                    <th style="width: 10px; text-align: center">L</th>
                    <th style="width: 10px; text-align: center">M</th>
                    <th style="width: 10px; text-align: center">M</th>
                    <th style="width: 10px; text-align: center">J</th>
                    <th style="width: 10px; text-align: center">V</th>
                    <th style="width: 10px; text-align: center">S</th>
                    <th style="width: 10px; text-align: center">D</th>

                    <th style="width: 10px; text-align: center">L</th>
                    <th style="width: 10px; text-align: center">M</th>
                    <th style="width: 10px; text-align: center">M</th>
                    <th style="width: 10px; text-align: center">J</th>
                    <th style="width: 10px; text-align: center">V</th>
                    <th style="width: 10px; text-align: center">S</th>
                    <th style="width: 10px; text-align: center">D</th>
                </tr>
                <tr>
                    <td>{{ $carbon->startOfWeek()->day - 7 }}</td>
                    <td>{{ $carbon->startOfWeek()->day - 6 }}</td>
                    <td>{{ $carbon->startOfWeek()->day - 5 }}</td>
                    <td>{{ $carbon->startOfWeek()->day - 4 }}</td>
                    <td>{{ $carbon->startOfWeek()->day - 3 }}</td>
                    <td>{{ $carbon->startOfWeek()->day - 2 }}</td>
                    <td>{{ $carbon->startOfWeek()->day - 1 }}</td>

                    <td>{{ $carbon->startOfWeek()->day + 0 }}</td>
                    <td>{{ $carbon->startOfWeek()->day + 1 }}</td>
                    <td>{{ $carbon->startOfWeek()->day + 2 }}</td>
                    <td>{{ $carbon->startOfWeek()->day + 3 }}</td>
                    <td>{{ $carbon->startOfWeek()->day + 4 }}</td>
                    <td>{{ $carbon->startOfWeek()->day + 5 }}</td>
                    <td>{{ $carbon->startOfWeek()->day + 6 }}</td>
                </tr>
                @foreach ($buildings as $key => $building)
                    @foreach ($building->plannings as $planning)
                        <tr>
                            @if ($planning_id == $planning->id)
                                <td colspan="16">
                                    <form wire:submit.prevent='update_task' class="row">
                                        @include('_tabler.erp.planning_form')
                                        <div class="btn-list">
                                            <button type="button" class="btn btn-secondary" wire:click="$set('planning_id', 0)">Fermer</button>
                                            <button type="submit" class="btn btn-primary" >Modifier</button>
                                        </div>
                                    </form>
                                </td>
                            @else
                                @if ($loop->first)
                                    <td rowspan="{{ $building->plannings->count() }}">{{ $building->name }}</td>
                                @endif
                                <td>
                                    <b>{{ $planning->system->name }}</b>
                                    <div>{{ $planning->tache }}</div>
                                </td>
                                {{-- {{ $planning->debut }} {{ $planning->fin }} --}}
                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(-7) ])>  </td>
                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(-6) ])>  </td>
                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(-5) ])>  </td>
                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(-4) ])>  </td>
                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(-3) ])>  </td>
                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(-2) ])>  </td>
                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(-1) ])>  </td>

                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(0) ])>  </td>
                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(1) ])>  </td>
                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(2) ])>  </td>
                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(3) ])>  </td>
                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(4) ])>  </td>
                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(5) ])>  </td>
                                <td style="border: 1px solid grey" @class(['bg-blue border' => $planning->validate(6) ])>  </td>
                                <td wire:click="edit_task('{{ $planning->id }}')" type='button'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
            </table>
        </div>

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
