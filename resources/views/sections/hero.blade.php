<section class="snap-section bg-black text-white h-screen flex flex-col justify-between">

    <div class="w-full overflow-hidden relative py-2 text-sm uppercase tracking-wide">
        <div class="absolute w-full h-full bg-transparent"></div>
        <div class="text-center text-white whitespace-nowrap animate-marquee">
            {{ \App\Models\Setting::getValue('top_bar_text') }}
        </div>
    </div>

    <div class="flex flex-col flex-1">

        @if (\App\Models\Setting::getValue('logo'))
            <div class="image-container h-12 ml-20 mt-12 flex">
                <img src="{{ asset('storage/' . \App\Models\Setting::getValue('logo')) }}" alt="Logo" class="h-full object-contain">
            </div>
        @endif

        <p class="text-[12rem] ml-20 mt-52 font-serif italic leading-none">
            {{ \App\Models\Setting::getValue('site_heading') }}
        </p>

        <div class="text-right mr-10 mt-20">
            <p class="sub_title text-[6rem] font-light">
                <?php
                    $subtitle = \App\Models\Setting::getValue('site_subtitle');
                    $words = explode(' ', $subtitle);
                    $lastWord = array_pop($words);
                    $remainingText = implode(' ', $words);
                ?>
                {{ $remainingText }} <span class="focus">{{ $lastWord }}</span>
            </p>
        </div>
    </div>
</section>

</section>
