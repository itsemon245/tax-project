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
    <x-backend.ui.breadcrumbs :list="['Accounting', 'Commission History']" />
    <x-backend.ui.section-card name="{{$user->name}}'s Commission History <br> <span style='font-weight:400;font-size:14px;'>{{$user->email}}</span>">
        <x-backend.table.basic :items="$histories">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Referral Details</th>
                    <th>Transaction Details</th>
                    <th>Amount</th>
                    <th>Percentage</th>
                    <th>Earning</th>
                    <th>Date</th>
                   
                </tr>
            </thead>

            <tbody>
                @foreach ($histories as $key => $history)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <p class="m-0">Name: {{ $history->referee->name}}</p>
                            <p class="m-0">User Name: {{ $history->referee->user_name }}</p>
                        </td>
                        <td>
                            <p class="m-0">Item Name:{{ $history->item_name }}</p>
                            <p class="m-0">Item Type:{{ $history->item_type }}</p>
                            <p class="m-0">Transaction ID:{{ $history->trx_id }}</p>
                        </td>
                        <td>
                            <p class="m-0 fw-bold">{!! currencyFormat($history->item_price) !!}</p>

                        </td>
                        <td class="fw-bold">
                            {{ round($history->percentage) }} %
                        </td>
                        <td class="fw-bold">
                            {!! currencyFormat($history->earning)!!}
                        </td>
                        <td>{{$history->created_at->format('F d, Y')}}</td>

                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>
@endsection
