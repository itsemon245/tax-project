<div class="d-flex flex-column align-items-center w-full">
    <img loading="lazy" class="rounded object-cover w-[120px] h-[90px]" src="{{ useImage($info->image_url) }}" alt="info-image{{ $info->id }}" loading="lazy">
    <div class="mt-3 mb-2">
        {!! $info->description !!}
    </div>
</div>
