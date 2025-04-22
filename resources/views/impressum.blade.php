<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', \App\Models\Setting::getValue('site_title') ?? 'Website')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="icon" type="image/png" href="{{ asset('storage/' . \App\Models\Setting::getValue('favicon')) }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-black text-white">
<div class="container mx-auto px-4 py-8">
    <h1>Impressum</h1>

    <h2>Angaben gemäß § 5 TMG</h2>
    <p><strong>{{ \App\Models\Setting::getValue('name') }}</strong><br>
        {{ \App\Models\Setting::getValue('street') }} {{ \App\Models\Setting::getValue('house_number') }}<br>
        {{ \App\Models\Setting::getValue('plz') }} {{ \App\Models\Setting::getValue('city') }}</p>

    <h3>Kontakt</h3>
    <p>Telefon: <a href="tel:{{ \App\Models\Setting::getValue('phone') }}" class="text-red-500">{{ \App\Models\Setting::getValue('phone') }}</a><br>
        E-Mail: <a href="mailto:{{ \App\Models\Setting::getValue('email') }}" class="text-red-500">{{ \App\Models\Setting::getValue('email') }}</a></p>

    <h3>Umsatzsteuer-ID</h3>
    <p>Umsatzsteuer-Identifikationsnummer gemäß §27 a Umsatzsteuergesetz: <strong>{{ \App\Models\Setting::getValue('u_id') }}</strong></p>

    <h3>Streitbeilegung</h3>
    <p>Wir sind nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>

    <h2>Haftung für Inhalte</h2>
    <p>Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.</p>
    <p>Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unberührt. Eine diesbezügliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung möglich. Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.</p>

    <h2>Haftung für Links</h2>
    <p>Unser Angebot enthält Links zu externen Websites Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich.</p>
    <p>Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf mögliche Rechtsverstöße überprüft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar.</p>
    <p>Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.</p>

    <h2>Urheberrecht</h2>
    <p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers.</p>
    <p>Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet. Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet.</p>
    <p>Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.</p>

    <h2>Quelle</h2>
    <a href="https://www.e-recht24.de/" class="text-gray-500 hover:underline">https://www.e-recht24.de/</a><br><br>

    <a href="{{ url('/#form') }}" class="text-red-500 hover:underline">Zurück zur Startseite</a>
</div>

</body>

<footer>
    <div class="text-center text-sm text-gray-500 mt-10 pb-4">
        <a href="{{ route('impressum') }}" class="text-red-500 mx-2 hover:underline">Impressum</a>
        <a href="{{ route('datenschutz') }}" class="text-red-500 mx-2 hover:underline">Datenschutz</a>
        <a href="{{ route('login') }}" class="text-red-500 mx-2 hover:underline">Login</a>
    </div>
</footer>
</html>
