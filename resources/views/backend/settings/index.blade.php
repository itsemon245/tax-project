@extends('backend.layouts.app')
@section('content')
    @php
        $basicSettingPermissions = \Spatie\Permission\Models\Permission::where('group', 'setting')
            ->get(['name'])
            ->pluck('name');
    @endphp
    <x-backend.ui.breadcrumbs :list="['Web Site', 'Settings']" />
    <x-backend.ui.section-card name="Web Site Settings">
        @canany(['manage basic setting', 'read basic setting', 'manage referral setting', 'read referral setting', 'manage
            payment setting', 'manage payment setting', 'read payment setting', 'read return link setting', 'manage return link
            setting'])
            {{-- Basic Settings --}}
            @canany(['manage basic setting', 'read basic setting'])
                <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <h4 class="p-2">Basic Setting</h4>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <x-backend.form.image-input id="logo" :image="$data->basic->logo" required
                                                    style="aspect-ratio:1.8/.7;" label="Company logo" name="logo" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-1">
                                            <x-backend.form.text-input type="email" :value="$data->basic->email" class="mb-2" required
                                                name="email" label="Company E-mail" />
                                            <x-backend.form.text-input type="phone" :value="$data->basic->phone" class="mb-2" required
                                                name="phone" label="Company Phone" />
                                            <x-backend.form.text-input type="phone" :value="$data->basic->whatsapp" class="mb-2" required
                                                name="whatsapp" label="Company What's App" />
                                            <x-backend.form.text-input type="phone" :value="$data->basic?->app_name ?? null" class="mb-2" required
                                                name="app_name" label="Company Name" />
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-md-2" style="max-width: 50%;">
                                            <label for="favicon">
                                                <span class="form-label text-capitalize">Favicon<span class="text-danger">
                                                        *</span></span>
                                                <input id="favicon" name="favicon" type="file" hidden>
                                                <img loading="lazy" class="w-100 border border-2 border-primary rounded-circle"
                                                    src="{{ useImage($data->basic->favicon) }}" style="aspect-ratio:1/1;"
                                                    id="live-favicon" />
                                            </label>
                                            @error('favicon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-10">
                                            <x-form.ck-editor name="address" class="form-control" cols="30"
                                                placeholder="Type your company address..."
                                                rows="6" required>{{ $data->basic->address }}</x-form.ck-editor>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                {{-- Add sub-category --}}
                                @can('manage basic setting')
                                    <div class="mt-2">
                                        <x-backend.ui.button class="btn-primary btn-sm float-end">Save
                                            Changes</x-backend.ui.button>
                                    </div>
                                @endcan
                            </div>
                        </div> <!-- end card-body -->
                    </div>
                </form>

                <form action="{{ route('setting.images') }}" method="post" enctype="multipart/form-data" class="row">
                    @csrf
                    <div class="mb-3">
                        <div class="card h-100">
                            <h4 class="p-2">Invoice Images</h4>
                            <div class="card-body row">
                                <div class="col-lg-6">
                                    <x-backend.form.image-input id="header_image" :image="$data->basic->header_image ?? null" required
                                        style="aspect-ratio:1.8/.7;" label="Company Header Image" name="header_image" />
                                </div>
                                <div class="col-lg-6">
                                    <x-backend.form.image-input id="footer_image" :image="$data->basic->footer_image ?? null" required
                                        style="aspect-ratio:1.8/.7;" label="Company Footer Image" name="footer_image" />
                                </div>
                                <div class="col-12">
                                    <div class="mt-2">
                                        <x-backend.ui.button class="btn-primary btn-sm float-end">Save
                                            Changes</x-backend.ui.button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endcanany
            <div class="row">
                {{-- Referance  --}}
                @canany(['manage referral setting', 'read referral setting'])
                    <form class="col-lg-6 mb-3" action="{{ route('setting.reference') }}" method="post">
                        @csrf
                        <div class="card h-100">
                            <h4 class="p-2">Referance Setting</h4>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <x-backend.form.text-input type="text" class="mb-2" :value="$data->reference->commission" name="commission"
                                            label="Refer Commission" />
                                    </div>
                                    <div class="col-sm-6">
                                        <x-backend.form.text-input type="text" class="mb-2" :value="$data->reference->withdrawal" name="withdrawal"
                                            label="Withdrawal Limit" />
                                    </div>
                                </div> <!-- end card-body -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="partner-commission">Partner Commission</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" class="mb-2"
                                                value="{{ $data->reference->partner_commission }}" name="partner_commission">
                                            <span class="input-group-text" id="partner-commission">%</span>
                                        </div>
                                    </div>
                                    @can('manage referral setting')
                                        <div class="mt-2">
                                            <x-backend.ui.button class="btn-primary btn-sm float-end">Save
                                                Changes</x-backend.ui.button>
                                        </div>
                                    @endcan
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div>
                    </form>
                @endcanany
                {{-- Referance  --}}
                {{-- Payment --}}
                @canany(['manage payment setting', 'read payment setting'])
                    <div class="row d-none" id="payment-template">
                        <div class="col-sm-6">
                            <x-backend.form.select-input label="Payment Method" name="payment_methods[]"
                                placeholder="Select Payement Method" required>
                                @php
                                    $payemntMethods = ['bkash', 'rocket', 'nagad'];
                                @endphp
                                @foreach ($payemntMethods as $method)
                                    <option class="text-capitalize" value="{{ $method }}">
                                        {{ $method }}</option>
                                @endforeach
                            </x-backend.form.select-input>
                        </div>
                        <div class="col-sm-6">
                            <x-backend.form.text-input class="mb-2" required name="payment_number" label="Payment Number" />
                        </div>
                    </div>
                    {{-- template --}}
                    <form class="col-lg-6 mb-3" action="{{ route('setting.payment') }}" method="post">
                        @csrf
                        <div class="card h-100">
                            <h4 class="p-2">Payment Setting</h4>
                            <div class="card-body">
                                <div class="repeater">
                                    @php
                                        $collect = collect($data->payment);
                                        $count = $collect->count();
                                    @endphp
                                    <div id="payment-repeater" data-count="{{ $count > 0 ? $count : 1 }}">
                                        @if ($data->payment)
                                            @foreach ($data->payment as $payment)
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <x-backend.form.select-input label="Payment Method"
                                                            name="payment_methods[]" placeholder="Select Payement Method"
                                                            required>
                                                            @php
                                                                $payemntMethods = ['bkash', 'rocket', 'nagad'];
                                                            @endphp
                                                            @foreach ($payemntMethods as $method)
                                                                <option class="text-capitalize" value="{{ $method }}"
                                                                    @selected($payment->method === $method)>
                                                                    {{ $method }}</option>
                                                            @endforeach
                                                        </x-backend.form.select-input>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <x-backend.form.text-input class="mb-2" :value="$payment->number" required
                                                            name="payment_numbers[]" label="Payment Number" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <x-backend.form.select-input label="Payment Method" name="payment_methods[]"
                                                        placeholder="Select Payement Method" required>
                                                        @php
                                                            $payemntMethods = ['bkash', 'rocket', 'nagad'];
                                                        @endphp
                                                        @foreach ($payemntMethods as $method)
                                                            <option class="text-capitalize" value="{{ $method }}">
                                                                {{ $method }}</option>
                                                        @endforeach
                                                    </x-backend.form.select-input>
                                                </div>
                                                <div class="col-sm-6">
                                                    <x-backend.form.text-input class="mb-2" :value="$data->reference->commission" required
                                                        name="payment_numbers[]" label="Payment Number" />
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="actions d-flex justify-content-center gap-2">
                                        <span onclick="repeater.decrement(event)" role="button"
                                            data-container="#payment-repeater"
                                            class="decrement mdi mdi-delete text-danger bg-soft-danger px-1 rounded rounded-circle"></span>
                                        <span onclick="repeater.increment(event)" role="button"
                                            data-template="#payment-template" data-container="#payment-repeater"
                                            class="increment mdi mdi-plus text-success bg-soft-success px-1 rounded rounded-circle"></span>
                                    </div>
                                </div>
                                @can('manage payment setting')
                                    <x-backend.ui.button class="btn-primary btn-sm float-end">Save Changes</x-backend.ui.button>
                                @endcan
                            </div> <!-- end card -->
                        </div>
                    </form>
                    {{-- Payment end --}}
                @endcanany
                {{-- Return  --}}
                @canany(['read return link setting', 'manage return link setting'])
                    {{-- template --}}
                    <div class="row d-none" id="return-template">
                        <div class="col-sm-6">
                            <x-backend.form.text-input label="Return Link Title" name="return_link_titles[]"
                                placeholder="Return Link Title" required />
                        </div>
                        <div class="col-sm-6">
                            <x-backend.form.text-input label="Return Link " name="return_links[]" placeholder="Return Link "
                                required />

                        </div>
                    </div>
                    {{-- template --}}
                    <form class="col-lg-6 mb-3" action="{{ route('setting.returnLink') }}" method="post">
                        @csrf
                        <div class="card h-100">
                            <h4 class="p-2">Return Link Setting</h4>
                            <div class="card-body">
                                <div class="repeater">
                                    @php
                                        $links = collect($data->return_links);
                                        $count = $links->count();
                                    @endphp
                                    <div id="return-repeater" data-count="{{ $count > 0 ? $count : 1 }}">
                                        @if ($links)
                                            @foreach ($links as $item)
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <x-backend.form.text-input label="Return Link Title"
                                                            name="return_link_titles[]" :value="$item->title"
                                                            placeholder="Return Link Title" required />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <x-backend.form.text-input label="Return Link " name="return_links[]"
                                                            placeholder="Return Link " :value="$item->link" required />

                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <x-backend.form.text-input label="Return Link Title"
                                                        name="return_link_titles[]" placeholder="Return Link Title" required />
                                                </div>
                                                <div class="col-sm-6">
                                                    <x-backend.form.text-input label="Return Link " name="return_links[]"
                                                        placeholder="Return Link " required />

                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="actions d-flex justify-content-center gap-2">
                                        <span onclick="repeater.decrement(event)" role="button"
                                            data-container="#return-repeater"
                                            class="decrement mdi mdi-delete text-danger bg-soft-danger px-1 rounded rounded-circle"></span>
                                        <span onclick="repeater.increment(event)" role="button" data-template="#return-template"
                                            data-container="#return-repeater"
                                            class="increment mdi mdi-plus text-success bg-soft-success px-1 rounded rounded-circle"></span>
                                    </div>
                                </div>
                                @can('manage return link setting')
                                    <x-backend.ui.button class="btn-primary btn-sm float-end">Save Changes</x-backend.ui.button>
                                @endcan
                            </div> <!-- end card -->
                        </div>
                    </form>
                @endcanany
                {{-- Return end --}}
            </div>
        @endcanany
    </x-backend.ui.section-card>
    @push('customJs')
        <script>
            let repeater = {}
            $(document).ready(function() {
                const input = $('#favicon')
                input.on('input', e => {
                    const image = $('#live-' + e.target.id)
                    const url = URL.createObjectURL(e.target.files[0])
                    image.attr('src', url)
                })
                repeater = {
                    count: function(targetCount, action) {

                        return count;
                    },
                    template: (id) => $(id).clone().removeClass('d-none'),
                    increment: function(e) {
                        let container = $(e.target.dataset.container)
                        let count = parseInt(container.attr('data-count'))
                        count++
                        container.attr('data-count', count)
                        container.append(this.template(e.target.dataset.template))
                    },
                    decrement: function(e) {
                        let container = $(e.target.dataset.container)
                        let count = parseInt(container.attr('data-count'))
                        if (count > 1) {
                            container.children().last().remove()
                            count--
                            container.attr('data-count', count)
                        }
                    }
                }

            });
        </script>
    @endpush
@endsection
