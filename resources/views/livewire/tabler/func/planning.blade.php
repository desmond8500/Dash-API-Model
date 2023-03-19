<div class="card">
    <div class="card-header">
        <div>
            <h3 class="card-title">Planning hebdomadaire</h3>
            <div class="card-subtitle">
                Semaine du {{ $semaine['debut'] }} au {{ $semaine['fin'] }}
            </div>
        </div>
        <div class="card-actions">
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Jour</th>
                    <th scope="col">Taches</th>
                    <th scope="col">Column 3</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plannings as $planning)
                    <tr @class(['table-primary' => $planning->day == $date->now()->day ]) >
                        <th class="">{{ strtoupper($planning->dayName) }} {{ $planning->day }}</th>
                        <td>R1C2</td>
                        <td>R1C3</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
