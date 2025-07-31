@php
    $products = $order->orderItems;
@endphp
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de commande</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: #f9fafb;
            margin: 0;
            padding: 0;
            color: #181c2a;
        }
        .container {
            max-width: 640px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 16px;
            padding: 40px 32px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }
        .header {
            text-align: center;
            margin-bottom: 32px;
        }
        .header svg {
            width: 48px;
            height: 48px;
            margin-bottom: 12px;
        }
        .header .brand {
            font-size: 28px;
            font-weight: 700;
            color: #1f2937;
            letter-spacing: -0.5px;
        }
        .title {
            font-size: 22px;
            color: #2563eb;
            font-weight: 700;
            margin-bottom: 16px;
        }
        .subtitle {
            font-size: 18px;
            margin-bottom: 24px;
        }
        .order-info {
            background: #f3f4f6;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 32px;
            font-size: 15px;
        }
        .order-info div {
            margin-bottom: 8px;
        }
        .order-info strong {
            color: #2563eb;
        }
        .products {
            margin-bottom: 24px;
        }
        .products ul {
            padding-left: 20px;
        }
        .product-line {
            margin-bottom: 6px;
            font-size: 15px;
        }
        .btn {
            display: inline-block;
            padding: 14px 32px;
            background-color: #2563eb;
            color: #fff;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            font-size: 15px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 13px;
            color: #6b7280;
        }
        .footer strong {
            color: #2563eb;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#2563eb" stroke-width="2">
            <path d="M3 7V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1M3 7l1.553 9.32A2 2 0 0 0 6.53 18h10.94a2 2 0 0 0 1.978-1.68L21 7M3 7h18"/>
        </svg>
        <div class="brand">{{ config('app.name') }}</div>
    </div>

    <div class="title">Merci pour votre commande !</div>
    <div class="subtitle">Bonjour {{ $user->name }},</div>

    <div class="order-info">
        <div><strong>Commande n° :</strong> #{{ $order->id }}</div>
        <div><strong>Date :</strong> {{ $order->created_at ? $order->created_at->format('d/m/Y H:i') : '-' }}</div>
        <div><strong>Montant total :</strong> {{ number_format($order->total, 0, '', ' ') }} FCFA</div>
        <div><strong>Adresse de livraison :</strong> {{ $order->address }}</div>
    </div>

    <div class="products">
        <strong>Produits commandés :</strong>
        <ul>
            @foreach($products as $item)
                <li class="product-line">{{ $item->product->name }} x{{ $item->quantity }} : {{ number_format($item->price * $item->quantity, 0, '', ' ') }} FCFA</li>
            @endforeach
        </ul>
    </div>

    <div style="text-align: center;">
        <a href="{{ route('order.history.show', $order) }}" class="btn">Voir ma commande</a>
    </div>

    <div class="footer">
        Merci pour votre confiance et à bientôt sur <strong>{{ config('app.name') }}</strong> !<br>
        L’équipe {{ config('app.name') }}
    </div>
</div>
</body>
</html>
