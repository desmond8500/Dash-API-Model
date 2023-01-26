<div class="table-responsive-sm">
    <table class="table table-striped" id="personnes-table">
        <thead>
            <tr>
                <th>Prenom</th>
        <th>Nom</th>
        <th>Fonction</th>
        <th>Tel</th>
        <th>Adresse</th>
        <th>Email</th>
        <th>Profile</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($personnes as $personne)
            <tr>
                <td>{{ $personne->prenom }}</td>
            <td>{{ $personne->nom }}</td>
            <td>{{ $personne->fonction }}</td>
            <td>{{ $personne->tel }}</td>
            <td>{{ $personne->adresse }}</td>
            <td>{{ $personne->email }}</td>
            <td>{{ $personne->profile }}</td>
                <td>
                    {!! Form::open(['route' => ['personnes.destroy', $personne->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('personnes.show', [$personne->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('personnes.edit', [$personne->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>