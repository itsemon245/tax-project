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
                        <x-backend.table.basic :items="$payments">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Details</th>
                                    <th>Item Details</th>
                                    <th>Billing Details</th>
                                    <th>Transaction Details</th>
                                    <th>Status</th>
                                    <th>Approved Date</th>
                                    <th>Created At</th>
                                    @can('manage order')
                                        <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $key => $payment)
                                    <tr>

                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <b>Name: </b>{{ $payment->name }}
                                            <br />
                                            <b>Phone: </b>{{ $payment->user->phone }}
                                            <br />
                                            <b>Email: </b>{{ $payment->user->email }}
                                        </td>
                                        <td>
                                            <div><b>Name:</b>
                                                {{ $payment->purchasable->title ?? $payment->purchasable->name }}
                                            </div>
                                            <div><b>Type:</b> {{ $payment->purchasable_type }}</div>
                                            <div>
                                                <b>Price:</b>
                                                <b>
                                                    {!! currencyFormat($payment->purchasable->price) !!}
                                                </b>
                                            </div>
                                            @if ($payment->has_promo_code_applied)
                                                <div>
                                                    <b>Promo Discount:</b>
                                                    <b>
                                                        {!! currencyFormat($payment->discount) !!}
                                                    </b>
                                                </div>
                                            @else
                                                <div>No Promo Code Used</div>
                                            @endif

                                            @if ($payment->purchasable_type == 'Product')
                                                @if (json_decode($payment->metadata) != null)
                                                    <div class="fw-bold">Sources Of Income:</div>
                                                    <ul>
                                                        @foreach (json_decode($payment->metadata) as $source)
                                                            <li
                                                                style="width:130px;
                                                                white-space: normal;
                                                                overflow-wrap: break-word!important;
                                                            word-wrap: break-word!important;
                                                        word-break: break-word!important;">
                                                                {{ str($source)->title()->toString() }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            @endif

                                        </td>
                                        <td>
                                            @php
                                                $price = $payment->purchasable->price;
                                                $discount = $payment->discount ?? 0;
                                                $total = $price - $discount;
                                                $due = $payment->due >= 1 ? $payment->due : 0;
                                            @endphp
                                            <div class="row fs-5 fw-bold">
                                                <div class="col-7">Price:</div>
                                                <div class="col-5 text-end">{!! currencyFormat($price) !!}</div>

                                                <div class="col-7">Discount:</div>
                                                <div class="col-5 text-success text-end"> - {!! currencyFormat($discount) !!}</div>
                                            </div>
                                            <div class="row fs-5 fw-bold border-top border-2 mt-2 px-0">
                                                <div class="col-7">Sub Total:</div>
                                                <div class="col-5 text-end">{!! currencyFormat($total) !!}</div>
                                                <div class="col-7">Paid:</div>
                                                <div class="col-5 text-end text-danger"> - {!! currencyFormat($payment->paid) !!}</div>
                                            </div>
                                            <div
                                                class="bg-soft-success text-success row fs-5 fw-bold border-top border-2 mt-2 px-0">
                                                <div class="col-7">Due:</div>
                                                <div class="col-5 text-end">{!! currencyFormat($due) !!}</div>
                                            </div>

                                        </td>
                                        <td>
                                            @if ($payment->trx_id)
                                                <div class="row fs-5 fw-bold">
                                                    <div class="col-5 ">Trx ID:</div>
                                                    <div class="col-7">{!! $payment->trx_id !!}</div>
                                                </div>
                                                <div class="row fs-5 fw-bold">
                                                    <div class="col-5 ">Method:</div>
                                                    <div class="col-7">{!! $payment->payment_method !!}</div>
                                                </div>
                                                <div class="row fs-5 fw-bold">
                                                    <div class="col-5 ">Number:</div>
                                                    <div class="col-7">{!! $payment->payment_number !!}</div>
                                                </div>
                                            @else
                                                <div class="fw-bold fs-5">Will Pay Later</div>
                                            @endif
                                        </td>
                                        <td>
                                            {!! $payment->approved === 1
                                                ? "<span class='badge bg-success'>Approved</span>"
                                                : "<span class='badge bg-danger'>Not-Approved</span>" !!}
                                        </td>
                                        <td>{{ $payment->approved_at?->format('d F, Y') ?? 'No Approved Date' }}</d>
                                        <td>{{ $payment->created_at->format('d F, Y') }}</td>
                                        @can('manage order')
                                            <td>
                                                @if (!$payment->approved)
                                                    <a href="{{ route('order.status', $payment->id) }}"
                                                        class="btn btn-info btn-sm">Approve</a>
                                                @endif
                                                <x-backend.ui.button type="delete" class="btn-sm" :action="route('order.destroy', $payment->id)" />
                                            </td>
                                        @endcan
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
