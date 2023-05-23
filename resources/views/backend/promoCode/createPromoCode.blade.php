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
                                    <option value="individual">Individual</option>
                                    <option value="partner">Partner</option>
                                    <option value="user">User</option>
                                </x-backend.form.select-input>
                            </div>
                            <div class="col-md-4">
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
            const input = $('[name="code"]')
            const generateBtn = $('#code_btn')
            let userDefienedValue;
            input.on('input', function(){
                userDefienedValue = input.val().toLowerCase()
            })
            generateBtn.click(function(){
                let digits = Math.floor(Math.random()*(1000-10)+10)
                if (!userDefienedValue) {
                    userDefienedValue = "ta"
                }
                input.val(userDefienedValue+digits)
            })
            
            const getUsers = (e) => {
                const user_type = e.value
                user_type === 'partner' ?
                    $("#limit").val(10) :
                    $("#limit").val(1)
                if (user_type !== 'individual') {
                    $("#selectize-select").html(`<option value="" selected>All</option>`)
                    return
                }
                let url = "{{ route('getUsers') }}"

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
                        $("#selectize-select").html(users)
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            }
        </script>
    @endpush
@endsection
