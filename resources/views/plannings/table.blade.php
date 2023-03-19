<div class="table-responsive-sm">
    <table class="table table-striped" id="plannings-table">
        <thead>
            <tr>
                <th>Batiment Id</th>
        <th>System Id</th>
        <th>Tache</th>
        <th>Date</th>
        <th>Etat</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($plannings as $planning)
            <tr>
                <td>{{ $planning->batiment_id }}</td>
            <td>{{ $planning->system_id }}</td>
            <td>{{ $planning->tache }}</td>
            <td>{{ $planning->date }}</td>
            <td>{{ $planning->Etat }}</td>
                <td>
                    {!! Form::open(['route' => ['plannings.destroy', $planning->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('plannings.show', [$planning->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('plannings.edit', [$planning->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>