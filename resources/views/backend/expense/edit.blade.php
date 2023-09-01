@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Management', 'Expense', 'Edit']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Edit Expense">
        <x-backend.ui.button type="custom" :href="route('expense.index')" class="btn-secondary btn-sm mb-1">Back</x-backend.ui.button>
        <div class="container mt-3">
            <form class="" action="{{ route('expense.update', $expense->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-4">
                        <x-backend.form.text-input type="date" label="Date" placehoder="Date" :value="$expense->date"
                            name="date" />
                    </div>
                    <div class="col-md-4 col-8">
                        <x-backend.form.text-input type="text" label="Spend On" placehoder="Spend On" name="spend_on"
                            :value="$expense->spend_on" />
                    </div>
                    <div class="col-md-4 col-4">
                        <x-backend.form.text-input type="number" label="Amount(৳)" placehoder="Amount(৳)" name="amount"
                            :value="$expense->amount" />
                    </div>
                    <div class="col-12">
                        <x-form.text-area label="Description" placehoder="Description" name="description">
                            {{ $expense->description }}
                        </x-form.text-area>
                    </div>
                    <div class="col-12">
                        <x-backend.ui.button class="btn-primary btn-sm">Update</x-backend.ui.button>
                    </div>
                </div>

            </form>
        </div>
    </x-backend.ui.section-card>
    @push('customJs')
    @endpush
@endsection
