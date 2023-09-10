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
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Exam', 'Questions']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="{!! $exam->name !!} Exams Questions">
        <div class="row">
            <div class="col-md-6">
                @if ($question !== null)
                    <form action="{{ route('questions.store') }}" method="post">
                        @csrf
                        <div class="card mb- border-0">
                            <div class="card-body">
                                <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                <div class="d-flex gap-2">
                                    <div class="flex-grow-1">
                                        <x-backend.form.text-input name="question" label="Question"
                                            placeholder="Enter a question here?" :value="$question->name" required />
                                    </div>
                                    <div>
                                        <x-backend.form.text-input type="number" name="mark" label="Mark"
                                            placeholder="Mark" required :value="$question->mark" />
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap">
                                    @foreach ($question->choices->options as $i => $option)
                                        <div
                                            class="w-50 {{ ($i + 1) % 2 === 0 ? 'ps-2' : 'pe-2' }} d-flex gap-2 align-items-center">
                                            <x-backend.form.text-input name="options[]" label="Option {{ $i }}"
                                                placeholder="Option {{ $i }}" :value="$option" required />
                                            <div class="form-check mb-2 form-check-success mt-3">
                                                <input class="form-check-input rounded-circle" type="radio" name="correct"
                                                    value="{{ $i }}" id="correct-{{ $i }}"
                                                    @checked($i === $question->choices->correct)>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <x-backend.ui.button class="btn-primary w-100 mt-2">Update</x-backend.ui.button>
                            </div>
                        </div>
                    </form>
                @else
                    <form action="{{ route('questions.store') }}" method="post">
                        @csrf
                        <div class="card mb- border-0">
                            <div class="card-body">
                                <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                                <div class="d-flex gap-2">
                                    <div class="flex-grow-1">
                                        <x-backend.form.text-input name="question" label="Question"
                                            placeholder="Enter a question here?" required />
                                    </div>
                                    <div>
                                        <x-backend.form.text-input type="number" name="mark" label="Mark"
                                            placeholder="Mark" required />
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap">
                                    @foreach (range(1, 4) as $i)
                                        <div
                                            class="w-50 {{ $i % 2 === 0 ? 'ps-2' : 'pe-2' }} d-flex gap-2 align-items-center">
                                            <x-backend.form.text-input name="options[]" label="Option {{ $i }}"
                                                placeholder="Option {{ $i }}" required />
                                            <div class="form-check mb-2 form-check-success mt-3">
                                                <input class="form-check-input rounded-circle" type="radio" name="correct"
                                                    value="{{ $i - 1 }}" id="correct-{{ $i }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <x-backend.ui.button class="btn-primary w-100 mt-2">Create</x-backend.ui.button>

                            </div>
                        </div>
                    </form>
                @endif
            </div>
            <div class="col-md-6 mt-3" style="max-height:75dvh;overflow-y:scroll;">
                <x-backend.table.basic :data="$questions">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($questions as $key => $question)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <b>{{ $question->name }}</b><br>
                                    <small class="text-muted">mark: {{ $question->mark }}</small><br>
                                    @foreach ($question->choices->options as $key => $option)
                                        <small
                                            class="{{ $question->choices->correct == $key ? 'text-primary' : 'text-muted' }}">Option#{{ ++$key }}:
                                            {{ $option }}</small><br>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ Route('questions.edit', $question) }}"
                                        class="btn btn-blue btn-sm waves-effect waves-light">Edit</a>
                                    <button onclick='deleteinfo("examDelete-{{ $question->id }}")'
                                        class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                    <form class="d-none" id="examDelete-{{ $question->id }}"
                                        action="{{ Route('questions.destroy', $question->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-backend.table.basic>
                <div class="paginate  md-md-0 mt-3 mt-md-0 me-4 me-md-0">
                    {{ $questions->links() }}
                </div>
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
