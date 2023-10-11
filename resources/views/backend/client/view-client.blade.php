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
    <x-backend.ui.breadcrumbs :list="['Backend', 'client', 'List']" />

    <x-backend.ui.section-card name="Client Section">
        <div class="mb-2">
            <x-backend.ui.button type="custom" href="{{ route('client.create') }}"
                class="btn-sm btn-success fw-bold">Create</x-backend.ui.button>
            <x-backend.ui.button class="btn-sm fw-bold btn-info ms-1" data-bs-toggle="modal" data-bs-target="#modal-for-csv">Import
                CSV</x-backend.ui.button>
        </div>
        <div class="modal fade" id="modal-for-csv" tabindex="-1" aria-labelledby="modal-for-csv" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('client.createFromCsv') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-for-csv">Import From CSV</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <x-backend.form.text-input type="file" name="csv" label="Select CSV" accept=".csv" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Import</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <x-backend.table.basic :items="$clients">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Client Details</th>
                    <th>Company Details</th>
                    <th>Other Details</th>
                    <th>Address & Contact</th>
                    @can('manage client')
                        <th>Action</th>
                    @endcan
                </tr>
            </thead>

            <tbody>
                @foreach ($clients as $key => $client)
                    <tr>
                        @php
                            $sl = ++$key;
                            $sl = ($clients->perPage() * $clients->currentPage()) - ($clients->perPage() - $sl);
                        @endphp
                        <td>{{ $sl }}</td>
                        <td>
                            <div class="fw-bold font-16">
                                Name: {{ $client->name }}
                            </div>
                            <div class="fw-bold">
                                NID: {{ $client->nid }}
                            </div>
                            <div class="fw-bold">
                                Tin: {{ $client->tin }}
                            </div>
                            <div class="fw-medium">
                                Father Name: {{ $client->father_name }}
                            </div>
                            <div class="fw-medium">
                                Mother Name: {{ $client->mother_name }}
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold font-16">
                                Company Name: {{ $client->company_name }}
                            </div>
                            <div class="fw-bold mb-2">
                                Nature of Business: {{ $client->nature_of_business }}
                            </div>
                            <div class="fw-bold">
                                Taxpaye Status: {{ $client->taxpayer_status }}
                            </div>
                            <div class="mb-2">
                                <div class="fw-bold">
                                    Special Benefits:
                                </div>
                                <div class="fw-bold text-muted">
                                    {!! $client->special_benefits ?? 'N/A' !!}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold">
                                Zone: {{ $client->zone }}
                            </div>
                            <div class="fw-bold">
                                Circle: {{ $client->circle }}
                            </div>
                            <div class="fw-bold">
                                Ref. No: {{ $client->ref_no }}
                            </div>
                            <div class="fw-bold">
                                Spouse Name: {{ $client->spouse_name ?? 'N/A' }}
                            </div>
                            <div class="fw-bold">
                                Spouse TIN: {{ $client->spouse_tin ?? 'N/A' }}
                            </div>

                        </td>
                        <td>
                            <div class="mb-2">
                                <div class="fw-bold font-16">
                                    Present Address:
                                </div>
                                <div class="fw-bold text-muted">
                                    {{ $client->present_address }}
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="fw-bold font-16">
                                    Permanent Address:
                                </div>
                                <div class="fw-bold text-muted">
                                    {{ $client->permanent_address }}
                                </div>
                            </div>
                            @if ($client->phone)
                                <div class="mb-2">
                                    <div class="fw-bold font-16">
                                        Phone: {{ $client->phone }}
                                    </div>
                                </div>
                            @endif

                        </td>
                        @can('manage client')
                            <td>
                                <x-backend.ui.button type="edit" class="btn-primary btn-sm"
                                    href="{{ route('client.edit', $client->id) }}"></x-backend.ui.button>
                                <x-backend.ui.button type="delete" class="btn-primary btn-sm"
                                    action="{{ route('client.destroy', $client->id) }}"></x-backend.ui.button>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
