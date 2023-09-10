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
    <x-backend.ui.breadcrumbs :list="['Management', 'Expense', 'List']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="All Expenses">
        <x-backend.ui.button type="custom" :href="route('expense.create')" class="btn-success btn-sm mb-1">Create</x-backend.ui.button>
        <div class="container">
            <x-backend.table.basic :data="$expenses">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Date</td>
                        <td>Spend On</td>
                        <td>Description</td>
                        <td>Amount</td>
                        <td>Actions</td>
                    </tr>
                <tbody>
                    @forelse ($expenses as $key=> $expense)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ Carbon\Carbon::parse($expense->date)->format('d M, Y') }}</td>
                            <td>{{ $expense->spend_on }}</td>
                            <td style="max-width: 30ch;text-wrap:wrap;">
                                <div>
                                    {{ $expense->description }}
                                </div>
                            </td>
                            <td>{{ $expense->amount }} <span class="mdi mdi-currency-bdt font-16"></span></td>
                            <td>
                                <x-backend.ui.button type="edit" :href="route('expense.edit', $expense->id)" class="btn-sm" />
                                <x-backend.ui.button type="delete" :href="route('expense.destroy', $expense->id)" class="btn-sm" />

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No expenses yet</td>
                        </tr>
                    @endforelse
                </tbody>
                </thead>
            </x-backend.table.basic>
            <div class="paginate  md-md-0 mt-3 mt-md-0 me-4 me-md-0">
                {{ $expenses->links() }}
            </div>
        </div>
    </x-backend.ui.section-card>
    @push('customJs')
    @endpush
@endsection
