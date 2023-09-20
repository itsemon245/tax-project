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
    <x-backend.ui.breadcrumbs :list="['Course', 'Index']" />
    <x-backend.ui.section-card name="All Courses">
        @can('manage course')
        <x-backend.ui.button type="custom" :href="route('course.create')" class="btn-success btn-sm mb-2"><span
            class="fw-bold fs-5 me-1">+</span>New Course</x-backend.ui.button>
        @endcan
        <div class="table-responsive">
            <x-backend.table.basic :data="$courses">
                <thead class="table-light">
                    <tr>
                        <th class="">No</th>
                        <th class="">Name</th>
                        <th class="">Price</th>
                        <th class="">Trainer</th>
                        @canany(['manage course', 'read course'])
                        <th class="" style="width: 80px;">Action</th>
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $key => $course)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>

                                <a href="{{ route('video.byCourse', $course->id) }}"
                                    class="d-flex align-items-start gap-2 text-reset">
                                    <div>
                                        <span data-feather="folder" class="icon-dual"></span>
                                    </div>
                                    <div>
                                        <div class="fw-medium">{{ $course->name }}</div>
                                        <div>{{ $course->videos()->count() }} Videos</div>
                                    </div>
                                </a>
                            </td>
                            <td>
                                {{ $course->price }}
                            </td>
                            <td>
                                <div class="d-flex align-items-start gap-2">
                                    <div>
                                        <img loading="lazy" src="{{ asset('backend/assets/images/users/user-1.jpg') }}"
                                            class="rounded rounded-circle" width="48px" height="48px" alt="">
                                    </div>
                                    <div>
                                        <div class="fw-medium">
                                            <a href="javascript: void(0);"
                                                class="text-reset">{{ fake()->name('female') }}</a>
                                        </div>
                                        <span>{{ fake()->jobTitle() }}</span>
                                    </div>
                                </div>
                            </td>


                            <td>
                                <div>
                                    @can('read course')
                                    <x-backend.ui.button type="custom" class="btn-sm text-capitalize btn-dark "
                                    href="{{ route('course.backend.show', $course->id) }}">
                                    Preview
                                    </x-backend.ui.button>
                                    @endcan
                                    @can('manage course')
                                    <x-backend.ui.button type="edit" class="btn-sm text-capitalize btn-info mx-1"
                                    href="{{ route('course.edit', $course->id) }}">
                                    </x-backend.ui.button>
                                    <x-backend.ui.button type="delete" class="btn-sm text-capitalize btn-danger "
                                        action="{{ route('course.destroy', $course->id) }}">
                                    </x-backend.ui.button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="text-center">No Items Found</div>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
                </table>
            </x-backend.table.basic>
    </x-backend.ui.section-card>
@endsection
