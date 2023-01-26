<div class="table-responsive-sm">
    <table class="table table-striped" id="formations-table">
        <thead>
            <tr>
                <th>Personne Id</th>
        <th>Ecole</th>
        <th>Diplome</th>
        <th>Debut</th>
        <th>Pays</th>
        <th>Fin</th>
        <th>Ville</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($formations as $formation)
            <tr>
                <td>{{ $formation->personne_id }}</td>
            <td>{{ $formation->ecole }}</td>
            <td>{{ $formation->diplome }}</td>
            <td>{{ $formation->debut }}</td>
            <td>{{ $formation->pays }}</td>
            <td>{{ $formation->fin }}</td>
            <td>{{ $formation->ville }}</td>
                <td>
                    {!! Form::open(['route' => ['formations.destroy', $formation->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('formations.show', [$formation->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('formations.edit', [$formation->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>