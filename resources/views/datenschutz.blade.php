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
    <h1>Datenschutzerklärung</h1>
    <p>Stand: {{ date('d. F Y') }}</p>

    <h2>Inhaltsübersicht</h2>
    <ul>
        <li>Verantwortlicher</li>
        <li>Übersicht der Verarbeitungen</li>
        <li>Maßgebliche Rechtsgrundlagen</li>
        <li>Sicherheitsmaßnahmen</li>
        <li>Übermittlung von personenbezogenen Daten</li>
        <li>Internationale Datentransfers</li>
        <li>Allgemeine Informationen zur Datenspeicherung und Löschung</li>
        <li>Rechte der betroffenen Personen</li>
        <li>Geschäftliche Leistungen</li>
        <li>Bereitstellung des Onlineangebots und Webhosting</li>
        <li>Einsatz von Cookies</li>
        <li>Kontakt- und Anfrageverwaltung</li>
        <li>Präsenzen in sozialen Netzwerken (Social Media)</li>
        <li>Plug-ins und eingebettete Funktionen sowie Inhalte</li>
    </ul>

    <h3>Verantwortlicher</h3>
    <p>{{ \App\Models\Setting::getValue('name') }}<br>
        {{ \App\Models\Setting::getValue('street') }} {{ \App\Models\Setting::getValue('house_number') }}<br>
        {{ \App\Models\Setting::getValue('plz') }} {{ \App\Models\Setting::getValue('city') }}</p>
    <p>E-Mail-Adresse: <a href="{{ \App\Models\Setting::getValue('email') }}" class="text-red-500">{{ \App\Models\Setting::getValue('email') }}</a></p>

    <h3>Übersicht der Verarbeitungen</h3>
    <p>Die nachfolgende Übersicht fasst die Arten der verarbeiteten Daten und die Zwecke ihrer Verarbeitung zusammen und verweist auf die betroffenen Personen.</p>

    <h4>Arten der verarbeiteten Daten</h4>
    <ul>
        <li>Bestandsdaten</li>
        <li>Zahlungsdaten</li>
        <li>Kontaktdaten</li>
        <li>Inhaltsdaten</li>
        <li>Vertragsdaten</li>
        <li>Nutzungsdaten</li>
        <li>Meta-, Kommunikations- und Verfahrensdaten</li>
        <li>Protokolldaten</li>
    </ul>

    <h4>Kategorien betroffener Personen</h4>
    <ul>
        <li>Leistungsempfänger und Auftraggeber</li>
        <li>Interessenten</li>
        <li>Kommunikationspartner</li>
        <li>Nutzer</li>
        <li>Geschäfts- und Vertragspartner</li>
    </ul>

    <h4>Zwecke der Verarbeitung</h4>
    <ul>
        <li>Erbringung vertraglicher Leistungen und Erfüllung vertraglicher Pflichten</li>
        <li>Kommunikation</li>
        <li>Sicherheitsmaßnahmen</li>
        <li>Büro- und Organisationsverfahren</li>
        <li>Organisations- und Verwaltungsverfahren</li>
        <li>Feedback</li>
        <li>Bereitstellung unseres Onlineangebotes und Nutzerfreundlichkeit</li>
        <li>Informationstechnische Infrastruktur</li>
        <li>Öffentlichkeitsarbeit</li>
        <li>Geschäftsprozesse und betriebswirtschaftliche Verfahren</li>
    </ul>

    <h3>Maßgebliche Rechtsgrundlagen</h3>
    <p>Die maßgeblichen Rechtsgrundlagen nach der DSGVO sind:</p>
    <ul>
        <li><strong>Einwilligung (Art. 6 Abs. 1 S. 1 lit. a) DSGVO)</strong></li>
        <li><strong>Vertragserfüllung und vorvertragliche Anfragen (Art. 6 Abs. 1 S. 1 lit. b) DSGVO)</strong></li>
        <li><strong>Rechtliche Verpflichtung (Art. 6 Abs. 1 S. 1 lit. c) DSGVO)</strong></li>
        <li><strong>Berechtigte Interessen (Art. 6 Abs. 1 S. 1 lit. f) DSGVO)</strong></li>
    </ul>

    <h3>Sicherheitsmaßnahmen</h3>
    <p>Wir treffen nach Maßgabe der gesetzlichen Vorgaben geeignete technische und organisatorische Maßnahmen, um ein dem Risiko angemessenes Schutzniveau zu gewährleisten. Dazu gehören insbesondere die Sicherung der Vertraulichkeit, Integrität und Verfügbarkeit von Daten durch Kontrolle des physischen und elektronischen Zugangs.</p>

    <h3>Übermittlung von personenbezogenen Daten</h3>
    <p>Im Rahmen unserer Verarbeitung von personenbezogenen Daten kann es vorkommen, dass diese an andere Stellen, Unternehmen oder Personen übermittelt werden. Wir beachten hierbei die gesetzlichen Vorgaben und schließen entsprechende Verträge, die dem Schutz Ihrer Daten dienen.</p>

    <h3>Internationale Datentransfers</h3>
    <p>Sofern Daten in einem Drittland verarbeitet werden, erfolgt dies nur im Einklang mit den gesetzlichen Vorgaben, insbesondere durch Standardvertragsklauseln oder Angemessenheitsbeschlüsse.</p>

    <h3>Allgemeine Informationen zur Datenspeicherung und Löschung</h3>
    <p>Wir löschen personenbezogene Daten, wenn keine rechtliche Grundlage mehr für deren Speicherung besteht oder die Einwilligung widerrufen wird. Ausnahmen bestehen, wenn gesetzliche Pflichten eine längere Aufbewahrung erfordern.</p>

    <h3>Rechte der betroffenen Personen</h3>
    <ul>
        <li>Widerspruchsrecht</li>
        <li>Widerrufsrecht bei Einwilligungen</li>
        <li>Auskunftsrecht</li>
        <li>Recht auf Berichtigung</li>
        <li>Recht auf Löschung und Einschränkung der Verarbeitung</li>
        <li>Recht auf Datenübertragbarkeit</li>
        <li>Beschwerde bei Aufsichtsbehörde</li>
    </ul>

    <h3>Geschäftliche Leistungen</h3>
    <p>Wir verarbeiten Daten unserer Vertragspartner, um vertragliche Verpflichtungen zu erfüllen und Geschäftsprozesse zu unterstützen.</p>

    <h3>Bereitstellung des Onlineangebots und Webhosting</h3>
    <p>Wir verarbeiten Nutzerdaten, um unser Onlineangebot bereitzustellen, die Nutzerfreundlichkeit zu erhöhen und Sicherheitsmaßnahmen zu gewährleisten.</p>

    <h3>Einsatz von Cookies</h3>
    <p>Cookies werden verwendet, um den Log-in-Status, Warenkorbinhalte oder andere Nutzerpräferenzen zu speichern. Weitere Informationen finden Sie in der entsprechenden Cookie-Richtlinie.</p>

    <h3>Kontakt- und Anfrageverwaltung</h3>
    <p>Bei Kontaktaufnahme mit uns verarbeiten wir Ihre Daten, um Anfragen zu beantworten und erforderliche Maßnahmen zu ergreifen.</p>

    <h3>Präsenzen in sozialen Netzwerken (Social Media)</h3>
    <p>Wir betreiben Präsenzen in sozialen Netzwerken und verarbeiten Nutzerdaten, um mit den Nutzern zu kommunizieren oder Informationen bereitzustellen. Weitere Informationen zu den Verarbeitungen durch die sozialen Netzwerke entnehmen Sie bitte den jeweiligen Datenschutzerklärungen.</p>

    <h3>Plug-ins und eingebettete Funktionen sowie Inhalte</h3>
    <p>Wir binden Inhalte und Funktionen von Drittanbietern in unsere Website ein. Diese können auch personenbezogene Daten sammeln, z. B. zur Verbesserung der Nutzererfahrung oder für Marketingzwecke.</p>

    <a href="https://datenschutz-generator.de/" class="text-gray-500 hover:underline">Erstellt mit kostenlosem Datenschutz-Generator.de von Dr. Thomas Schwenke</a><br><br>

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
