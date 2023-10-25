@extends('backend.layouts.app')

@section('content')
    @push('customCss')
        <style>
            .paginate {
                float: right;
            }

            @page {
                size: A4;
                margin: 0 auto;
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
    <x-backend.ui.breadcrumbs :list="['Management', 'Expense', 'List']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="All Expenses">
        @can('create expense')
            <x-backend.ui.button type="custom" :href="route('expense.create')"
                class="btn-success btn-sm mb-1 d-print-none">Create</x-backend.ui.button>
        @endcan
        <div class="container ">
            <x-backend.table.basic :items="$expenses">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Date</th>
                        <th>Merchant</th>
                        <th>
                            <div>
                                Category
                            </div>
                            <div>
                                Description
                            </div>
                        </th>
                        <th>Cr</th>
                        <th>Dr</th>
                        <th>Balance</th>
                        @canany(['update expense', 'update expense', 'delete expense', 'print expense', 'read expense'])
                            <th>Actions</th>
                        @endcanany
                    </tr>
                <tbody>
                    @forelse ($expenses as $key=> $expense)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $expense->date->format('d M, Y') }}</td>
                            <td>{{ $expense->merchant }}</td>
                            <td style="max-width: 30ch;text-wrap:wrap;">
                                <h6 class="mb-0">Category: {{ $expense->category }}</h6>
                                <div class="">
                                    <ul class="list-unstyled">

                                        @foreach ($expense->items as $item)
                                            @if (gettype($item->description) === 'object')
                                                <li>
                                                    <div class="fw-medium">
                                                        Invoice No: {{ $item->description->invoice_number }}
                                                    </div>
                                                    <div class="fw-medium">
                                                        Invoice Date: {{ $item->description->invoice_issue_date }}
                                                    </div>
                                                    <div class="fw-medium text-black">
                                                        Client Name: {{ $item->description->client_name }}
                                                    </div>
                                                    <div class="fw-medium">
                                                        Company Name: {{ $item->description->company_name }}
                                                    </div>
                                                    <div class="fw-medium">
                                                        Client Tin: {{ $item->description->tin }}
                                                    </div>
                                                    <div class="fw-medium">
                                                        Reference No: {{ $item->description->ref_no }}
                                                    </div>
                                                </li>
                                            @else
                                                <li>
                                                    <div class="fw-medium text-black">
                                                        Amount: {{ $item->amount }}
                                                    </div>
                                                    <div>
                                                        <span class="fw-medium">Description:</span>
                                                        <div>{{ $item->description }}</div>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                            <td class="fw-bold text-success">
                                {!! $expense->type === 'credit'
                                    ? '+' . $expense->amount . '<span class="mdi mdi-currency-bdt font-16"></span>'
                                    : '' !!}
                            </td>
                            <td class="fw-bold text-danger">
                                {!! $expense->type === 'debit'
                                    ? '-' . $expense->amount . '<span class="mdi mdi-currency-bdt font-16"></span>'
                                    : '' !!}
                            </td>
                            <td>
                                @if ($expense->balance < 0)
                                    <span class="fw-bold text-danger">{{ $expense->balance }} ৳</span>
                                @else
                                    <span class="fw-bold text-success">{{ $expense->balance }} ৳</span>
                                @endif
                            </td>
                            @canany(['update expense', 'update expense', 'delete expense', 'print expense', 'read expense'])
                                <td>
                                    @can('read expense')
                                        <x-backend.ui.button type="custom" class="btn-info btn-sm print-btn"
                                            :href="route('expense.show', $expense->id)">View</x-backend.ui.button>
                                    @endcan
                                    @can('delete expense')
                                        {{-- <x-backend.ui.button type="delete" :href="route('expense.destroy', $expense->id)" class="btn-sm" /> --}}
                                        <form action="{{ route('expense.destroy', $expense->id) }}" method="post"
                                            class="d-inline-block py-0">
                                            @csrf
                                            @method('DELETE')
                                            <x-backend.ui.button
                                                class="btn-danger btn-sm text-capitalize">Delete</x-backend.ui.button>
                                        </form>
                                    @endcan
                                </td>
                            @endcanany
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No expenses yet</td>
                        </tr>
                    @endforelse
                </tbody>
                </thead>
            </x-backend.table.basic>
        </div>

    </x-backend.ui.section-card>
    @pushOnce('customJs')
        <script src="{{ asset('backend/assets/js/printThis.js') }}"></script>
    @endPushOnce
    @push('customJs')
        <script>
            $(document).ready(function() {
                $('.print-btn').on('click', function(e) {
                    $(e.target.dataset.target).printThis()
                })
            });
        </script>
    @endpush
@endsection
