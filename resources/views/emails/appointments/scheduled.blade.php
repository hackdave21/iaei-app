<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { width: 80%; margin: 20px auto; padding: 20px; border: 1px solid #eee; border-radius: 8px; }
        .header { text-align: center; margin-bottom: 20px; }
        .content { margin-bottom: 20px; }
        .footer { font-size: 12px; color: #777; border-top: 1px solid #eee; padding-top: 10px; }
        .btn { display: inline-block; padding: 10px 20px; background-color: #162064; color: #fff; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Confirmation de votre rendez-vous</h2>
        </div>
        <div class="content">
            <p>Bonjour {{ $appointment->lead->first_name }},</p>
            <p>Nous vous confirmons votre rendez-vous avec l'équipe <strong>AIAE</strong>.</p>
            <p><strong>Détails :</strong></p>
            <ul>
                <li><strong>Date :</strong> {{ \Carbon\Carbon::parse($appointment->start_at)->format('d/m/Y') }}</li>
                <li><strong>Heure :</strong> {{ \Carbon\Carbon::parse($appointment->start_at)->format('H:i') }}</li>
                <li><strong>Type :</strong> {{ $appointment->type }}</li>
            </ul>
            <p>Nous restons à votre disposition pour toute information complémentaire.</p>
        </div>
        <div class="footer">
            <p>Cordialement,<br>L'équipe AIAE</p>
        </div>
    </div>
</body>
</html>
