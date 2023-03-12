<div class="table-responsive-sm">
    <table class="table table-striped" id="reportFiles-table">
        <thead>
            <tr>
                <th>Report Id</th>
        <th>Name</th>
        <th>Folder</th>
        <th>Extension</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reportFiles as $reportFiles)
            <tr>
                <td>{{ $reportFiles->report_id }}</td>
            <td>{{ $reportFiles->name }}</td>
            <td>{{ $reportFiles->folder }}</td>
            <td>{{ $reportFiles->extension }}</td>
                <td>
                    {!! Form::open(['route' => ['reportFiles.destroy', $reportFiles->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('reportFiles.show', [$reportFiles->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('reportFiles.edit', [$reportFiles->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>