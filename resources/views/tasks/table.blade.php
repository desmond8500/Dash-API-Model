<div class="table-responsive-sm">
    <table class="table table-striped" id="tasks-table">
        <thead>
            <tr>
                <th>Devis Id</th>
        <th>Objet</th>
        <th>Description</th>
        <th>Status Id</th>
        <th>Priority Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->devis_id }}</td>
            <td>{{ $task->objet }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->status_id }}</td>
            <td>{{ $task->priority_id }}</td>
                <td>
                    {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tasks.show', [$task->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('tasks.edit', [$task->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>