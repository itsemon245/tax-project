@extends('backend.layouts.app')
@section('content')
@php
     use App\Models\Purchase;
@endphp
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Purchase', 'View']" />
                </div>
                <h4 class="page-title">View Info</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <x-backend.ui.section-card name="Order">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        
                        <x-backend.table.basic>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Parent</th>
                                    <th>User</th>
                                    <th>Payments</th>
                                    <th>Parent Got</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($records as $key => $record)

                                @php
                                    $purchases = Purchase::where('user_id', $record->user->id)->get();
                                @endphp
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $record->parent->name  }}</td>
                                        <td>{{ $record->user->name  }}</td>
                                        <td>
                                            @foreach ($purchases as $purchas)
                                            <p class="m-0">{{ $purchas->purchasable_type }}: <span>{{ $purchas->paid }}</span></p>
                                            @endforeach
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-backend.table.basic>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection

@push('customJs')

@endpush
