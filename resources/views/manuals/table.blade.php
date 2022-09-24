<div class="table-responsive-sm">
    <table class="table table-striped" id="manuals-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Type</th>
        <th>File</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($manuals as $manual)
            <tr>
                <td>{{ $manual->name }}</td>
            <td>{{ $manual->type }}</td>
            <td>{{ $manual->file }}</td>
                <td>
                    {!! Form::open(['route' => ['manuals.destroy', $manual->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('manuals.show', [$manual->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('manuals.edit', [$manual->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>