@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Exam', 'Questions']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="{{ $exam->name }} Exams Questions">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('questions.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                            <x-backend.form.text-input label="Question" type="text" class="mb-2" name="question"
                                required />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Mark" class="mb-2" type="number" name="mark"
                                required />
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <x-backend.form.text-input label="Option #1" type="text" name="option1" required />
                                    <input type="radio" name="currect_ans" value="0" class="form-check-input mb-2"
                                        id="option1">
                                    <label class="form-check-label" for="option1">
                                        Currect Answer
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <x-backend.form.text-input label="Option #2" type="text" name="option2" required />
                                    <input type="radio" name="currect_ans" value="1" class="form-check-input mb-2"
                                        id="option2">
                                    <label class="form-check-label" for="option2">
                                        Currect Answer
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <x-backend.form.text-input label="Option #3" type="text" name="option3" required />
                                    <input type="radio" name="currect_ans" value="2" class="form-check-input mb-2"
                                        id="option3">
                                    <label class="form-check-label" for="option3">
                                        Currect Answer
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <x-backend.form.text-input label="Option #4" type="text" name="option4" required />
                                    <input type="radio" name="currect_ans" value="3" class="form-check-input mb-2"
                                        id="option4">
                                    <label class="form-check-label" for="option4">
                                        Currect Answer
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-backend.ui.button class="btn-primary w-100 btn-sm mt-1">Create</x-backend.ui.button>
                </form>
            </div>
            <div class="col-md-6 mt-3">
                <x-backend.table.basic>
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
