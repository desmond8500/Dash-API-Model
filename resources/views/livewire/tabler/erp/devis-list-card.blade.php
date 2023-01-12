<div class="">
    <table class="table table-responsive bg-white">
        <thead>
            <tr>
                <th>#</th>
                <th class="text-nowrap">Référence</th>
                <th class="text-nowrap">Description</th>
                <th class="text-nowrap">Statut</th>
                <th class="text-nowrap">Montant</th>
                <th class="text-nowrap">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($devisList as $key => $devis)
                <tr>
                    <th>{{ $key+1 }}</th>
                    <td>
                        <a href="{{ route('tabler.devis',['devis_id'=>$devis->id]) }}"> {{ $devis->reference }} </a>
                    </td>
                    <td>{{ $devis->description }}</td>
                    <td>{{ $devis->status }}</td>
                    <td>{{ $devis->montant }}</td>
                    <td>
                        <button class="btn btn-outline-secondary btn-icon disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path> <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path> <path d="M16 5l3 3"></path> </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
