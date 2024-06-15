<div class="d-flex flex-column align-items-center mx-4 my-2">
    <img loading="lazy" class="rounded" style="max-width: 100px;" src="{{ useImage($info->image_url) }}" alt="info-image{{ $info->id }}" loading="lazy">
    <p class="mt-3 mb-2" style="text-align: justify;max-width:260px;">
        {!! $info->description !!}
    </p>
</div>
