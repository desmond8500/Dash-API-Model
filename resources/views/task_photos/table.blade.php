<div class="table-responsive-sm">
    <table class="table table-striped" id="taskPhotos-table">
        <thead>
            <tr>
                <th>Task Id</th>
        <th>Name</th>
        <th>Folder</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($taskPhotos as $taskPhoto)
            <tr>
                <td>{{ $taskPhoto->task_id }}</td>
            <td>{{ $taskPhoto->name }}</td>
            <td>{{ $taskPhoto->folder }}</td>
                <td>
                    {!! Form::open(['route' => ['taskPhotos.destroy', $taskPhoto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('taskPhotos.show', [$taskPhoto->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('taskPhotos.edit', [$taskPhoto->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>