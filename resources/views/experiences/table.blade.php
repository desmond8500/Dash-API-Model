<div class="table-responsive-sm">
    <table class="table table-striped" id="experiences-table">
        <thead>
            <tr>
                <th>Personne Id</th>
        <th>Pays</th>
        <th>Ville</th>
        <th>Debut</th>
        <th>Fin</th>
        <th>Entreprise</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($experiences as $experience)
            <tr>
                <td>{{ $experience->personne_id }}</td>
            <td>{{ $experience->pays }}</td>
            <td>{{ $experience->ville }}</td>
            <td>{{ $experience->debut }}</td>
            <td>{{ $experience->fin }}</td>
            <td>{{ $experience->entreprise }}</td>
                <td>
                    {!! Form::open(['route' => ['experiences.destroy', $experience->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('experiences.show', [$experience->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('experiences.edit', [$experience->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>