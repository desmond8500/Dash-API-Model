<div class="table-responsive-sm">
    <table class="table table-striped" id="competences-table">
        <thead>
            <tr>
                <th>Personne Id</th>
        <th>Competence</th>
        <th>Niveau</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($competences as $competence)
            <tr>
                <td>{{ $competence->personne_id }}</td>
            <td>{{ $competence->competence }}</td>
            <td>{{ $competence->niveau }}</td>
                <td>
                    {!! Form::open(['route' => ['competences.destroy', $competence->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('competences.show', [$competence->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('competences.edit', [$competence->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>