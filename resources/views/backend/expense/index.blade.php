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

    <div id="advance-search" class="d-inline-block d-none"
        style="border-radius:50px; border: 2px solid var(--ct-gray-500);padding:3.5px 8px;" role="button">
        <span class="mdi mdi-filter-variant fs-5"></span> Advanced Search <span id="chevron-icon"
            class="mdi mdi-chevron-down fs-5"></span>
    </div>
    {{-- TODO: change advance search options here --}}
    <div id="advance-search-options" class="card rounded-3 d-none mt-2" style="border: 2px solid var(--ct-gray-500);">
        <div class="card-body">
            <form action="{{ url()->current() }}" class="row">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-sm-3">
                            <x-backend.form.text-input class="advance-filter-options mb-2" name="date_from"
                                label="Start Date" type="date" :value="request()->query('date_from')" />
                        </div>
                        <div class="col-sm-3">
                            <x-backend.form.text-input class="advance-filter-options mb-2" name="date_to" label="End Date"
                                type="date" :value="request()->query('date_to')" />
                        </div>
                        <div class="col-sm-3">
                            <x-form.selectize class="advance-filter-options mb-2" id="merchant" name="merchant"
                                label="Merchant" placeholder="Select Merchant" :canCreate="false">
                                @foreach ($merchants as $merchant)
                                    <option value="{{ $merchant }}" @selected(request()->query('merchant') == $merchant)>
                                        {{ str($merchant)->title() }}</option>
                                @endforeach
                            </x-form.selectize>
                        </div>
                        <div class="col-sm-3">
                            <x-form.selectize class="advance-filter-options mb-2" id="category" name="category"
                                label="Category" placeholder="Select Category" :canCreate="false">
                                @foreach ($categories as $category)
                                    <option value="{{ $category }}" @selected(request()->query('category') == $category)>
                                        {{ str($category)->title() }}</option>
                                @endforeach
                            </x-form.selectize>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <x-range-slider class="advance-filter-options" name="credit" id="credit"
                        from="{{ request()->query('credit_from') ?? $min }}"
                        to="{{ request()->query('credit_to') ?? $max }}" step='50'
                        icon="mdi mdi-currency-bdt"></x-range-slider>
                </div>
                <div class="col-lg-6">
                    <x-range-slider class="advance-filter-options" name="debit" id="debit"
                        from="{{ request()->query('debit') ?? $min }}" to="{{ request()->query('debit_to') ?? $max }}"
                        step='50' icon="mdi mdi-currency-bdt"></x-range-slider>
                </div>
                <div class="col-12 mt-2">
                    <div class="float-end">
                        <x-backend.ui.button type="custom" href="{{ route('expense.index') }}"
                            class="btn-sm btn-outline-danger">Reset
                        </x-backend.ui.button>
                        <x-backend.ui.button type="button" id="advance-search-close" class="btn-sm btn-outline-dark">
                            Close
                        </x-backend.ui.button>
                        <x-backend.ui.button id="apply-btn" type="submit"
                            class="btn-sm btn-primary">Apply</x-backend.ui.button>
                    </div>
                </div>
            </form>

        </div>
    </div>

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
                        <th>Credit</th>
                        @canany(['update expense', 'update expense', 'delete expense', 'print expense', 'read expense'])
                            <th>Actions</th>
                        @endcanany
                    </tr>
                <tbody>
                    @foreach ($expenses as $key => $expense)
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
                    @endforeach
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


                const filterWrapper = $('#basic-datatable_filter')
                // removes serach text from label
                $('#basic-datatable_filter label').contents().filter(function() {
                    return this.nodeType === 3;
                }).remove();
                const search = $('#basic-datatable_filter input[type="search"]')
                const searchLabel = search.parent()
                const advanceSearch = $('#advance-search')
                const advanceSearchOptions = $('#advance-search-options')
                advanceSearchOptions.removeClass('d-none')
                advanceSearchOptions.hide()


                search
                    .removeClass('form-control form-control-sm')
                    .css({
                        'border': 'none',
                        'outline': 'transparent',
                        'padding': 0,
                        'margin-left': 8
                    })
                    .attr('placeholder', 'Search')
                searchLabel
                    .prepend('<span class="fas fa-search"></span>')
                    .css({
                        'border': '2px solid var(--ct-gray-500)',
                        'border-radius': '50px',
                        'padding': '4px 1rem',
                        'display': 'inline-flex',
                        'align-items': 'baseline',
                    })


                // console.log(searchLabel);
                filterWrapper.append(advanceSearch.removeClass('d-none'))
                $('#basic-datatable_wrapper').children().first().after(advanceSearchOptions);
                advanceSearch.click(e => {
                    e.preventDefault()
                    advanceSearch.find('#chevron-icon').toggleClass('mdi-chevron-down')
                    advanceSearch.find('#chevron-icon').toggleClass('mdi-chevron-up')
                    $('#advance-search-options').slideToggle()
                })
                $('#advance-search-close').click(e => {
                    e.preventDefault()
                    advanceSearch.find('#chevron-icon').toggleClass('mdi-chevron-down')
                    advanceSearch.find('#chevron-icon').toggleClass('mdi-chevron-up')
                    $('#advance-search-options').slideToggle()
                })
            });
        </script>
    @endpush
@endsection
