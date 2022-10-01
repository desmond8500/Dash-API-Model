<div class="card">
    <div class="row">
        <div class="col-auto">
            <img src="{{ asset("storage/$article->photo") }}" alt="A" class="avatar avatar-lg">
        </div>
        <div class="col">
            <h3 class="fw-bold">{{ $article->name }}</h3>
            <div class="text-muted">{{ $article->reference }}</div>
            <div class="text-muted">{{ $article->price }} CFA</div>
        </div>
    </div>
</div>
