@php
    $list= $attributes->get('list')
@endphp

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-left my-3">
                <ol class="breadcrumb m-0">
                    @foreach ($list as $item)
                    <li class="breadcrumb-item">{{ $item}}</li>
                        
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>