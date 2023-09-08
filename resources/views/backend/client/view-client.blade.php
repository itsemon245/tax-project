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
        @endpushA
        <x-backend.ui.breadcrumbs :list="['Backend', 'client', 'List']" />

        <x-backend.ui.section-card name="Client Section">

            <x-backend.table.basic>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Client Name</th>
                        <th>Company Name</th>
                        <th>Present Address</th>
                        <th>Prmentat Address</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($clients as $key => $client)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->company_name }}</td>
                            <td>{{ $client->present_address }}</td>
                            <td>{{ $client->parmentat_address }}</td>
                            <td>
                                <x-backend.ui.button type="edit" class="btn-primary btn-sm"
                                    href="{{ route('client.edit', $client->id) }}">Create</x-backend.ui.button>
                                <x-backend.ui.button type="delete" class="btn-primary btn-sm"
                                    action="{{ route('client.destroy', $client->id) }}"></x-backend.ui.button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-backend.table.basic>
            <div class="paginate  md-md-0 mt-3 mt-md-0 me-4 me-md-0">
                {{ $clients->links() }}
            </div>

        </x-backend.ui.section-card>


        @push('customJs')
            <script></script>
        @endpush
    @endsection
