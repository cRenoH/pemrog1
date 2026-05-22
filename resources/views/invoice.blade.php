<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .invoice-container {
            width: 210mm;
            height: 297mm;
            margin: 20px auto;
            padding: 20mm;
            box-sizing: border-box;
            background-color: white;
            position: relative;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .bg-logo {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.;
            z-index: 0;
        }

        .content {
            position: relative;
            z-index: 1;
        }

        .header {
            margin-bottom: 30px;
            display: flex;
            justify-content: flex-end;
        }

        .sender-info {
            text-align: right;
        }

        .company-name {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .company-contact {
            font-size: 12px;
            margin-bottom: 20px;
        }

        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }

        .section-title {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .recipient {
            margin-bottom: 30px;
        }

        .recipient-address {
            font-size: 12px;
            line-height: 1.5;
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .left-column,
        .right-column {
            width: 48%;
        }

        .invoice-date,
        .invoice-number {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th {
            text-align: left;
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        td {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            font-size: 12px;
        }

        .notes {
            font-size: 12px;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .payment-info {
            margin-bottom: 30px;
        }

        .payment-details {
            font-size: 12px;
        }

        .payment-details p {
            margin: 5px 0;
        }

        .totals {
            text-align: right;
            margin-top: 30px;
        }

        .totals p {
            margin: 5px 0;
            font-size: 12px;
        }

        .subtotal {
            font-weight: 600;
        }

        .footer {
            font-size: 10px;
            text-align: center;
            margin-top: 50px;
            color: #999;
        }
    </style>
</head>

<body>
    <div style="display: flex; justify-content: space-between; align-items: center; margin: 20px 0 10px 0;">
        <a href="{{ route('shop2') }}" style="padding:8px 18px; border-radius:6px; background:#00B4D8; color:#fff; border:none; font-weight:600; cursor:pointer; text-decoration: none; display: inline-block;">
            <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>Back to Shop
        </a>
        <button onclick="window.print()" style="padding:8px 18px; border-radius:6px; background:#0118d8; color:#fff; border:none; font-weight:600; cursor:pointer;">Print Invoice</button>
    </div>
    <div class="invoice-container">
        <!-- Background Image -->
        <img src="{{ asset('img/Dari  Mata/INVOICE TEMPLATE-01.png') }}" alt="Background" class="bg-logo">

        <!-- Content Overlay -->
        <div class="content">
            <div class="header">
                <div class="sender-info">
                    <div class="company-name">DARI MATA</div>
                    <div class="company-contact">
                        darimatastudio.id@gmail.com<br>
                        +62 822 4386 9624
                    </div>
                </div>
            </div>

            <hr>

            <div class="recipient">
                <h2 class="section-title">RECIPIENT</h2>
                <div class="recipient-address">
                    {{ $order->user->first_name }} {{ $order->user->last_name }}<br>
                    {{ $order->shipping_address }}<br>
                    <br>
                    {{ $order->user->phone_number }}
                </div>
            </div>

            <div class="invoice-details">
                <div class="left-column">
                    <div class="invoice-date">
                        <h2 class="section-title">INVOICE DATE</h2>
                        <p>{{ $order->created_at->format('d M Y') }}</p>
                    </div>
                </div>
                <div class="right-column">
                    <div class="invoice-number">
                        <h2 class="section-title">INVOICE NUMBER</h2>
                        <p>{{ $order->order_number }}</p>
                    </div>
                    <div class="invoice-number">
                        <h2 class="section-title">TRACKING NUMBER</h2>
                        <p>{{ $order->resi ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>PRODUCT DESCRIPTION</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->variant->product->name ?? '-' }} @if($item->variant->size) [{{ $item->variant->size }}] @endif</td>
                        <td>IDR {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>IDR {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="totals">
                <p class="subtotal">Subtotal: IDR {{ number_format($order->subtotal, 0, ',', '.') }}</p>
                <p>Shipping: IDR {{ number_format($order->shipping_cost, 0, ',', '.') }}</p>
                <p><strong>Total: IDR {{ number_format($order->total_amount, 0, ',', '.') }}</strong></p>
            </div>

            <div class="notes">
                <h2 class="section-title">NOTES</h2>
                <p>Payment must be made in full no later than 14 days after receiving this invoice.</p>
                <p>Have a nice day and thank you!</p>
            </div>

            <div class="payment-info">
                <h2 class="section-title">PAYMENT INFO</h2>
                <div class="payment-details">
                    <p>No. Account : 0095 0107 6220 500</p>
                    <p>A/C Name : Thufail Aqbil Abbad M.</p>
                    <p>Bank Detail : Bank Rakyat Indonesia</p>
                </div>
            </div>

            <div class="footer">
                CREATIVE · STAY CREATING
            </div>
        </div>
    </div>
</body>

</html>