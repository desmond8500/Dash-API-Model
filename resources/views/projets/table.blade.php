<div class="table-responsive-sm">
    <table class="table table-striped" id="projets-table">
        <thead>
            <tr>
                <th>Client Id</th>
        <th>Name</th>
        <th>Logo</th>
        <th>Description</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($projets as $projet)
            <tr>
                <td>{{ $projet->client_id }}</td>
            <td>{{ $projet->name }}</td>
            <td>{{ $projet->logo }}</td>
            <td>{{ $projet->description }}</td>
            <td>{{ $projet->status }}</td>
                <td>
                    {!! Form::open(['route' => ['projets.destroy', $projet->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('projets.show', [$projet->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('projets.edit', [$projet->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>