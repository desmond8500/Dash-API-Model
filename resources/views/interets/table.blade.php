<div class="table-responsive-sm">
    <table class="table table-striped" id="interets-table">
        <thead>
            <tr>
                <th>Personne Id</th>
        <th>Nom</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($interets as $interet)
            <tr>
                <td>{{ $interet->personne_id }}</td>
            <td>{{ $interet->nom }}</td>
                <td>
                    {!! Form::open(['route' => ['interets.destroy', $interet->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('interets.show', [$interet->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('interets.edit', [$interet->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>