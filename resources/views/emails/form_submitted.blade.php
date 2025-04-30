<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Konfirmasi Pengajuan Form</title>
</head>
<body>
    <h2>Terima kasih telah mengisi formulir {{ $formType }}</h2>

    <p>Berikut data Anda:</p>
    <ul>
        <li><strong>Nama:</strong> {{ $data['nama'] }}</li>
        <li><strong>NIM:</strong> {{ $data['nim'] }}</li>
        <li><strong>Email:</strong> {{ $data['email'] }}</li>
        @if(isset($data['judul']))
            <li><strong>Judul Proposal:</strong> {{ $data['judul'] }}</li>
        @elseif(isset($data['judul_ta']))
            <li><strong>Judul Tugas Akhir:</strong> {{ $data['judul_ta'] }}</li>
        @endif
    </ul>

    <p>Kami akan memproses pengajuan Anda. Terima kasih.</p>
</body>
</html>
