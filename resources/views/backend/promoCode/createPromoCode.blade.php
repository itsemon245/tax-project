@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Create Promo Code']" />

    <x-backend.ui.section-card name="Create Promo Code">
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            <div class="container rounded bg-white py-3 px-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <x-backend.form.select-input id="user_type" label="User Type" name="user_type"
                                    onchange="getUsers(this)">
                                    <option selected value="all">All</option>
                                    <option value="partner">Partner</option>
                                    <option value="user">User</option>
                                </x-backend.form.select-input>
                            </div>
                            <div class="col-md-4">
                                <x-backend.form.select-input id="user_type" label="User Type" name="user_type"
                                    onchange="getUsers(this)">
                                    <option selected value="all">All</option>
                                    <option value="partner">Partner</option>
                                    <option value="user">User</option>
                                </x-backend.form.select-input>
                            </div>
                            <div class="col-md-4">
                                <x-backend.form.text-input label="Promo Code" type="text" name="code">
                                </x-backend.form.text-input>
                                <button type="button"
                                    class="btn btn-success waves-effect waves-light profile-button mt-1">Generate
                                    Code</button>
                            </div>
                            <div class="col-md-4">
                                <x-backend.form.text-input label="Use Limit" type="text" name="limit">
                                </x-backend.form.text-input>
                            </div>
                            <div class="col-md-4">
                                <x-backend.form.text-input label="Expired Date" type="date" name="expired_at">
                                </x-backend.form.text-input>
                            </div>



                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary waves-effect waves-light profile-button"
                                    onclick="descriptionAdd()">Create
                                    Product</button>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </form>
    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
