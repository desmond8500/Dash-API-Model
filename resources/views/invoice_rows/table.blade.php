<div class="table-responsive-sm">
    <table class="table table-striped" id="invoiceRows-table">
        <thead>
            <tr>
                <th>Invoice Id</th>
        <th>Article Id</th>
        <th>Reference</th>
        <th>Quantity</th>
        <th>Coef</th>
        <th>Priority</th>
        <th>Section Id</th>
        <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($invoiceRows as $invoiceRow)
            <tr>
                <td>{{ $invoiceRow->invoice_id }}</td>
            <td>{{ $invoiceRow->article_id }}</td>
            <td>{{ $invoiceRow->reference }}</td>
            <td>{{ $invoiceRow->quantity }}</td>
            <td>{{ $invoiceRow->coef }}</td>
            <td>{{ $invoiceRow->priority }}</td>
            <td>{{ $invoiceRow->section_id }}</td>
            <td>{{ $invoiceRow->name }}</td>
                <td>
                    {!! Form::open(['route' => ['invoiceRows.destroy', $invoiceRow->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('invoiceRows.show', [$invoiceRow->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('invoiceRows.edit', [$invoiceRow->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>