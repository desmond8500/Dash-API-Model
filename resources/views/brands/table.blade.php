<div class="table-responsive-sm">
    <table class="table table-striped" id="brands-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Logo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->name }}</td>
            <td>{{ $brand->logo }}</td>
                <td>
                    {!! Form::open(['route' => ['brands.destroy', $brand->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('brands.show', [$brand->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('brands.edit', [$brand->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>