@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Management', 'Invoice', 'List']" />

    <x-backend.ui.section-card name="Invoice List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client Info</th>
                                    <th>Issue Date</th>
                                    <th>Due Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($invoices as $key => $invoice)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $invoice->client->name }}</td>
                                        <td>{{ Carbon\Carbon::parse($invoice->issue_date)->format('d M Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('d M Y') }}</td>
                                        <td>
                                            <span class="fw-bold">{{ $invoice->amount_due. " Tk" }}</span>
                                        </td>
                                        <td>{{ $invoice->status }}</td>
                                        <td>
                                            <x-backend.ui.button type="custom" href="{{ route('invoice.show', $invoice->id) }}"
                                                class="btn-sm btn-dark">View</x-backend.ui.button>
                                            <x-backend.ui.button type="delete"
                                                action="{{ route('invoice.destroy', $invoice->id) }}" class="btn-sm" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-backend.table.basic>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </x-backend.ui.section-card>

    <!-- end row-->

    @push('customJs')
    @endpush
@endsection
