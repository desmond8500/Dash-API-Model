<div class="table-responsive-sm">
    <table class="table table-striped" id="reportModalites-table">
        <thead>
            <tr>
                <th>Section Id</th>
        <th>Duree</th>
        <th>Technicien</th>
        <th>Ouvrier</th>
        <th>Complexite</th>
        <th>Risque</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reportModalites as $reportModalite)
            <tr>
                <td>{{ $reportModalite->section_id }}</td>
            <td>{{ $reportModalite->duree }}</td>
            <td>{{ $reportModalite->technicien }}</td>
            <td>{{ $reportModalite->ouvrier }}</td>
            <td>{{ $reportModalite->complexite }}</td>
            <td>{{ $reportModalite->risque }}</td>
                <td>
                    {!! Form::open(['route' => ['reportModalites.destroy', $reportModalite->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('reportModalites.show', [$reportModalite->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('reportModalites.edit', [$reportModalite->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>