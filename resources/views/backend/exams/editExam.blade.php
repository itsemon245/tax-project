@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Exams']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Exams">
        <form action="{{ route('exams.update', $exam->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.text-input label="Exam Name" type="text" class="mb-2" name="name"
                        value="{{ $exam->name }}" required />
                </div>
                <div class="col-md-6">
                    <x-backend.form.select-input id="course" label="Select Course" name="course"
                        placeholder="Choose Course...">
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ $course->id === $exam->course_id ? 'selected' : '' }}>
                                {{ $course->name }}</option>
                        @endforeach
                    </x-backend.form.select-input>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="Total Marks" class="mb-2" type="number" name="total_marks"
                        value="{{ $exam->total_marks }}" required />
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="Passing Marks" class="mb-2" type="number" name="passing_marks"
                        value="{{ $exam->passing_marks }}" required />
                </div>
            </div>
            <x-backend.ui.button class="btn-primary w-100 btn-sm mt-1">Update</x-backend.ui.button>
        </form>
    </x-backend.ui.section-card>
@endsection
