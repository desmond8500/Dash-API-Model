<div>
    <div class="row">
        @foreach ($reports as $report)
        <div class="col-md-6 mb-2">
            <div class="card p-2">
                <div class="row">
                    <div class="col">
                        <h3>Rapport: {{ $report->objet }}</h3>
                        <div class="text-muted">{!! $report->description !!}</div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-secondary btn-icon disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


</div>
