@extends('backend.layouts.app')
@section('content')
    @push('customCss')
        <style>
            .paginate {
                float: right;
            }

            div.dataTables_paginate {
                margin: 0;
                white-space: nowrap;
                text-align: right;
                display: none !important;
            }
        </style>
    @endpush
    <x-backend.ui.breadcrumbs :list="['Management', 'Purchase', 'View']" />


    <x-backend.ui.section-card name="Order">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :data="$payments">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Payment Number</th>
                                    <th>Transaction Id</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($payments as $key => $payemnt)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $payemnt->name }}</td>
                                        <td>{!! $payemnt->payment_number ??
                                            "<span class='badge bg-soft-danger font-12 text-danger font-12 p-1'>Pay Later</span>" !!}</td>
                                        <td>{!! $payemnt->trx_id ?? "<span class='badge bg-soft-danger font-12 text-danger font-12 p-1'>Pay Later</span>" !!}</td>
                                        <td>{{ $payemnt->paid ?? '0' }}</td>
                                        <td>{{ $payemnt->due ?? '0' }}</td>
                                        <td>
                                            {!! $payemnt->approved === 1
                                                ? "<span class='badge bg-success'>Approved</span>"
                                                : "<span class='badge bg-danger'>Not-Approved</span>" !!}
                                        </td>
                                        <td>
                                            @if (request()->query('status') == 0)
                                                <x-backend.ui.button type="custom"
                                                    href="{{ route('order.status', $payemnt->id) }}"
                                                    class="btn-sm btn-blue">Approve</x-backend.ui.button>
                                            @endif

                                            <x-backend.ui.button type="delete"
                                                action="{{ route('order.destroy', $payemnt->id) }}" class="btn-sm" />

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
@endsection

@push('customJs')
@endpush
