<section id="counter-section" class="px-lg-5 px-3 my-5">
    <h4 class="text-center mb-5 fs-3">Our Achievments</h4>
    <div class="row justify-content-center px-3">
        @foreach ($achievements as $item)
            <div class="col-6 col-md-4 col-xl-3 mb-1 px-2 align-items-center justify-content-center">
                <div class="px-1 bg-primary rounded">
                    <div class="card overflow-hidden">
                        <div class="grid grid-cols-5 gap-2 md:gap-3 h-[3.5rem] md:h-[8rem]">
                            <img loading="lazy" class="rounded-l-sm overflow-hidden col-span-2 object-cover" style="width:100%; height:100%;"
                                src="{{ useImage($item->image) }}" alt="">
                            <div class="col-span-3 flex flex-col w-full items-center justify-center">
                                <div
                                    class="font-semibold text-sm md:text-lg text-center text-primary whitespace-nowrap text-ellipsis overflow-hidden w-full">
                                    {{ $item->title }}</div>
                                <h2 class="counter-up m-0 text-primary text-center font-bold text-lg md:text-xl">
                                    {{ $item->count }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
