<div class="table-responsive-sm">
    <table class="table table-striped" id="avancementSubRows-table">
        <thead>
            <tr>
                <th>Avancement Row Id</th>
        <th>Name</th>
        <th>Start</th>
        <th>End</th>
        <th>Progress</th>
        <th>Comment</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($avancementSubRows as $avancementSubRow)
            <tr>
                <td>{{ $avancementSubRow->avancement_row_id }}</td>
            <td>{{ $avancementSubRow->name }}</td>
            <td>{{ $avancementSubRow->start }}</td>
            <td>{{ $avancementSubRow->end }}</td>
            <td>{{ $avancementSubRow->progress }}</td>
            <td>{{ $avancementSubRow->comment }}</td>
                <td>
                    {!! Form::open(['route' => ['avancementSubRows.destroy', $avancementSubRow->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('avancementSubRows.show', [$avancementSubRow->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('avancementSubRows.edit', [$avancementSubRow->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>