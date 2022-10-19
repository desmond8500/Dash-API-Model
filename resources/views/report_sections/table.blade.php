<div class="table-responsive-sm">
    <table class="table table-striped" id="reportSections-table">
        <thead>
            <tr>
                <th>Report Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Order</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reportSections as $reportSection)
            <tr>
                <td>{{ $reportSection->report_id }}</td>
            <td>{{ $reportSection->title }}</td>
            <td>{{ $reportSection->description }}</td>
            <td>{{ $reportSection->order }}</td>
                <td>
                    {!! Form::open(['route' => ['reportSections.destroy', $reportSection->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('reportSections.show', [$reportSection->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('reportSections.edit', [$reportSection->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>