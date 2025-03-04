<section class="snap-section">

    <div class="content">

        <p class="text1">
            {{ \App\Models\Setting::getValue('about_text1') }}
        </p>

        <p class="text2">
            {{ \App\Models\Setting::getValue('about_text2') }}
        </p>

        <div class="box-bottom">

            <div class="text-container">
                <p class="text3">
                    {{ \App\Models\Setting::getValue('about_text3') }}
                </p>
            </div>

            @if (\App\Models\Setting::getValue('aboutPicture'))
                <div class="image-container">
                    <img src="{{ asset('storage/' . \App\Models\Setting::getValue('aboutPicture')) }}" alt="Logo" class="aboutPicture">
                </div>
            @endif
        </div>

        <div class="red-box"></div>
    </div>
</section>
