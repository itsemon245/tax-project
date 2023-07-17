@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Management', 'Invoice', 'List']" />

    <x-backend.ui.section-card name="Invoices">
        <div class="row mb-5">
            <div class="col-md-4 col-lg-3 col-xxl-2 mb-2">
                <div class="card h-100 shadow" style="border: medium dashed var(--ct-gray-400);">
                    <div class="card-body h-100">
                        <div class="d-flex flex-column align-items-center justify-content-center h-100">
                            <span class="text-success fw-bold display-5">+</span>
                            <span class="fw-bold text-muted fs-4">New Invoice</span>
                        </div>
                    </div>
                </div>
            </div>
            @foreach (range(1, 5) as $item)
                <div class="col-md-4 col-lg-3 col-xxl-2 mb-2">
                    <div class="card h-100 shadow border border-2">
                        <div class="card-body">
                            <p>0001</p>
                            <h6>Company Name</h6>
                            <p class='text-muted mb-0'>Issued: 1 Jul, 2023</p>
                            <p class='text-muted mb-0'>Due: 1 Agust, 2023</p>
                        </div>
                        <div class="bg-soft-success text-success w-100 p-1 text-center fw-bold" style="overflow:hidden;">
                            Sent
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
                                            <span class="fw-bold">{{ $invoice->amount_due . ' Tk' }}</span>
                                        </td>
                                        <td>{{ $invoice->status }}</td>
                                        <td>
                                            <x-backend.ui.button type="custom"
                                                href="{{ route('invoice.show', $invoice->id) }}" class="btn-sm btn-dark">
                                                View</x-backend.ui.button>
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
