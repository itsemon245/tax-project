@extends('backend.layouts.app')
@section('content')
				<x-backend.ui.breadcrumbs :list="['Management', 'Return', 'Create']" />
				<x-backend.ui.section-card>
								<h4 class="d-print-none my-2 text-center">Create Return</h4>
								<div class="page-wrapper">
									<div class="page">
									</div>
								</div>
				</x-backend.ui.section-card>
				<!-- end row-->
@endsection
