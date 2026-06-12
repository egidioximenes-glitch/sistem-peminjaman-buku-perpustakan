<?php

header("Content-Type: application/json");
include 'koneksi.php';

$query = mysqli_query($conn,"
SELECT
peminjaman.id_peminjaman,
anggota.nim,
anggota.nama,
buku.judul_buku,
peminjaman.tanggal_pinjam,
peminjaman.tanggal_kembali
FROM peminjaman
JOIN anggota ON peminjaman.nim = anggota.nim
JOIN buku ON peminjaman.id_buku = buku.id_buku
");

$data = [];

while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}

echo json_encode($data, JSON_PRETTY_PRINT);

?>
