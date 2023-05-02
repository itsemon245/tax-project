@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'basic-datatable';
@endphp
<table id="{{ $id }}" class="table table-striped dt-responsive nowrap w-100">
    {{ $slot }}
</table>
