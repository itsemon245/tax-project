@extends('layouts.frontend.app')
@section('main')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="container">
            <x-frontend.form.text-input name='Full Name' type="text" placeholder='John Doe' />
        </div>
    </form>
@endsection
