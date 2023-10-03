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
    @php
        $number = new \NumberFormatter('en_BD', \NumberFormatter::DEFAULT_STYLE);
    @endphp
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Chalan', 'List']" />
    <x-backend.ui.section-card name="Chalan List">
        <x-backend.ui.button type="custom" href="{{ route('chalan.create') }}"
            class="btn-success btn-sm mb-2 d-print-none">Create</x-backend.ui.button>

        <x-backend.table.basic :items="$data">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Chalan No.</th>
                    <th>Client Info</th>
                    <th>Ammount</th>
                    @canany(['manage chalan', 'read chalan'])
                        <th>Action</th>
                    @endcanany
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $key => $chalan)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $chalan->date->format('d/m/Y') }}</td>
                        <td>{{ $chalan->chalan_no }}</td>
                        <td>
                            <div class="fw-bold">
                                <span>Client:</span>
                                <span id="name" class="text-capitalize">{{ $chalan->client?->name }}</span>
                            </div>
                            <div class="fw-medium" id="client-info">
                                <div class="">
                                    <span>Company:</span>
                                    <span id="company" class="text-capitalize">{{ $chalan->client?->company_name }}</span>
                                </div>

                                <div class="">
                                    <span>Tin:</span>
                                    <span id="tin">{{ $chalan->client?->tin }}</span>
                                </div>
                                <div class="">
                                    <span>Circle:</span>
                                    <span id="circle">{{ $chalan->client?->circle }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>{{ $number->format($chalan->amount) }} TK</div>
                            @if ($chalan->payment_type == 'bank')
                                <div>Cheque No: <span>{{ $chalan->cheque_no }}</span></div>
                                <div>Date: <span>{{ $chalan->cheque_expire_date }}</span></div>
                                <div>Bank: <span>{{ $chalan->bank }}</span></div>
                                <div>Branch: <span>{{ $chalan->branch }}</span></div>
                            @endif
                        </td>
                        @canany(['manage chalan', 'read chalan'])
                            <td>

                                @can('read chalan')
                                    <x-backend.ui.button type="custom" href="{{ route('chalan.show', $chalan->id) }}"
                                        class="btn-sm btn-dark">Show</x-backend.ui.button>
                                @endcan

                                @can('manage chalan')
                                    <x-backend.ui.button type="edit" href="{{ route('chalan.edit', $chalan->id) }}"
                                        class="btn-sm btn-info">Edit</x-backend.ui.button>
                                    <x-backend.ui.button type="custom" href="{{ route('chalan.clone', $chalan->id) }}"
                                        class="btn-sm btn-secondary">Clone</x-backend.ui.button>
                                    <x-backend.ui.button type="delete" action="{{ route('chalan.destroy', $chalan->id) }}"
                                        class="btn-sm" />
                                @endcan
                            </td>
                        @endcanany
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>

    <!-- end row-->

    @push('customJs')
        <script>
            var heroDelete = $('#delete-item');
            heroDelete.on('click', function() {
                var form = $(this).next('form')
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        form.submit()
                    }
                })
            })
        </script>
    @endpush
@endsection
