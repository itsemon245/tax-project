@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Service', 'Create']" />

    <x-backend.ui.section-card name="Create New Service">

        <form action="" method="post">
            @csrf
            <input type="text" name="service_category_id" value="{{$subCategory->service_category_id}}" hidden />
            <input type="text" name="service_sub_category_id" value="{{$subCategory->id}}" hidden />

            {{-- rest of the fields goes down here --}}
        </form>
    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
