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
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Case Study', 'List']" />
    <x-backend.ui.section-card name="Case Study List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :items="$data">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Chalan No.</th>
                                    <th>Date</th>
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
                                        <td>{{ $chalan->chalan_no }}</td>
                                        <td>{{ $chalan->date->format('d/m/Y') }}</td>
                                        <td>{{ $chalan->amount }}</td>
                                        @canany(['manage chalan', 'read chalan'])
                                            <td>

                                                @can('read chalan')
                                                <x-backend.ui.button type="custom" href="{{ route('chalan.show', $chalan->id) }}"
                                                    class="btn-sm btn-dark">Show</x-backend.ui.button>
                                                @endcan

                                                @can('manage chalan')
                                                    <x-backend.ui.button type="custom" href="{{ route('chalan.edit', $chalan->id) }}"
                                                        class="btn-sm btn-info">Clone</x-backend.ui.button>
                                                    <x-backend.ui.button type="delete"
                                                        action="{{ route('chalan.destroy', $chalan->id) }}" class="btn-sm" />
                                                @endcan
                                            </td>
                                        @endcanany
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
