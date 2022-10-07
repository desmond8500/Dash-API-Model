<div class="table-responsive-sm">
    <table class="table table-striped" id="invoiceSections-table">
        <thead>
            <tr>
                <th>Invoice Id</th>
        <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($invoiceSections as $invoiceSection)
            <tr>
                <td>{{ $invoiceSection->invoice_id }}</td>
            <td>{{ $invoiceSection->name }}</td>
                <td>
                    {!! Form::open(['route' => ['invoiceSections.destroy', $invoiceSection->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('invoiceSections.show', [$invoiceSection->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('invoiceSections.edit', [$invoiceSection->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>