<div class="table-responsive-sm">
    <table class="table table-striped" id="invoices-table">
        <thead>
            <tr>
                <th>Projet Id</th>
        <th>Reference</th>
        <th>Status</th>
        <th>Description</th>
        <th>Client Name</th>
        <th>Client Tel</th>
        <th>Client Address</th>
        <th>Discount</th>
        <th>Tva</th>
        <th>Brs</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->projet_id }}</td>
            <td>{{ $invoice->reference }}</td>
            <td>{{ $invoice->status }}</td>
            <td>{{ $invoice->description }}</td>
            <td>{{ $invoice->client_name }}</td>
            <td>{{ $invoice->client_tel }}</td>
            <td>{{ $invoice->client_address }}</td>
            <td>{{ $invoice->discount }}</td>
            <td>{{ $invoice->tva }}</td>
            <td>{{ $invoice->brs }}</td>
                <td>
                    {!! Form::open(['route' => ['invoices.destroy', $invoice->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('invoices.show', [$invoice->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('invoices.edit', [$invoice->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>