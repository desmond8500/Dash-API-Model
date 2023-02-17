<table>
    <thead>
        <tr>
            <th>Désignation</th>
            <th>Réference</th>
            <th>Description</th>
            <th>Priorité</th>
            <th>Quantité</th>
        </tr>
    </thead>
    <tbody>
    @foreach($articles as $article)
        <tr>
            <td>{{ $article->designation }}</td>
            <td>{{ $article->reference }}</td>
            <td>{{ $article->description }}</td>
            <td>{{ $article->priority }}</td>
            <td>{{ $article->quantity }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
