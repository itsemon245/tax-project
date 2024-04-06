@extends('backend.layouts.app')
@push('customCss')
    <link href="{{ asset('backend/assets/libs/mohithg-switchery/switchery.min.css') }}" rel="stylesheet" type="text/css">
@endpush
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
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Promo Code', 'View']" />

    <x-backend.ui.section-card name="Promo Code List">
        @can('manage promo code')
        <x-backend.ui.button type="custom" :href="route('promo-code.create')" class="btn-success rounded-3 btn-sm mb-2">Create New
        </x-backend.ui.button>
        @endcan
        <x-backend.table.basic :items="$promos">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Promo Code</th>
                    <th>Discount</th>
                    <th>Expired</th>
                    @can('manage promo code')
                    <th>Status</th>
                    <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($promos as $key => $promo)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $promo->code }}</td>
                        <td>{{ $promo->amount }}
                            @if ($promo->is_discount)
                                %
                            @else
                                <span class="mdi mdi-currency-bdt font-16"></span>
                            @endif
                        </td>
                        <td>{{ Carbon\Carbon::parse($promo->expired_at)->diffForHumans() }}</td>
                        @can('manage promo code')
                            <td>
                                <div class="form-check form-switch ">
                                    <input data-id="{{ $promo->id }}" type="checkbox" class="form-check-input toggle-status"
                                        id="toggle-status" @checked($promo->status)>
                                </div>
                            </td>
                            <td>
                                <button id="{{ $promo->id }}"
                                    class="delete-promo btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                <form action="{{ route('promo-code.destroy', $promo->id) }}"
                                    id="delete-form-{{ $promo->id }}" method="post" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>
@endsection

@push('customJs')
    <script>
        $(document).ready(function() {
            $('.toggle-status').each((i, element) => {
                element.addEventListener('change', e => {
                    console.log(e.target.dataset);
                    let id = e.target.dataset.id
                    let url = "{{ route('ajax.toggle-status', 'PARAM') }}"
                    url = url.replace('PARAM', id);
                    console.log(url);
                    $.ajax({
                        type: "post",
                        url: url,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            table: 'promo_codes'
                        },
                        dataType: "json",
                        success: function(response) {
                            Toast.fire({
                                title: response.message,
                                icon: 'success',
                            })
                        }
                    });
                })
            })

            $('.delete-promo').each((i, btn) => {
                btn.addEventListener('click', e => deletePromo(e.target.id))
            })

            const deletePromo = (id) => {
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
                        // Swal.fire({
                        //     title: 'Deleted',
                        //     text: "Your file has been deleted.",
                        //     icon: 'success',
                        //     showConfirmButton: false
                        // })
                        $("#delete-form-" + id).submit()
                    }
                })
            }

        });
    </script>
@endpush
