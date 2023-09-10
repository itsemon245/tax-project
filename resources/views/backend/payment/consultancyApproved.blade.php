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
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Purchase', 'View']" />
                </div>
                <h4 class="page-title">View Info</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <x-backend.ui.section-card name="Order">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :data="$payments">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Expert Name</th>
                                    <th>Purchase Name</th>
                                    <th>Payment Number</th>
                                    <th>transaction Id</th>
                                    <th>Paid</th>
                                    <th>due</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($payments as $key => $payemnt)
                                    @php
                                        $metaData = json_decode($payemnt->metadata, true);
                                    @endphp
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $payemnt->purchasable->name }}</td>
                                        <td>{{ $payemnt->name }}</td>
                                        <td>{{ $payemnt->payment_number }}</td>
                                        <td>{{ $payemnt->trx_id }}</td>
                                        <td>{{ $payemnt->paid }}</td>
                                        <td>{{ $payemnt->due }}</td>
                                        <td>
                                            {!! $payemnt->approved === 1
                                                ? "<span class='badge bg-success'>Approved</span>"
                                                : "<span class='badge bg-danger'>Not-Approved</span>" !!}
                                        </td>
                                        <td>
                                            <a href="{{ route('consultancy.order.status', $payemnt->id) }}"
                                                class="btn btn-blue btn-sm waves-effect waves-light d-inline-block">Approved</a>

                                            <form class="d-inline-block" action="{{ route('order.destroy', $payemnt->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm waves-effect waves-light"
                                                    id="delete">Delete</button>
                                            </form>
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
