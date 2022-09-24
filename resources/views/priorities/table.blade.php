<div class="table-responsive-sm">
    <table class="table table-striped" id="priorities-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Level</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($priorities as $priority)
            <tr>
                <td>{{ $priority->name }}</td>
            <td>{{ $priority->level }}</td>
                <td>
                    {!! Form::open(['route' => ['priorities.destroy', $priority->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('priorities.show', [$priority->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('priorities.edit', [$priority->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>