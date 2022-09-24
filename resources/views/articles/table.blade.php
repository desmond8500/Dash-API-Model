<div class="table-responsive-sm">
    <table class="table table-striped" id="articles-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Reference</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Brand Id</th>
        <th>Provider Id</th>
        <th>Storage Id</th>
        <th>Priority</th>
        <th>Price</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->name }}</td>
            <td>{{ $article->reference }}</td>
            <td>{{ $article->description }}</td>
            <td>{{ $article->quantity }}</td>
            <td>{{ $article->brand_id }}</td>
            <td>{{ $article->provider_id }}</td>
            <td>{{ $article->storage_id }}</td>
            <td>{{ $article->priority }}</td>
            <td>{{ $article->price }}</td>
                <td>
                    {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('articles.show', [$article->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('articles.edit', [$article->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>