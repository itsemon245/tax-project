@extends('backend.layouts.app')
@section('content')
@php
$basicSettingPermissions = \Spatie\Permission\Models\Permission::where('group', 'setting')
    ->get(['name'])
    ->pluck('name');
@endphp
    <x-backend.ui.breadcrumbs :list="['Web Site', 'Settings']" />
    <x-backend.ui.section-card name="Web Site Settings">
        @canany($basicSettingPermissions, 'read basic setting', 'read referral setting', 'read payment setting', 'read return link setting')
                    {{-- Basic Settings --}}
        @canany(['manage basic setting', 'read basic setting'])
        <form action="{{ route('setting.store') }}" method="POST" class="d-none" enctype="multipart/form-data">
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
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <div class="col-md-2" style="max-width: 50%;">
                                    <label for="favicon">
                                        <span class="form-label text-capitalize">Favicon<span class="text-danger">
                                                *</span></span>
                                        <input id="favicon" name="favicon" type="file" hidden>
                                        <img class="w-100 border border-2 border-primary rounded-circle"
                                            src="{{ useImage($data->basic->favicon) }}" style="aspect-ratio:1/1;"
                                            id="live-favicon" />
                                    </label>
                                    @error('favicon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-10">
                                    <label for="address" class="w-100">Address<span class="text-danger"> *</span>
                                        <textarea name="address" class="form-control" cols="30" placeholder="Type your company address..." rows="6">{{ $data->basic->address }}</textarea>
                                    </label>
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
        @endcanany
        <div class="row">
            {{-- Referance  --}}
            <form class="col-lg-6 mb-3" action="{{ route('setting.reference') }}" method="post">
                @csrf
                <div class="card h-100">
                    <h4 class="p-2">Referance Setting</h4>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <x-backend.form.text-input type="number" class="mb-2" :value="$data->reference->commission" required
                                    name="commission" label="Refer Commission" />
                            </div>
                            <div class="col-sm-6">
                                <x-backend.form.text-input type="number" class="mb-2" :value="$data->reference->withdrawal" required
                                    name="withdrawal" label="Withdrawal Limit" />
                            </div>
                            <div class="mt-2">
                                <x-backend.ui.button class="btn-primary btn-sm float-end">Save Changes</x-backend.ui.button>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </form>
            {{-- Referance  --}}

            {{-- Payment  --}}

            {{-- template --}}
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
                                                <x-backend.form.select-input label="Payment Method" name="payment_methods[]"
                                                    placeholder="Select Payement Method" required>
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
                        <x-backend.ui.button class="btn-primary btn-sm float-end">Save Changes</x-backend.ui.button>
                    </div> <!-- end card -->
                </div>
            </form>
            {{-- Payment end --}}


            {{-- Return  --}}

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
                        <x-backend.ui.button class="btn-primary btn-sm float-end">Save Changes</x-backend.ui.button>
                    </div> <!-- end card -->
                </div>
            </form>
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
