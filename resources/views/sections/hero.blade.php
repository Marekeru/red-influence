<section class="snap-section">
    <div class="top-bar-container">
        <p class="top-bar-text">
            {{ \App\Models\Setting::getValue('hero_top_bar_text') }}
        </p>
    </div>

    <div class="content">

        @if (\App\Models\Setting::getValue('logo'))
            <div class="image-container">
                <img src="{{ asset('storage/' . \App\Models\Setting::getValue('logo')) }}" alt="Logo" class="">
            </div>
        @endif

        <p class="heading">
            {{ \App\Models\Setting::getValue('hero_site_heading') }}
        </p>

        <p class="sub-title">
            <?php
                $subtitle = \App\Models\Setting::getValue('hero_site_subtitle');
                $words = explode(' ', $subtitle);
                $lastWord = array_pop($words);
                $remainingText = implode(' ', $words);
            ?>
            {{ $remainingText }} <span class="focus">{{ $lastWord }}</span>
        </p>

    </div>
</section>
