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
    <x-backend.ui.breadcrumbs :list="['Accounting', 'Referee List']" />
    <x-backend.ui.section-card name="List of referees">
        <x-backend.table.basic :items="$referees">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Details</th>
                    <th>Refer Link</th>
                    <th>Balance</th>
                    <th>Actions</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($referees as $key => $referee)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <p class="m-0">Name: {{ $referee->name }}</p>
                            <p class="m-0">User Name: {{ $referee->user_name }}</p>
                            <p class="m-0">Email: {{ $referee->email }}</p>
                        </td>
                        <td>
                            <a href="{{ $referee->refer_link }}">{{ $referee->refer_link }}</a>
                        </td>
                        <td>
                            <div class="row fs-5 fw-bold">
                                <div class="col-7">Total Earnings:</div>
                                <div class="col-5 text-end">{!! currencyFormat($referee->total_commission) !!}</div>

                                <div class="col-7">Total Withdrawn:</div>
                                <div class="col-5 text-success text-end"> - {!! currencyFormat($referee->withdrawn_commission) !!}</div>
                            </div>
                            <div class="bg-soft-success text-success row fs-5 fw-bold border-top border-2 mt-2 px-0">
                                <div class="col-7">Remaining Balance:</div>
                                <div class="col-5 text-end">{!! currencyFormat($referee->remaining_commission) !!}</div>
                            </div>
                        </td>
                        <td>
                            @if ($referee->commissionHistories->count())
                                <x-backend.ui.button type="custom" class="btn-primary"
                                    href="{{ route('commission.history', ['user' => $referee]) }}">
                                    See Commission History
                                </x-backend.ui.button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>
@endsection
