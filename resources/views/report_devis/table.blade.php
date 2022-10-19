<div class="table-responsive-sm">
    <table class="table table-striped" id="reportDevis-table">
        <thead>
            <tr>
                <th>Section Id</th>
        <th>Devis Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reportDevis as $reportDevis)
            <tr>
                <td>{{ $reportDevis->section_id }}</td>
            <td>{{ $reportDevis->devis_id }}</td>
                <td>
                    {!! Form::open(['route' => ['reportDevis.destroy', $reportDevis->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('reportDevis.show', [$reportDevis->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('reportDevis.edit', [$reportDevis->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>