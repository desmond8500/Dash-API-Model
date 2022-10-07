<div class="table-responsive-sm">
    <table class="table table-striped" id="roomArticleDetails-table">
        <thead>
            <tr>
                <th>Room Article Id</th>
        <th>Saignee</th>
        <th>Fourreau</th>
        <th>Enduit</th>
        <th>Tirage</th>
        <th>Pose</th>
        <th>Connexion</th>
        <th>Test</th>
        <th>Service</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roomArticleDetails as $roomArticleDetail)
            <tr>
                <td>{{ $roomArticleDetail->room_article_id }}</td>
            <td>{{ $roomArticleDetail->saignee }}</td>
            <td>{{ $roomArticleDetail->fourreau }}</td>
            <td>{{ $roomArticleDetail->enduit }}</td>
            <td>{{ $roomArticleDetail->tirage }}</td>
            <td>{{ $roomArticleDetail->pose }}</td>
            <td>{{ $roomArticleDetail->connexion }}</td>
            <td>{{ $roomArticleDetail->test }}</td>
            <td>{{ $roomArticleDetail->service }}</td>
                <td>
                    {!! Form::open(['route' => ['roomArticleDetails.destroy', $roomArticleDetail->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('roomArticleDetails.show', [$roomArticleDetail->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('roomArticleDetails.edit', [$roomArticleDetail->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>