<div class="table-responsive-sm">
    <table class="table table-striped" id="systems-table">
        <thead>
            <tr>
                <th>Projet Id</th>
        <th>Invoice Id</th>
        <th>Name</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($systems as $system)
            <tr>
                <td>{{ $system->projet_id }}</td>
            <td>{{ $system->invoice_id }}</td>
            <td>{{ $system->name }}</td>
            <td>{{ $system->description }}</td>
                <td>
                    {!! Form::open(['route' => ['systems.destroy', $system->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('systems.show', [$system->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('systems.edit', [$system->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>