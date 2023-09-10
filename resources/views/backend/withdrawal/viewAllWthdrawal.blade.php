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
    <x-backend.ui.breadcrumbs :list="['Accounting', 'Withdrawal']" />
    <x-backend.ui.section-card :name="request()->query('status') == '1' ? 'Approoved Withdrawls' : 'Pending Withdrawls'">
        <x-backend.table.basic :data="$withdrawals">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Detiles</th>
                    <th>Account Info</th>
                    <th>Commission</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($withdrawals as $key => $withdrawal)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <p class="m-0">Name: {{ $withdrawal->user->name }}</p>
                            <p class="m-0">User Name: {{ $withdrawal->user->user_name }}</p>
                        </td>
                        <td>
                            <p class="m-0">{{ Str::ucfirst($withdrawal->account_type) }}</p>
                            <p class="m-0">{{ $withdrawal->account_no }}</p>
                        </td>
                        <td>
                            <p class="m-0">Remaining Amount: {{ $withdrawal->user->remaining_commission }}</p>
                            <p class="m-0">Request Amount: {{ $withdrawal->amount }}</p>
                        </td>
                        <td>
                            <div class="btn-group">
                                <form action="{{ route('withdrawal.update', $withdrawal->user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" hidden class="d-none" name="withdrawal_id"
                                        value="{{ $withdrawal->id }}">
                                    <button class="btn btn-primary btn-sm">Payment</button>
                                </form>
                                <x-backend.ui.button type="delete" action="{{ route('withdrawal.destroy', $withdrawal) }}"
                                    class="btn-sm" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>
        <div class="paginate md-md-0 mt-3 mt-md-0 me-4 me-md-0">
            {{ $withdrawals->links() }}
        </div>
    </x-backend.ui.section-card>
@endsection
