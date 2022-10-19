<div class="table-responsive-sm">
    <table class="table table-striped" id="reportPeoples-table">
        <thead>
            <tr>
                <th>Report Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Company</th>
        <th>Job</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reportPeoples as $reportPeople)
            <tr>
                <td>{{ $reportPeople->report_id }}</td>
            <td>{{ $reportPeople->firstname }}</td>
            <td>{{ $reportPeople->lastname }}</td>
            <td>{{ $reportPeople->company }}</td>
            <td>{{ $reportPeople->job }}</td>
                <td>
                    {!! Form::open(['route' => ['reportPeoples.destroy', $reportPeople->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('reportPeoples.show', [$reportPeople->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('reportPeoples.edit', [$reportPeople->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>