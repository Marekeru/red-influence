<section id="hero">
    @if (\App\Models\Setting::getValue('logo'))
        <div class="image-container">
            <img src="{{ asset('storage/' . \App\Models\Setting::getValue('logo')) }}" alt="Logo" class="">
        </div>
    @endif

    <p class="heading">Marketing</p>

    <p class="sub-title">
        <?php
            $subtitle = 'for the unmarkatable';
            $words = explode(' ', $subtitle);
            $lastWord = array_pop($words);
            $remainingText = implode(' ', $words);
        ?>
        {{ $remainingText }} <span class="focus">{{ $lastWord }}</span>
    </p>
</section>
