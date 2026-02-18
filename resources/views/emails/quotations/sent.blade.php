<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e1e1e1; border-radius: 10px; }
        .header { text-align: center; margin-bottom: 30px; }
        .header h1 { color: #3454d1; margin-top: 10px; }
        .content { margin-bottom: 30px; }
        .footer { text-align: center; font-size: 12px; color: #777; border-top: 1px solid #eee; padding-top: 20px; }
        .btn { display: inline-block; padding: 10px 20px; background-color: #3454d1; color: #ffffff !important; text-decoration: none; border-radius: 5px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('admin-assets/assets/images/Logos/LOGO_AIAE_FINAL.png') }}" alt="AIAE Logo" style="max-height: 60px;">
            <h1>Votre Devis est Prêt !</h1>
        </div>
        <div class="content">
            <p>Bonjour {{ $quotation->lead->first_name }} {{ $quotation->lead->last_name }},</p>
            <p>Nous avons le plaisir de vous transmettre le devis n°<strong>{{ $quotation->quotation_number }}</strong> concernant votre projet.</p>
            <p>Vous trouverez le devis détaillé en pièce jointe de cet email.</p>
            <p>Ce devis est valable jusqu'au {{ $quotation->valid_until->format('d/m/Y') }}.</p>
            <p>Si vous avez des questions, n'hésitez pas à nous contacter.</p>
            <p>Cordialement,<br>L'équipe AIAE</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} AIAE. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
