@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Management', 'Tax Calculator', 'Results']" />

    <x-backend.ui.section-card name="All Results">
        <section class="my-5 container">
            <x-backend.table.basic :data="$results">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Date</th>
                        <th>Details</th>
                        <th>Tax</th>
                        <th>Others</th>
                        @can('manage result')
                        <th>Action</th>
                        @endcan

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
                            @can('manage result')
                            <td>
                                <x-backend.ui.button type="delete" :href="route('tax.result.destroy', $result)"
                                    class="btn-sm"></x-backend.ui.button>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No results found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-backend.table.basic>
        </section>
    </x-backend.ui.section-card>
@endsection
