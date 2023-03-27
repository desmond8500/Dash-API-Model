<div class="row g-2">
    @foreach ($invoices as $invoice)
        <div class="col-md-6">
            <div class="card p-2">
                <div class="text-muted">{{ $invoice->reference }}</div>
                <div>
                    {{ $invoice->description }}
                </div>
            </div>
        </div>
    @endforeach
</div>
