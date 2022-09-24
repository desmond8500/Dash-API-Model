<div class="table-responsive-sm">
    <table class="table table-striped" id="providers-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Logo</th>
        <th>Adress</th>
        <th>Website</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($providers as $provider)
            <tr>
                <td>{{ $provider->name }}</td>
            <td>{{ $provider->logo }}</td>
            <td>{{ $provider->adress }}</td>
            <td>{{ $provider->website }}</td>
                <td>
                    {!! Form::open(['route' => ['providers.destroy', $provider->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('providers.show', [$provider->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('providers.edit', [$provider->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>