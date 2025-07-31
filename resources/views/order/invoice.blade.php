<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
            background: #fff;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
            margin-bottom: 30px;
            border-radius: 8px 8px 0 0;
        }

        .header h1 {
            margin: 0 0 10px 0;
            font-size: 28px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .header .invoice-info {
            font-size: 16px;
            opacity: 0.9;
        }

        .content {
            padding: 0 20px;
        }

        .info-section {
            background: #f8fafc;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .info-section h3 {
            margin: 0 0 15px 0;
            color: #4a5568;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid #667eea;
            padding-bottom: 5px;
            display: inline-block;
        }

        .info-row {
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .info-label {
            font-weight: bold;
            color: #2d3748;
            min-width: 100px;
            margin-right: 10px;
        }

        .info-value {
            color: #4a5568;
        }

        .table-container {
            margin: 30px 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .table thead {
            background: linear-gradient(135deg, #4299e1 0%, #667eea 100%);
            color: white;
        }

        .table th {
            padding: 15px 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 11px;
        }

        .table td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
        }

        .table tbody tr:hover {
            background: #f7fafc;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .product-name {
            font-weight: bold;
            color: #2d3748;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        .total-section {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
        }

        .payment-info {
            background: #edf2f7;
            border-left: 4px solid #667eea;
            padding: 15px 20px;
            margin: 20px 0;
            border-radius: 0 8px 8px 0;
        }

        .payment-info .label {
            font-weight: bold;
            color: #2d3748;
        }

        .payment-info .value {
            color: #4a5568;
            margin-left: 10px;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-paid {
            background: #c6f6d5;
            color: #22543d;
        }

        .status-pending {
            background: #fef5e7;
            color: #744210;
        }

        .status-failed {
            background: #fed7d7;
            color: #742a2a;
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #e2e8f0;
            text-align: center;
            color: #718096;
            font-size: 11px;
        }

        .company-info {
            background: #2d3748;
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
        }

        .company-info h2 {
            margin: 0 0 10px 0;
            font-size: 20px;
        }

        .company-info p {
            margin: 5px 0;
            opacity: 0.9;
        }

        /* Styles d'impression */
        @media print {
            body {
                margin: 0;
                padding: 10px;
            }

            .container {
                box-shadow: none;
            }

            .header, .total-section {
                background: #4a5568 !important;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }

            .table thead {
                background: #4a5568 !important;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <!-- En-tête de la facture -->
    <div class="header">
        <h1>Facture</h1>
        <div class="invoice-info">
            <strong>Commande #{{ $order->id }}</strong><br>
            Date : {{ $order->created_at->format('d/m/Y H:i') }}
        </div>
    </div>

    <div class="content">
        <!-- Informations de l'entreprise (optionnel) -->
        <div class="company-info">
            <h2>BaabelShop</h2>
            <p>Golf Sud, Dakar, Sénégal</p>
            <p>Tél: +221 778764705 | Email: thiamabdoukarim89@gmail.com</p>
        </div>

        <!-- Informations du client -->
        <div class="info-section">
            <h3>Informations du client</h3>
            <div class="info-row">
                <span class="info-label">Nom :</span>
                <span class="info-value">{{ $order->user->name ?? auth()->user()->name }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Email :</span>
                <span class="info-value">{{ $order->user->email ?? auth()->user()->email }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Adresse :</span>
                <span class="info-value">{{ $order->address }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Téléphone :</span>
                <span class="info-value">{{ $order->phone }}</span>
            </div>
        </div>

        <!-- Informations de la commande -->
        <div class="info-section">
            <h3>Détails de la commande</h3>
            <div class="info-row">
                <span class="info-label">Statut :</span>
                <span class="info-value">
                        <span class="status-badge
                            @if($order->status === 'livree') status-paid
                            @elseif($order->status === 'en_attente') status-pending
                            @else status-failed @endif">
                            {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                        </span>
                    </span>
            </div>
            <div class="info-row">
                <span class="info-label">Paiement :</span>
                <span class="info-value">
                        <span class="status-badge
                            @if($order->payment_status === 'paye') status-paid
                            @elseif($order->payment_status === 'en_attente') status-pending
                            @else status-failed @endif">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </span>
            </div>
            @if($order->payment && $order->payment->paid_at)
                <div class="info-row">
                    <span class="info-label">Payé le :</span>
                    <span class="info-value">{{ \Illuminate\Support\Carbon::parse($order->payment->paid_at)->format('d/m/Y H:i') }}</span>
                </div>
            @endif
        </div>

        <!-- Tableau des produits -->
        <div class="table-container">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 50%;">Produit</th>
                    <th style="width: 20%;" class="right">Prix unitaire</th>
                    <th style="width: 15%;" class="center">Quantité</th>
                    <th style="width: 15%;" class="right">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                        <td class="product-name">{{ $item->product->name ?? 'Produit supprimé' }}</td>
                        <td class="right">{{ number_format($item->price, 0, '', ' ') }} FCFA</td>
                        <td class="center">{{ $item->quantity }}</td>
                        <td class="right"><strong>{{ number_format($item->price * $item->quantity, 0, '', ' ') }} FCFA</strong></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Section total -->
        <div class="total-section">
            <div class="total-row">
                <span>TOTAL TTC</span>
                <span>{{ number_format($order->total, 0, '', ' ') }} FCFA</span>
            </div>
        </div>

        <!-- Informations de paiement -->
        <div class="payment-info">
            <span class="label">Mode de paiement :</span>
            <span class="value">{{ $order->payment_method === 'en_ligne' ? 'Paiement en ligne' : 'Paiement à la livraison' }}</span>
        </div>

        <!-- Pied de page -->
        <div class="footer">
            <p>Merci pour votre confiance !</p>
            <p>Cette facture a été générée automatiquement le {{ now()->format('d/m/Y à H:i') }}</p>
            <p>Pour toute question, contactez-nous à thiamabdoukarim89@gmail.com</p>
        </div>
    </div>
</div>
</body>
</html>
