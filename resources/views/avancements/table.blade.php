<div class="table-responsive-sm">
    <table class="table table-striped" id="avancements-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>System</th>
        <th>Building Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($avancements as $avancement)
            <tr>
                <td>{{ $avancement->name }}</td>
            <td>{{ $avancement->system }}</td>
            <td>{{ $avancement->building_id }}</td>
                <td>
                    {!! Form::open(['route' => ['avancements.destroy', $avancement->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('avancements.show', [$avancement->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('avancements.edit', [$avancement->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>