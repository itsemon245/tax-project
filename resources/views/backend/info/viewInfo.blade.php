@extends('backend.layouts.app')
@section('content')
    @push('customCss')
        <style>
            .paginate {
                float: right;
            }

            div.dataTables_paginate {
                margin: 0;
                white-space: nowrap;
                text-align: right;
                display: none !important;
            }
        </style>
    @endpush
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Hero', 'List']" />
    <x-backend.ui.section-card name="Info List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :items="$infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Info Image</th>
                                    <th>Title</th>
                                    <th>Section</th>
                                    <th>Description</th>
                                    @can('manage info section')
                                        <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($infos as $key => $info)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td><img loading="lazy" src="{{ useImage($info->image_url) }}"
                                                alt="{{ $info->title }}" width="80px" loading="lazy"></td>
                                        <td>{{ Str::limit($info->title, 20, '...') }}</td>
                                        <td>{{ $info->section_id === 1 ? 'Section 1' : 'Section 2' }}</td>
                                        <td style="width:250px;
                                        white-space: normal;
                                        overflow-wrap: break-word!important;
                                    word-wrap: break-word!important;
                                word-break: break-word!important;">{!! $info->description !!}</td>
                                        @can('manage info section')
                                            <td>
                                                <x-backend.ui.button type="edit" href="{{ route('info.edit', $info) }}"
                                                    class="btn-sm" />
                                                <x-backend.ui.button type="delete" action="{{ route('info.destroy', $info) }}"
                                                    class="btn-sm" />
                                            </td>
                                        @endcan

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

    @push('customJs')
        <script>
        </script>
    @endpush
@endsection
