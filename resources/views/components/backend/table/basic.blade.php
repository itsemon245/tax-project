@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'basic-datatable';
@endphp
@props(['items' => ''])
@pushOnce('customCss')
    {{-- data table css --}}
    <link href="{{ asset('backend/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css') }}" rel="stylesheet"
        type="text/css" />
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
@endPushOnce
@hasrole('super admin')
    @if ($items->first())
        <x-backend.ui.button type="button" data-bs-toggle="modal" data-bs-target="#modal-for-bulk-delete"
            class="btn-primary btn-sm mb-2 ms-1">
            Bulk Delete
        </x-backend.ui.button>
        <div class="modal fade" id="modal-for-bulk-delete" tabindex="-1" aria-labelledby="modal-for-bulk-delete"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-for-csv">Delete items by date</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="bulk-delete-form" action="{{ route('bulk.delete') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        @php
                            $row = $items->first();
                            $className = get_class($row);
                            if ($className != 'stdClass') {
                                $table = str($className)->explode('\\')->pop();
                                $table = str($table)->snake()->plural()->toString();
                            } elseif ($row->notifiable_id) {
                                $table = 'notifications';
                            }
                        @endphp
                        <input type="hidden" name="table" value="{{ $table }}">
                        <div class="modal-body">
                            <div class="d-flex gap-3 align-items-center justify-content-center">
                                <x-backend.form.text-input required type="date" label="From"
                                    name="bulk_delete_from"></x-backend.form.text-input>
                                <x-backend.form.text-input required type="date" label="To"
                                    name="bulk_delete_to"></x-backend.form.text-input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="button" id="bulk-delete-btn">Delete</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endif
@endhasrole
<table id="{{ $id }}" class="table table-striped dt-responsive nowrap w-100"
    data-page-length='{{ gettype($items) != 'string' ? count($items) : 1 }}' data-length-change='false'
    data-search="false">
    {{ $slot }}
</table>
@if (method_exists($items, 'links'))
    <div id="myPaginator" class="paginate my-2">
        {{ $items->onEachSide(3)->links() }}
    </div>
@endif

@pushOnce('customJs')
    <!-- Datatables init -->
    <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>

    <!-- datatable js start -->
    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}">
    </script>
    <script>
        // replace the default paginatior with my paginator

        $(document).ready(function() {
            let search = $('#basic-datatable_filter')
            search.parent().removeClass('col-md-6')
            search.addClass('float-end')
            let paginator = $('#basic-datatable_paginate').parent().parent()
            paginator.children().remove()
            let myPaginator = $('#myPaginator')
            paginator.children().remove()
            paginator.append(myPaginator)
        });
    </script>
    <!-- datatable js ends -->

    @if ($items->first())
        <!-- Bulk delete -->
        <script>
            $(function() {
                $('#bulk-delete-btn').on('click', () => {
                    BulkDelete.fire()
                        .then((result) => {
                            if (result.isConfirmed) {
                                document.querySelector('#bulk-delete-form').submit()
                            }
                        });
                })
            })
        </script>
    @endif
@endPushOnce
