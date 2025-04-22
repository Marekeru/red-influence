<section id="form">
    <h2>Kontaktiere uns jetzt</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="heading">
        <div class="btn-border">
            <a href="{{ \App\Models\Setting::getValue('calendly') }}" target="_blank">Direkt Termin buchen</a>
        </div>
        <!--<button class="btn-red">Direkt Termin buchen</button>-->
        <p>oder eine Nachricht hinterlassen:</p>
    </div>

    <form action="" method="POST" class="form">
        @csrf
        <div class="name-fields">
            <div class="form-group">
                <input type="text" id="firstname" name="firstname" class="input-field" placeholder="Vorname" required>
            </div>
            <div class="form-group">
                <input type="text" id="lastname" name="lastname" class="input-field" placeholder="Nachname" required>
            </div>
        </div>

        <div class="form-group">
            <input type="email" id="email" name="email" class="input-field" placeholder="Email" required>
        </div>

        <div class="form-group">
            <textarea id="message" name="message" class="input-field" rows="5" placeholder="Nachricht" required></textarea>
        </div>

        <div class="flex items-center mb-4">
            <input type="checkbox" id="privacy" name="privacy" class="mr-2" required>
            <label for="privacy" class="text-white text-sm">Ich habe die <a href="{{ route('datenschutz') }}" class="">Datenschutzerklärung</a> zur Kenntnis genommen</label>
        </div>

        <div class="flex justify-left">
            <button type="submit" class="btn-submit">Nachricht absenden</button>
        </div>
    </form>

    <div class="mt-4 text-center text-white">
        <p>Oder einfach per <a href="mailto:{{ \App\Models\Setting::getValue('email') }}" class="text-decoration-none text-red-600">Mail</a>.</p>
    </div>

    <div class="footer-links">
        <p class="text-white">© {{ date('Y') }} red influence</p>
        <a href="{{ route('impressum') }}" class="hover:underline">Impressum</a>
        <a href="{{ route('datenschutz') }}" class="hover:underline">Datenschutz</a>
        <a href="{{ route('login') }}" class="hover:underline">Login</a>
    </div>
</section>

