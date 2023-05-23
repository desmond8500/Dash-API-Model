<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">Planning hebdomadaire</h3>
            <div class="card-subtitle">
                Semaine du {{ $semaine['debut'] }} au {{ $semaine['fin'] }}
            </div>
        </div>
        <div class="card-actions btn-list">
            <button class="btn btn-primary" >
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
              Tache
            </button>
            <a class="btn btn-primary" href="{{ route('tabler.export_planning') }}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-export" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M14 3v4a1 1 0 0 0 1 1h4"></path> <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3"></path> </svg>
                Exporter
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-mobile-md ">
            <thead class="sticky-top">
                <tr>
                    <th style="width: 120px">Jour</th>
                    <th >Taches</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plannings as $planning)
                    <tr @class(['table-primary' => $planning->day == $date->now()->day ]) >
                        <th class="">
                            <div class="d-flex justify-content-between ">
                                <div>{{ strtoupper($planning->dayName) }}</div>
                                <div class="text-primary">{{ $planning->day }}</div>
                            </div>
                        </th>
                        <td>
                            @foreach ($planning->tasks as $task)
                                <div @class(['border border-primary mb-1 p-2 rounded bg-white hover_blue' => $planning->day == $date->now()->day, 'border mb-1 p-2 rounded hover' => $planning->day != $date->now()->day ]) type="button">
                                    <div class="row">
                                        <div class="col mb-1">
                                            <div class="fw-bold" wire:click="show_task('{{ $task->id }}')">{{ $task->objet }}</div>
                                            <div class="" wire:click="show_task('{{ $task->id }}')">{{ $task->description }}</div>
                                        </div>
                                        <div class="col-auto d-none d-sm-block">
                                            @if ($task->debut)
                                                <div>{{ date_format($task->debut, 'd-m-Y') }}</div>
                                            @endif
                                            @if ($task->fin)
                                                <div>{{ date_format($task->fin, 'd-m-Y') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-primary" disabled>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path> <path d="M9 12l2 2l4 -4"></path> </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
