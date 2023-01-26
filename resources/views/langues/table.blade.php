<div class="table-responsive-sm">
    <table class="table table-striped" id="langues-table">
        <thead>
            <tr>
                <th>Personne Id</th>
        <th>Nom</th>
        <th>Niveau</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($langues as $langue)
            <tr>
                <td>{{ $langue->personne_id }}</td>
            <td>{{ $langue->nom }}</td>
            <td>{{ $langue->niveau }}</td>
                <td>
                    {!! Form::open(['route' => ['langues.destroy', $langue->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('langues.show', [$langue->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('langues.edit', [$langue->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>