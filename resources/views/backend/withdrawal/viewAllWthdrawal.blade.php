@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Accounting', 'Withdrawal']" />
    <x-backend.ui.section-card name="All Withdrawal">
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
{{-- 
            <tbody>
                @foreach ($records as $key => $record)
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
            </tbody> --}}
        </x-backend.table.basic>
    </x-backend.ui.section-card>
@endsection
