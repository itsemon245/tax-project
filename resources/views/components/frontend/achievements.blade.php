<section id="counter-section" class="px-lg-5 px-3 my-5">
    <h4 class="text-center mb-5 fs-3">Our Achievments</h4>
    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-3 px-3">
        @foreach ($achievements as $item)
            <div class="p-2 h-full rounded !border !border-l-4 !border-r-4 border-l-primary border-r-primary">
                <div class="grid grid-cols-5 gap-2 md:gap-3 smd:h-[8rem] items-center justify-center">
                    <img loading="lazy" class="overflow-hidden col-span-2 object-cover" style="width:100%;"
                        src="{{ useImage($item->image) }}" alt="">
                    <div class="col-span-3 flex flex-col w-full items-center justify-center">
                        <div
                            class="max-md:hidden font-semibold text-sm md:text-lg text-center text-primary whitespace-nowrap text-ellipsis overflow-hidden w-full">
                            {{ $item->title }}</div>
                        <h2 class="counter-up m-0 text-primary text-center font-bold text-lg md:text-xl">
                            {{ $item->count }}</h2>
                    </div>
                    <div
                        class="md:hidden col-span-full font-semibold text-sm md:text-lg text-center text-primary text-wrap">
                        {{ $item->title }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
