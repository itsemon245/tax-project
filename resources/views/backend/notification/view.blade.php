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
        <x-backend.ui.button type="custom" :href="route('notification.create')" class="btn-success rounded-3 btn-sm mb-2">Create New
        </x-backend.ui.button>
        @endcan
        <x-backend.table.basic :items="$notifications">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Message</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notifications as $key => $notification)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <div>Name: {{$notification->user_name}}</div>
                            <div>Email: {{$notification->user_email}}</div>
                        </td>
                        <td style="max-width: 55ch">
                            <div>{!!json_decode($notification->data)->message!!}</div>
                        </td>
                        <td style="max-width: 55ch">
                            <div>{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</div>
                        </td>
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
