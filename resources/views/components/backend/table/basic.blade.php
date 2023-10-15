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

<table id="{{ $id }}" class="table table-striped dt-responsive nowrap w-100"
    data-page-length='{{ gettype($items) != 'string' ? count($items) : '' }}' data-length-change='false'
    data-search="false">
    {{ $slot }}
</table>
@if (method_exists($items, 'links'))
    <div id="myPaginator" class="paginate my-2">
        {{ $items->links() }}
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
@endPushOnce
