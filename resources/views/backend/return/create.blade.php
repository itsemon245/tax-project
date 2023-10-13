@extends('backend.layouts.app')
@section('content')
				<x-backend.ui.breadcrumbs :list="['Management', 'Return', 'Create']" />
				<x-backend.ui.section-card>
								<h4 class="d-print-none my-2 text-center">Create Return</h4>
								<div class="page-wrapper">
												{{-- TODO: Will have to design a total of 8 forms, each page must have a height of print document size --}}
												<div class="page">
												</div>
								</div>
				</x-backend.ui.section-card>
				<!-- end row-->
@endsection
