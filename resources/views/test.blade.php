<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Ticket</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            /* Remove extra padding that might interfere with full page rendering */
            display: flex;
            flex-direction: column;
            /* Arrange tickets vertically */
            align-items: center;
            /* Center tickets horizontally */
            /* Optional background color for the page */
        }

        .ticket-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 2px solid #dcdcdc;
            /* Limit maximum width for larger screens */
            margin-bottom: 0;
            /* Remove bottom margin as page-break will handle spacing */
            page-break-after: always;
            /* Force a page break after each ticket */
        }

        /* Ensure the last ticket doesn't have an unnecessary page break */
        .ticket-container:last-child {
            page-break-after: avoid;
        }

        .header {
            background: #f8f8f8;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #dcdcdc;
        }

        .header .ticket-type {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
        }

        .header .price {
            font-size: 16px;
            color: #e74c3c;
        }

        .banner {
            width: 100%;
            height: 200px;
            background: url("{{ env('APP_URL'). '/storage/'. $ticket->booking->event->image }}") center/cover no-repeat;
        }

        .details {
            padding: 20px;
        }

        .details p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .details .event-info {
            margin-bottom: 15px;
        }

        .barcode-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: #f8f8f8;
            border-top: 2px solid #dcdcdc;
        }

        .barcode-section img {
            height: 70px;
        }

        .terms {
            padding: 20px;
            font-size: 12px;
            color: #7f8c8d;
            line-height: 1.5;
            border-top: 2px solid #dcdcdc;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background: #ecf0f1;
            font-size: 12px;
            color: #95a5a6;
        }

        .ticket-type {
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>

<body>

    @foreach ($ticket->booking->bookingDetail as $item)
    @for ($i = 1; $i <= $item->qty; $i++)

        <div class="ticket-container">
            <div class="header">
                <div class="ticket-type">TICKET TYPE: {{ $item->ticket->ticket }}</div>
                <div class="price">{{ $item->ticket->ticket_price }}</div>
            </div>

            <div class="banner"></div>

            <div class="details">
                <div class="event-info">
                    <p><strong>{{ $ticket->booking->event->name }}</strong></p>
                    <p><strong>Tanggal: </strong>{{ $ticket->booking->event->duration }}</p>
                    <p><strong>Pukul: </strong>{{ $ticket->booking->event->range_duration }} WIB</p>
                    <p><strong>Lokasi: </strong>{{ $ticket->booking->event->locations->venue }}, {{
                        $ticket->booking->event->locations->city }}</p>
                </div>
                <p><strong>Nama Pemesan:</strong> {{ $ticket->booking->user->fullname }}</p>
                <p><strong>ID Transaksi:</strong> {{ $ticket->uuid }}</p>
            </div>

            <div class="barcode-section">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $item->uuid }}"
                    alt="QR Code">
                <div>
                    <p><strong>Ref:</strong> Online</p>
                    <p><strong>Order Date:</strong> {{ $ticket->created_at }}</p>
                </div>
            </div>

            <div class="terms">
                <p>E-Ticket ini adalah tiket tanda masuk yang sah dan tidak dapat ditukarkan.</p>
                <ul>
                    <li>E-Ticket dapat di-scan di gate masuk sesuai kategori tiket.</li>
                    <li>Barcode hanya dapat digunakan satu kali.</li>
                    <li>Dilarang membawa senjata dan obat-obatan terlarang.</li>
                    <li>Penyelenggara berhak menolak masuk jika syarat dan ketentuan tidak dipenuhi.</li>
                </ul>
            </div>

            <div class="footer">
                Powered by BookRN
            </div>
        </div>
        @endfor
        @endforeach

</body>

</html>