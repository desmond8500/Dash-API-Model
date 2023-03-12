<div class="table-responsive-sm">
    <table class="table table-striped" id="personnels-table">
        <thead>
            <tr>
                <th>Prenom</th>
        <th>Nom</th>
        <th>Fonction</th>
        <th>Statut</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($personnels as $personnel)
            <tr>
                <td>{{ $personnel->prenom }}</td>
            <td>{{ $personnel->nom }}</td>
            <td>{{ $personnel->fonction }}</td>
            <td>{{ $personnel->statut }}</td>
                <td>
                    {!! Form::open(['route' => ['personnels.destroy', $personnel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('personnels.show', [$personnel->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('personnels.edit', [$personnel->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>