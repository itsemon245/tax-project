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
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Exams']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Exams">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('exams.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Exam Name" type="text" class="mb-2" name="name"
                                required />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.select-input id="course" label="Select Course" name="course"
                                placeholder="Choose Course...">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </x-backend.form.select-input>
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Total Marks" class="mb-2" type="number" name="total_marks"
                                required />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Passing Marks" class="mb-2" type="number"
                                name="passing_marks" required />
                        </div>
                    </div>
                    <x-backend.ui.button class="btn-primary w-100 btn-sm mt-1">Create</x-backend.ui.button>
                </form>
            </div>
            <div class="col-md-6 mt-3">
                <x-backend.table.basic :data="$exams">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($exams as $key => $exam)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <b>{{ $exam->name }}</b><br>
                                    <small class="text-muted">Course: {{ $exam->course->name }}</small><br>
                                    <small class="text-muted">Total Marks: {{ $exam->total_marks }}</small><br>
                                    <small class="text-muted">Passing Marks: {{ $exam->passing_marks }}</small>
                                </td>
                                <td>
                                    <a href="{{ Route('questions.show', $exam->id) }}"
                                        class="btn btn-success btn-sm waves-effect waves-light">Questions</a>
                                    <a href="{{ Route('exams.edit', $exam) }}"
                                        class="btn btn-blue btn-sm waves-effect waves-light">Edit</a>
                                    <button onclick='deleteinfo("examDelete-{{ $exam->id }}")'
                                        class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                    <form class="d-none" id="examDelete-{{ $exam->id }}"
                                        action="{{ Route('exams.destroy', $exam) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-backend.table.basic>
            </div>
        </div>
    </x-backend.ui.section-card>
    @push('customJs')
        <script>
            const deleteinfo = id => {
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
                        Swal.fire({
                            title: 'Deleted',
                            text: "Your file has been deleted.",
                            icon: 'success',
                            showConfirmButton: false
                        })
                        $("#" + id).submit()
                    }
                })

            }
        </script>
    @endpush
@endsection
