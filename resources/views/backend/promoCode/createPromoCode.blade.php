@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Create Promo Code']" />

    <x-backend.ui.section-card name="Create Promo Code">
        <form action="{{ route('promo-code.store') }}" method="POST">
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
                                <div class="mt-1">
                                    <label class="form-label">Select Partner/User</label> <br />
                                    <select id="selectize-select" class="form-control" name="user_id">
                                        <option value="" selected>All</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <x-backend.form.text-input label="Promo Code" type="text" id="code" name="code">
                                </x-backend.form.text-input>
                                <button type="button" id="code_btn"
                                    class="btn btn-success waves-effect waves-light profile-button mt-1">Generate
                                    Code</button>
                            </div>
                            <div class="col-md-4">
                                <x-backend.form.text-input label="Use Limit" type="number" value="1" id="limit"
                                    name="limit">
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
        <script>
            const promoBox = document.getElementById('code');
            const btn = document.getElementById('code_btn');
            const numberSet = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

            const getRandomChar = (dataset) => {
                return dataset[Math.floor(Math.random() * dataset.length)];
            };

            const generatePromoCode = (promoCode = "") => {
                if (promoCode.length === 6 || promoCode.length > 6) {
                    return promoCode;
                }

                promoCode += getRandomChar(numberSet);
                return generatePromoCode(promoCode);
            }

            btn.addEventListener('click', () => {
                promoBox.value = generatePromoCode(promoBox.value);
            })

            const getUsers = (e) => {
                const user_type = e.value
                if (user_type === 'all') return;
                user_type === 'partner' ?
                    $("#limit").val(10) :
                    $("#limit").val(1)
                let url = "{{ route('getUsers', ':userType') }}"
                url = url.replace(':userType', user_type)

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        const users = data.map(user =>
                            `<option value="${user.id}">${user.name}</option>`).join(
                            '')
                        $("#selectize-select").html('')
                        $("#selectize-select").html(
                            `<option value="" selected>All ${user_type.charAt(0).toUpperCase() + user_type.slice(1)}</option>` +
                            users
                        )
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            }
        </script>
    @endpush
@endsection
