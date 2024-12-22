<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Anda untuk [Nama Acara] Sudah Siap!</title>
    <style>
        body {
            font-family: sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            /* Latar belakang lebih lembut */
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            /* Sudut lebih bulat */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            /* Efek bayangan halus */
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            max-width: 50px;
            /* Ukuran logo disesuaikan */
            height: auto;
        }

        h1 {
            color: #007bff;
            /* Warna hijau cerah */
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 25px;
        }

        p {
            margin-bottom: 25px;
            color: #555;
        }

        .event-details {
            margin-top: 30px;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 8px;
        }

        .event-details h3 {
            margin-top: 0;
            color: #007bff;
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 13px;
            color: #999;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="https://bookrn.bhadrikais.my.id/assets/bookrn.png" alt="Logo BookRN" class="logo">
        </div>
        <h1>Terima Kasih Atas Pembelian Anda!</h1>
        <p>Hai {{ $ticket->booking->user->fullname }},</p>
        <p>Kami sangat senang Anda telah memesan tiket untuk acara <strong>{{ $ticket->booking->event->name }}</strong>
            melalui BookRN!</p>
        <p>Tiket Anda telah kami lampirkan pada email ini. Pastikan untuk mengunduh dan menyimpannya dengan baik. Anda
            perlu menunjukkan tiket ini saat memasuki area acara.</p>

        <div class="event-details">
            <h3>Detail Acara</h3>
            <ul>
                <li><strong>Nama Acara: </strong> {{ $ticket->booking->event->name }}</li>
                <li><strong>Tanggal: </strong> {{ $ticket->booking->event->duration }}</li>
                <li><strong>Waktu: </strong>{{ $ticket->booking->event->range_duration }}</li>
                <li><strong>Lokasi: </strong>{{ $ticket->booking->event->locations->venue }}, {{
                    $ticket->booking->event->locations->city }}</li>
            </ul>
        </div>

        <p>Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami dengan membalas email ini atau
            melalui halaman kontak di website kami.</p>

        <p>Sampai jumpa di acara!</p>

        <p>Salam hangat,</p>
        <p>Tim BookRN</p>
    </div>
    <div class="footer">
        <p>Ini adalah email otomatis, mohon tidak membalas email ini secara langsung.</p>
        <p>Butuh bantuan? Hubungi kami di <a href="mailto:cs@bookrn.bhadrikais.my.id"
                style="color: #007bff; text-decoration: none;">cs@bookrn.bhadrikais.my.id</a>.</p>
    </div>
</body>

</html>