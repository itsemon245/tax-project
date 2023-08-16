@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Management', 'Tax Calculator', 'Create Settings']" />

    <x-backend.ui.section-card name="Add New Settings">
        <div class="container">
            <form action="{{ route('tax-setting.store') }}" class="row" method="post">
                @csrf
                <div class="col-md-6">
                    <h5 class="text-center fs-5 fw-bold">Tax Informations</h5>
                    <x-backend.form.text-input name="name" placeholder="Name" label="Name" />
                    <div class="row">
                        <div class="col-lg-6">
                            <x-backend.form.select-input name="for" id="for" label="Tax For"
                                placeholder="Select an option">
                                <option value="individual">Individual</option>
                                <option value="firm">Firm</option>
                                <option value="company">Company</option>
                            </x-backend.form.select-input>
                        </div>
                        <div class="col-lg-6">
                            <x-backend.form.select-input name="type" id="type" label="Tax Type"
                                placeholder="Select an option">
                                <option value="tax">Tax</option>
                                <option value="others">Others</option>
                            </x-backend.form.select-input>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <x-backend.form.text-input name="tax_free_male" placeholder="Tax Free Male"
                                label="Tax Free Male(৳)" />
                        </div>
                        <div class="col-lg-6">
                            <x-backend.form.text-input name="tax_free_female" placeholder="Tax Free Female"
                                label="Tax Free Female(৳)" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <x-backend.form.text-input type='number' name="turnover_percentage"
                                placeholder="Percentage For Turnover" label="Percentage For Turnover(%)" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <h5 class="text-center fs-5 fw-bold">Slots</h5>
                    <div id="slot-wrapper" class="mb-2">
                        <div class="row border rounded p-1 mb-2" id="slot-1">
                            <h5 class="fw-medium mb-1">Slot 1</h5>
                            <div class="col-lg-4">
                                <x-backend.form.select-input name="slot_type[]" id="slot-type" label="Slot Type"
                                    placeholder="Select an option">
                                    <option value="income">Income</option>
                                    <option value="turnover">Turnover</option>
                                    <option value="asset">Asset</option>
                                </x-backend.form.select-input>
                            </div>
                            <div class="col-lg-4">
                                <x-backend.form.text-input name="percentage[]" placeholder="Percentage"
                                    label="Percentage(%)" />
                            </div>
                            <div class="col-lg-4">
                                <x-backend.form.text-input name="min_tax[]" placeholder="Min. Tax" label="Min. Tax(৳)" />
                            </div>
                            <div class="row">
                                <div class="col-12" id="service-wrapper">
                                    <div class="row" id="slot-1-service-1">
                                        <div class="col-lg-6">
                                            <x-backend.form.text-input id="slot-1-service-name-1" name="slot-1-services[]"
                                                placeholder="Service Name" label="Service Name 1" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label mb-0 p-0 col-12">Discount 1</label>
                                            <div class="d-flex align-items-center justify-content-center border shadow-sm rounded"
                                                style="overflow: hidden;">
                                                <input type="text" value="" id="slot-1-is-discount-1"
                                                    name="slot-1-is_discounts[]" hidden>
                                                <input type="text" id="slot-1-service-discount-1"
                                                    name="slot-1-discounts[]" class="border-0 rounded-0 w-100 ps-2"
                                                    style="outline:transparent;" placeholder="0" aria-label="Discunt">


                                                <span id="slot-1-service-discount-icon-1"
                                                    style="padding-top:.25rem;padding-bottom:0.25rem;"
                                                    class="mdi mdi-currency-bdt bg-light px-xxl-3 px-2 text-success font-18"></span>


                                                <span onclick="service.discount.toggle(service.count)"
                                                    style="padding-top:.25rem;padding-bottom:0.25rem;"
                                                    class="mdi mdi-swap-horizontal bg-blue px-xxl-3 px-2  text-white font-18"
                                                    style="cursor: pointer;"></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center gap-2">
                                    <span role="button" onclick="service.decrement()"
                                        class="mdi mdi-minus rounded rounded-circle px-1 bg-light"></span>
                                    <span role="button" onclick="service.increment()"
                                        class="mdi mdi-plus rounded rounded-circle px-1 bg-light"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <x-backend.form.text-input name="from[]" placeholder="Range From" label="Range From" />
                            </div>
                            <div class="col-lg-6">
                                <x-backend.form.text-input name="to[]" placeholder="Rage To" label="Rage To" />
                            </div>


                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-2">
                        <span role="button" onclick="slot.decrement()"
                            class="mdi mdi-minus rounded rounded-circle px-1 bg-light"></span>
                        <span role="button" onclick="slot.increment()"
                            class="mdi mdi-plus rounded rounded-circle px-1 bg-light"></span>
                    </div>

                </div>
                <x-backend.ui.button class="btn-primary">Submit</x-backend.ui.button>
            </form>
        </div>

    </x-backend.ui.section-card>
@endsection

@push('customJs')
    <script>
        let slot = {}
        let service = {}

        $(document).ready(function() {
            slot = {
                count: 1,
                slotWrapper: $('#slot-wrapper'),
                increment: function() {
                    let count = ++this.count;
                    this.addSlot(count)
                },
                decrement: function() {
                    if (this.count > 1) {
                        $('#slot-' + this.count).remove()
                        this.count--;
                    } else {
                        console.log('At least on slot is required');
                    }
                },
                slot: function(count) {
                    return `
                <div class="row border rounded p-1 mb-2" id="slot-${count}">
                    <h5 class="fw-medium mb-1">Slot ${count}</h5>
                    <div class="col-lg-4">
                        <x-backend.form.select-input name="slot_type[]" id="slot-type" label="Slot Type"
                            placeholder="Select an option">
                            <option value="income">Income</option>
                            <option value="turnover">Turnover</option>
                            <option value="asset">Asset</option>
                        </x-backend.form.select-input>
                    </div>
                    <div class="col-lg-4">
                        <x-backend.form.text-input name="percentage[]" placeholder="Percentage"
                            label="Percentage(%)" />
                    </div>
                    <div class="col-lg-4">
                        <x-backend.form.text-input name="min_tax[]" placeholder="Min. Tax" label="Min. Tax(৳)" />
                    </div>
                    <div class="col-lg-6">
                        <x-backend.form.text-input name="from[]" placeholder="From" label="From" />
                    </div>
                    <div class="col-lg-6">
                        <x-backend.form.text-input name="to[]" placeholder="To" label="To" />
                    </div>

                </div>                
                `
                },
                addSlot: function(count) {
                    this.slotWrapper.append(this.slot(count))
                }
            }
            service = {
                count: 1,
                serviceWrapper: $('#service-wrapper'),
                increment: function() {
                    let count = ++this.count;
                    this.addService(count)
                },
                decrement: function() {
                    if (this.count > 1) {
                        $(`#slot-${slot.count}-service-${this.count}`).remove()
                        this.count--;
                    } else {
                        console.log('At least on service is required');
                    }
                },
                service: function(count) {
                    return `
                    <div class="row" id="slot-${slot.count}-service-${count}">
                        <div class="col-lg-6">
                            <x-backend.form.text-input id="slot-${slot.count}-service-name-${count}"  name="slot-${slot.count}-services[]" placeholder="Service Name"
                                label="Service Name ${count}" />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label mb-0 p-0 col-12">Discount ${count}</label>
                            <div class="d-flex align-items-center justify-content-center border shadow-sm rounded"
                                style="overflow: hidden;">
                                
                                <input type="text" id="slot-${slot.count}-is-discount-${count}" name="slot-${slot.count}-is_discounts[]" hidden>

                                <input type="text" id="slot-${slot.count}-service-discount-${count}"  name="slot-${slot.count}-discounts[]" class="border-0 rounded-0 w-100 ps-2"
                                    style="outline:transparent;" placeholder="0" aria-label="Discunt">


                                <span id="slot-${slot.count}-service-discount-icon-${count}" style="padding-top:.25rem;padding-bottom:0.25rem;"
                                    class="mdi mdi-currency-bdt bg-light px-xxl-3 px-2 text-success font-18"></span>


                                <span onclick="service.discount.toggle(${service.count})"
                                    style="padding-top:.25rem;padding-bottom:0.25rem;"
                                    class="mdi mdi-swap-horizontal bg-blue px-xxl-3 px-2  text-white font-18"
                                    style="cursor: pointer;"></span>

                            </div>
                        </div>
                    </div>
                `
                },
                discount: {
                    isFixed: false,
                    toggle: function(count) {
                        this.isFixed = !this.isFixed;
                        this.updateDom(count)
                    },
                    updateDom: function(count) {
                        let icon = $(`#slot-${slot.count}-service-discount-icon-${count}`)
                        // let discount = $(`#slot-${slot.count}-service-discount-${count}`).val()
                        let isDiscount = $(`#slot-${slot.count}-is-discount-${count}`)
                        isDiscount.val(this.isFixed)
                        icon
                            .toggleClass('mdi-currncy-bdt')
                            .toggleClass('mdi-percent-outline')
                    }

                },
                addService: function(count) {
                    this.serviceWrapper.append(this.service(count))
                }
            }


        });
    </script>
@endpush
