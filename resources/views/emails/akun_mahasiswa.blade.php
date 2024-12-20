<!DOCTYPE html>
<html>
<head>
    <title>Akun Mahasiswa Baru</title>
</head>
<body>
    <h1>Selamat, {{ $mahasiswa->nama }}!</h1>
    <p>Akun mahasiswa Anda telah berhasil dibuat.</p>
    <p>Username: {{ $mahasiswa->email }}</p>
    <p>Password: (diatur saat registrasi)</p>
</body>
</html>