<div class="table-responsive-sm">
    <table class="table table-striped" id="reports-table">
        <thead>
            <tr>
                <th>Projet Id</th>
        <th>Objet</th>
        <th>Description</th>
        <th>Date</th>
        <th>Type</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ $report->projet_id }}</td>
            <td>{{ $report->objet }}</td>
            <td>{{ $report->description }}</td>
            <td>{{ $report->date }}</td>
            <td>{{ $report->type }}</td>
                <td>
                    {!! Form::open(['route' => ['reports.destroy', $report->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('reports.show', [$report->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('reports.edit', [$report->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>