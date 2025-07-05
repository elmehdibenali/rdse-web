<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmer votre compte</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 30px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 20px; border-radius: 5px; text-align: center;">

        
        {{-- <img src="https://acrobat.adobe.com/id/urn:aaid:sc:EU:493ea7c4-9eab-471b-848a-5248de863f03 alt="RDSE Logo" style="max-width: 150px; margin-bottom: 20px;"> --}}

        <h1 style="color: #333;">Confirmer votre compte</h1>
        <h3 style="color: #555;">Bonjour {{ $name }} ({{ $email }})</h3>

        <p style="color: #666; line-height: 1.5;">
            Confirmez votre identité sur notre site. Avant que nous puissions examiner votre compte,
            veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse e-mail.
        </p>

        <a href="{{ $href }}" style="display: inline-block; margin-top: 20px; background-color: #007bff; color: #fff; padding: 12px 24px; text-decoration: none; border-radius: 4px;">
            Confirmer votre compte
        </a>

        <p style="margin-top: 40px; font-size: 12px; color: #aaa;">
            Si vous n'avez pas créé de compte, vous pouvez ignorer cet e-mail.
        </p>
    </div>
</body>
</html>
