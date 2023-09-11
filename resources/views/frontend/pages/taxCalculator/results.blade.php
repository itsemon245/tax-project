@extends('frontend.layouts.app')
@section('main')
    <style>
        .check-active {
            background: var(--bs-primary);
            color: var(--dark);
        }

        .form-check-label {
            transition: all 150ms ease-in-out;
        }
    </style>
    <section class="my-5 container">
        <table class="table table-responsive" style="min-width: 800px;">
            <thead>
                <tr>
                    <th class="bg-dark text-white">No.</th>
                    <th class="bg-dark text-white">Date</th>
                    <th class="bg-dark text-white">Details</th>
                    <th class="bg-dark text-white">Tax</th>
                    <th class="bg-dark text-white">Others</th>
                    <th class="bg-dark text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($results as $key=> $result)
                    <tr>
                        <td scope="col">{{ $key + 1 }}.</td>
                        <td>{{ $result->created_at->format('d M, Y') }}</td>
                        <td>
                            <div style="max-width: max-content;">
                                <div class="fw-medium">Yearly Turnover: {{ $result->yearly_turnover }} ৳</div>
                                <div class="fw-medium">Yearly Income: {{ $result->yearly_income }} ৳</div>
                                <div class="fw-medium">Total Asset: {{ $result->total_asset }} ৳</div>
                            </div>
                        </td>
                        <td class="fw-medium">{{ $result->tax }} ৳</td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($result->others as $key => $value)
                                    <li>
                                        <span class="fw-medium">{{ $key }} : </span>
                                        <span class="fw-medium">{{ $value }} ৳</span>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <x-backend.ui.button type="custom" :href="route('tax.calculation.result', $result)"
                                class="btn-sm btn-dark">View</x-backend.ui.button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No results found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
    <!-- end row-->
@endsection
