@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Exams']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Exam Question Edit">
        <form action="{{ route('questions.update', $question->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="exam_id" value="{{ $question->exam_id }}">
                    <x-backend.form.text-input label="Question" type="text" class="mb-2" name="question"
                        value="{{ $question->name }}" required />
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="Mark" class="mb-2" type="number" name="mark"
                        value="{{ $question->mark }}" required />
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Option #1" type="text" name="option1"
                                value="{{ json_decode($question->choices)->options[0] }}" required />
                            <input type="radio" name="currect_ans" value="0"
                                {{ json_decode($question->choices)->correct == 0 ? 'checked' : '' }}
                                class="form-check-input mb-2" id="option1">
                            <label class="form-check-label" for="option1">
                                Currect Answer
                            </label>
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Option #2" type="text" name="option2"
                                value="{{ json_decode($question->choices)->options[1] }}" required />
                            <input type="radio" name="currect_ans" value="1"
                                {{ json_decode($question->choices)->correct == 1 ? 'checked' : '' }}
                                class="form-check-input mb-2" id="option2">
                            <label class="form-check-label" for="option2">
                                Currect Answer
                            </label>
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Option #3" type="text" name="option3"
                                value="{{ json_decode($question->choices)->options[2] }}" required />
                            <input type="radio" name="currect_ans" value="2"
                                {{ json_decode($question->choices)->correct == 2 ? 'checked' : '' }}
                                class="form-check-input mb-2" id="option3">
                            <label class="form-check-label" for="option3">
                                Currect Answer
                            </label>
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Option #4" type="text" name="option4"
                                value="{{ json_decode($question->choices)->options[3] }}" required />
                            <input type="radio" name="currect_ans" value="3"
                                {{ json_decode($question->choices)->correct == 3 ? 'checked' : '' }}
                                class="form-check-input mb-2" id="option4">
                            <label class="form-check-label" for="option4">
                                Currect Answer
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <x-backend.ui.button class="btn-primary w-100 btn-sm mt-1">Update</x-backend.ui.button>
        </form>
    </x-backend.ui.section-card>
@endsection
