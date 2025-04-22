<section id="contact">
    @if (\App\Models\Setting::getValue('logo'))
        <div class="logo-wrapper">
            <img src="{{ asset('storage/' . \App\Models\Setting::getValue('logo')) }}" alt="Logo" class="">
        </div>
    @endif

    <div class="d-1">
        <div class="d-1-1">
            <div class="d-1-1-1">
                <p>Make your</p>
            </div>
            <div class="d-1-1-2">
                <p>mark</p>
            </div>
            <div class="d-1-1-3">
                <div class="text-container">
                    <a href="#form" class="text-decoration-none">
                        <span>TERMIN</span><br>
                        <span>VEREINBAREN</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="d-1-2">
            <div class="d-1-2-1">
                <a href="mailto:{{ \App\Models\Setting::getValue('email') }}" class="text-decoration-none">
                    {{ \App\Models\Setting::getValue('email') }}
                </a>
                <br>
                <a href="tel:{{ \App\Models\Setting::getValue('phone') }}" class="text-decoration-none">
                    {{ \App\Models\Setting::getValue('phone') }}
                </a>
            </div>
            <div class="d-1-2-2">
                <p>
                    <span>{{ \App\Models\Setting::getValue('street') }}</span> <span>{{ \App\Models\Setting::getValue('house_number') }}</span><br>
                    <span>{{ \App\Models\Setting::getValue('plz') }}</span> <span>{{ \App\Models\Setting::getValue('city') }}</span>
                </p>
            </div>
            <div class="d-1-2-3">
                <a href="{{ \App\Models\Setting::getValue('linked_in') }}" target="_blank" class="mx-2"><i class="bi bi-linkedin"></i></a>
                <a href="{{ \App\Models\Setting::getValue('instagram') }}" target="_blank" class="mx-2"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </div>
</section>
