@extends('backend.layouts.app')
@section('content')
    <style>
        .bg-soft-pink {
            background: hsl(350, 52%, 86%);
        }

        .text-pink {
            color: hsl(350, 95%, 74%);
        }
    </style>
    <x-backend.ui.breadcrumbs :list="['Management', 'Tax Calculator', 'Settings']" />

    <x-backend.ui.section-card name="Settings">
        <div class="container">
            <x-btn-back class="mb-2"></x-btn-back>
            <x-backend.ui.button type="custom" :href="route('tax-setting.create')" class="btn-sm btn-success mb-2">Create</x-backend.ui.button>
            <x-backend.table.basic>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Details</th>
                        <th>Free</th>
                        <th class="text-center">Slots</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taxSettings as $key => $tax)
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td class="fw-bold">
                                <div>
                                    <span class="">Name: </span>
                                    <span>{{ $tax->name }}</span>
                                </div>
                                <div class="d-flex gap-2 mb-1">
                                    <div>
                                        <span class="">Type: </span>
                                        <span
                                            class="fw-bold text-capitalize {{ $tax->type === 'tax' ? 'text-success' : 'text-blue' }}">{{ $tax->type }}</span>
                                    </div>
                                    <div>
                                        <span class="">For: </span>
                                        <span class="fw-bold text-capitalize text-warning">{{ $tax->for }}</span>
                                    </div>
                                </div>
                                @if ($tax->for === 'company' && $tax->type === 'tax')
                                    <div>
                                        Percentage:
                                        <div class="p-1 bg-soft-primary d-inline rounded rounded-3 text-primary">
                                            <span class="">Turnover: </span>
                                            <span>{{ $tax->turnover_percentage }} %</span>
                                        </div>
                                        <div class="p-1 bg-soft-primary d-inline rounded rounded-3 text-primary">
                                            <span class="">Income: </span>
                                            <span>{{ $tax->income_percentage }} %</span>
                                        </div>
                                        <div class="p-1 bg-soft-primary d-inline rounded rounded-3 text-primary">
                                            <span class="">Asset: </span>
                                            <span>{{ $tax->asset_percentage }} %</span>
                                        </div>
                                    </div>
                                @endif

                                @if ($tax->type === 'others')
                                    <span class="">Service: </span>
                                    <span class="text-success text-capitalize">{{ $tax->service }}</span>
                                @else
                                    <div class="mb-1">
                                        <div class="p-1 bg-soft-dark text-dark d-inline rounded rounded-3">
                                            <span class="">Min Tax: </span>
                                            <span class=" text-capitalize">{{ $tax->min_tax }}</span>
                                            <span class="mdi mdi-currency-bdt font-16"></span>
                                        </div>
                                    </div>
                                @endif
                                <div>

                                </div>
                            </td>
                            <td class="fw-bold">
                                @if ($tax->for === 'individual')
                                    <div class="mb-1">
                                        <div class="p-1 bg-soft-blue text-blue d-inline rounded rounded-3">
                                            <span class="">Male: </span>
                                            <span>{{ $tax->tax_free->male }}</span> <span
                                                class="mdi mdi-currency-bdt font-16"></span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-1 bg-soft-pink text-pink d-inline rounded rounded-3">
                                            <span class="">Female: </span>
                                            <span>{{ $tax->tax_free->female }}</span> <span
                                                class="mdi mdi-currency-bdt font-16"></span>
                                        </div>
                                    </div>
                                @else
                                    <div>
                                        <div class="p-1 bg-soft-success text-success d-inline rounded rounded-3">
                                            <span>{{ $tax->tax_free->amount }}</span> <span
                                                class="mdi mdi-currency-bdt font-16"></span>
                                        </div>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if ($tax->slots->count() > 0)
                                    <table class="table table-borderless mb-0">
                                        <thead class="bg-soft-dark text-dark">
                                            @if ($tax->type === 'tax')
                                                <tr>
                                                    <th class="p-1">From</th>
                                                    <th class="p-1">To</th>
                                                    <th class="p-1">Difference</th>
                                                    <th class="p-1">Tax(%)</th>
                                                    <th class="p-1">Type</th>

                                                </tr>
                                            @else
                                                <tr>
                                                    <th class="p-1">From</th>
                                                    <th class="p-1">To</th>
                                                    <th class="p-1">Difference</th>
                                                    <th class="p-1">Amount</th>
                                                    <th class="p-1">Min Tax</th>

                                                </tr>
                                            @endif

                                        </thead>
                                        <tbody>
                                            @if ($tax->type === 'tax')
                                                @foreach ($tax->slots as $slot)
                                                    <tr class="fw-medium mb-0">

                                                        <td class="p-1">{{ $slot->from }} <span
                                                                class="mdi mdi-currency-bdt font-16"></span>
                                                        </td>
                                                        <td class="p-1">{{ $slot->to }} <span
                                                                class="mdi mdi-currency-bdt font-16"></span>
                                                        </td>
                                                        <td class="p-1">{{ $slot->difference }} <span
                                                                class="mdi mdi-currency-bdt font-16"></span> </td>
                                                        <td class="p-1">{{ $slot->tax_percentage }} <span
                                                                class="mdi mdi-percent-outline font-16"></span> </td>
                                                        <td class="p-1 text-success text-capitalize">
                                                            {{ $slot->type }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                @foreach ($tax->slots as $slot)
                                                    <tr class="fw-medium mb-0">

                                                        <td class="p-1">{{ $slot->from }} <span
                                                                class="mdi mdi-currency-bdt font-16"></span>
                                                        </td>
                                                        <td class="p-1">{{ $slot->to }} <span
                                                                class="mdi mdi-currency-bdt font-16"></span>
                                                        </td>
                                                        <td class="p-1">{{ $slot->difference }} <span
                                                                class="mdi mdi-currency-bdt font-16"></span> </td>
                                                        <td class="p-1">{{ $slot->amount }}
                                                            @if ($slot->is_discount_fixed)
                                                                <span class="mdi mdi-currency-bdt font-16"></span>
                                                            @else
                                                                <span class="mdi mdi-percent-outline font-16"></span>
                                                            @endif
                                                        </td>
                                                        <td class="p-1 text-capitalize">
                                                            {{ $slot->min_tax }}</span>
                                                            <span class="mdi mdi-currency-bdt font-16"></span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                @else
                                    <div class="text-center text-muted">No slots available</div>
                                @endif
                            </td>
                            <td>
                                <x-backend.ui.button type="edit" :href="route('tax-setting.edit', $tax->id)" class="btn-sm"></x-backend.ui.button>
                                <x-backend.ui.button type="delete" :action="route('tax-setting.destroy', $tax->id)" class="btn-sm"></x-backend.ui.button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </x-backend.table.basic>
        </div>

    </x-backend.ui.section-card>
@endsection

@push('customJs')
@endpush
