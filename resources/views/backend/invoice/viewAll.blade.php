@extends('backend.layouts.app')
@php
    $from = (int) now()
        ->subYears(20)
        ->format('Y');
    $to = (int) now()->format('Y');
    
    $months = [];
    foreach (range(1, 12) as $i) {
        $dt = now();
        $dt->month = $i;
        $months[] = $dt->format('F');
    }
@endphp

@push('customCss')
    <link rel="stylesheet" href="{{ asset('libs/nouislider/dist/nouislider.min.css') }}">
@endpush

@section('content')
    <x-backend.ui.breadcrumbs :list="['Management', 'Invoice', 'List']" />

    <x-backend.ui.section-card name="Invoices">

        <div id="advance-search" class="d-inline-block d-none"
            style="border-radius: 0 25px 25px 0; border: 2px solid var(--ct-gray-500);padding:3.5px 8px;" role="button">
            <span class="mdi mdi-filter-variant fs-5"></span> Advanced Search <span class="mdi mdi-chevron-down fs-5"></span>
        </div>
        <div id="advance-search-options" class="card" style="border: 2px solid var(--ct-gray-500);">
            <form id="parsely-form" action="javasript: void(0);">
                <div class="card-body">
                    <div class="d-flex gap-3 align-items-center">
                        <x-backend.form.select-input label="From Year" placeholder="From Year">
                            @foreach (range($to, $from) as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </x-backend.form.select-input>
                        <x-backend.form.select-input label="To Year" placeholder="To Year">
                            @foreach (range($to, $from) as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </x-backend.form.select-input>
                    </div>
                    <div class="d-flex gap-3 align-items-center">
                        <x-backend.form.select-input label="From Month" placeholder="From Month">
                            @foreach ($months as $key => $month)
                                <option value="{{ --$key }}">{{ $month }}</option>
                            @endforeach
                        </x-backend.form.select-input>
                        <x-backend.form.select-input label="To Month" placeholder="To Month">
                            @foreach ($months as $key => $month)
                                <option value="{{ --$key }}">{{ $month }}</option>
                            @endforeach
                        </x-backend.form.select-input>
                    </div>
                    <x-backend.form.select-input label="Payment Stauts" placeholder="Payment Stauts">
                        @foreach (['draft', 'sent', 'partial', 'paid', 'due', 'overdue'] as $status)
                            <option value="{{ $status }}">{{ str($status)->title() }}</option>
                        @endforeach
                    </x-backend.form.select-input>
                    <div class="row align-items-center">
                        <div class="col-2">
                            <x-backend.form.text-input class="p-1 " label="Min" name='min' />
                        </div>

                        <div class="col-8">
                            <div id="slider" class="mt-2"></div>
                        </div>
                        <div class="col-2">
                            <x-backend.form.text-input class="p-1 " label="Max" name='max' />
                        </div>
                    </div>
                </div>
                <button>Submit</button>
            </form>
        </div>
        <h5 class="p-3">Recently Updated</h5>
        <div class="d-none d-sm-flex flex-wrap justify-content-center gap-3 mb-5"
            style="height:220px; overflow-x: hidden; overflow-y:hidden;">
            <a href="{{ route('invoice.create') }}" class="" style="width: clamp(160px, 180px, 200px);">
                <div class="card h-100 shadow" style="border: medium dashed var(--ct-gray-400);">
                    <div class="card-body h-100">
                        <div class="d-flex flex-column align-items-center justify-content-center h-100">
                            <span class="text-success fw-bold display-5">+</span>
                            <span class="fw-bold text-muted fs-4">New Invoice</span>
                        </div>
                    </div>
                </div>
            </a>
            @foreach (range(1, 8) as $item)
                <div class="" style="width: clamp(160px, 180px, 200px);">
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
                    <h5 class="card-header bg-soft-light text-dark">All Invoices</h5>
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
        <script src="{{ asset('libs/nouislider/dist/nouislider.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                const filterWrapper = $('#basic-datatable_filter')
                // removes serach text from label
                $('#basic-datatable_filter label').contents().filter(function() {
                    return this.nodeType === 3;
                }).remove();
                const search = $('#basic-datatable_filter input[type="search"]')
                const searchLabel = search.parent()
                const advanceSearch = $('#advance-search')

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
                        'border-radius': '50px 0 0 50px',
                        'padding': '4px 1rem',
                        'display': 'inline-flex',
                        'align-items': 'baseline',
                    })


                console.log(searchLabel);
                filterWrapper.append(advanceSearch.removeClass('d-none'))

                let slider = document.getElementById('slider');
                let formatForSlider = {
                    from: function(formattedValue) {
                        return Number(formattedValue);
                    },
                    to: function(numericValue) {
                        return Math.round(numericValue);
                    }
                };


                noUiSlider.create(slider, {
                    start: [100, 10_000],
                    connect: true,
                    format: formatForSlider,
                    tooltips: {
                        // tooltips are output only, so only a "to" is needed
                        to: function(numericValue) {
                            return "&#2547 " + numericValue.toFixed(2);
                        }
                    },
                    step: 50,
                    range: {
                        'min': 100,
                        'max': 10_000
                    }
                });

                // console.log(slider.noUiSlider.get(true));

                slider.noUiSlider.on('update', (values) => {
                    let min = parseInt(values[0])
                    let max = parseInt(values[1])
                    $('input[name="min"]').val(min)
                    $('input[name="max"]').val(max)
                });
            });
        </script>
    @endpush
@endsection
