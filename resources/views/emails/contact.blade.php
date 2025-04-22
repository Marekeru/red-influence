<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Neue Nachricht vom Kontaktformular</title>
</head>
<body>
<h3>Neue Nachricht:</h3>
<p><strong>Vorname:</strong> {{ $firstname }}</p>
<p><strong>Nachname:</strong> {{ $lastname }}</p>
<p><strong>Email:</strong> {{ $email }}</p>
<p><strong>Nachricht:</strong></p>
<p>{{ nl2br(e($message)) }}</p>
</body>
</html>
