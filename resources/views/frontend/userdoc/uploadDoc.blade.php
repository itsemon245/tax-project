@extends('frontend.layouts.app')
@section('main')
    {{-- form start --}}
    <form action="{{ route('user-doc.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="px-5 my-5">
                <h4 class="mb-3 text-center card-title">Upload Documents</h4>
                <div class="mb-2 row">
                    <div class="col-8">
                        <x-form.selectize id="doc-name" label="Document Name" name="name" placeholder="Document Name"
                            required>
                            @foreach ($names as $name)
                                <option value="{{ $name }}">{{ $name }}</option>
                            @endforeach
                        </x-form.selectize>
                    </div>
                    <div class="col-4">
                        <x-backend.form.select-input label="Tax Year" placeholder="Select Tax Year..." name="fiscal_year">
                            @foreach (range(currentYear(), 2020) as $year)
                                <option value="{{ $year - 1 . '-' . $year }}" @selected($year - 1 . '-' . $year === $reqYear)>
                                    {{ $year - 1 . '-' . $year }}</option>
                            @endforeach
                        </x-backend.form.select-input>
                    </div>
                </div>
                <label class="mb-2">Select Documents</label>
                <x-form.file-pond />
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </div>
    </form>
    {{-- form end --}}
@endsection
