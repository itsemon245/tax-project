@extends('backend.layouts.app')

@section('content')
    <x-backend.ui.breadcrumbs :list="['Course', 'Index']" />
    <x-backend.ui.section-card name="All Courses">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="border-0 ">No</th>
                        <th class="border-0">Name</th>
                        <th class="border-0">Price</th>
                        <th class="border-0">Trainer</th>
                        <th class="border-0">Videos</th>
                        <th class="border-0">Owner</th>
                        {{-- <th class="border-0">Members</th> --}}
                        <th class="border-0" style="width: 80px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $key => $course)
                    <tr>
                        <td class="fw-bold">{{++$key}}</td>
                        <td>
                            <i data-feather="folder" class="icon-dual"></i>
                            <span class="ms-2 fw-medium"><a href="javascript: void(0);" class="text-reset">{{$course->name}}</a></span>
                        </td>
                        <td>{{$course->price}}</td>
                        <td>
                            <p class="mb-0">Jan 03, 2020</p>
                            <span class="font-12">by Andrew</span>
                        </td>
                        <td>128 MB</td>
                        <td>
                            Danielle Thompson
                        </td>
                       
                        <td>
                            <div>
                                <x-backend.ui.button type="custom" class="btn-sm text-capitalize btn-dark " href="{{route('course.backend.show', $course->id)}}">
                                    Preview
                                </x-backend.ui.button>
                                <x-backend.ui.button type="edit" class="btn-sm text-capitalize btn-info mx-1" href="{{route('course.backend.edit', $course->id)}}">
                                </x-backend.ui.button>
                                <x-backend.ui.button type="delete" class="btn-sm text-capitalize btn-danger " action="{{route('course.backend.destroy', $course->id)}}">
                                </x-backend.ui.button>
                            </div>
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse

                </tbody>
            </table>
        </div>

    </x-backend.ui.section-card>
@endsection
