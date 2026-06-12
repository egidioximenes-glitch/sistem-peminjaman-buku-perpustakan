<?php
include 'koneksi.php';

$buku = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM buku"));
$anggota = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM anggota"));
$peminjaman = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM peminjaman"));
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Sistem Peminjaman Buku Perpustakaan</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background: linear-gradient(135deg,#667eea,#764ba2);
    min-height:100vh;
    padding:30px;
}

.container{
    max-width:1200px;
    margin:auto;
}

.header{
    background:white;
    padding:30px;
    border-radius:20px;
    text-align:center;
    margin-bottom:25px;
    box-shadow:0 5px 20px rgba(0,0,0,0.2);
}

.header h1{
    color:#333;
}

.header p{
    color:#666;
}

.cards{
    display:flex;
    gap:20px;
    margin-bottom:25px;
    flex-wrap:wrap;
}

.card{
    flex:1;
    min-width:250px;
    background:white;
    padding:25px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 5px 20px rgba(0,0,0,0.2);
}

.card h2{
    color:#667eea;
    font-size:40px;
}

.card p{
    color:#555;
}

.table-box{
    background:white;
    padding:20px;
    border-radius:20px;
    margin-bottom:25px;
    box-shadow:0 5px 20px rgba(0,0,0,0.2);
}

.table-box h2{
    margin-bottom:15px;
    color:#333;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#667eea;
    color:white;
    padding:12px;
}

td{
    padding:10px;
    border-bottom:1px solid #ddd;
    text-align:center;
}

tr:hover{
    background:#f5f5f5;
}

.footer{
    text-align:center;
    color:white;
    margin-top:20px;
}

</style>

</head>

<body>

<div class="container">

<div class="header">
<h1>📚 Sistem Peminjaman Buku Perpustakaan</h1>
<p>Dashboard Data Buku, Anggota dan Peminjaman</p>
</div>

<div class="cards">

<div class="card">
<h2><?php echo $buku; ?></h2>
<p>Total Buku</p>
</div>

<div class="card">
<h2><?php echo $anggota; ?></h2>
<p>Total Anggota</p>
</div>

<div class="card">
<h2><?php echo $peminjaman; ?></h2>
<p>Total Peminjaman</p>
</div>

</div>

<div class="table-box">
<h2>📖 Data Buku</h2>

<table>
<tr>
<th>ID Buku</th>
<th>Judul Buku</th>
<th>Penulis</th>
<th>Stok</th>
</tr>

<?php
$q = mysqli_query($conn,"SELECT * FROM buku");
while($r=mysqli_fetch_assoc($q)){
?>
<tr>
<td><?php echo $r['id_buku']; ?></td>
<td><?php echo $r['judul_buku']; ?></td>
<td><?php echo $r['penulis']; ?></td>
<td><?php echo $r['stok']; ?></td>
</tr>
<?php } ?>

</table>
</div>

<div class="table-box">
<h2>👨 Data Anggota</h2>

<table>
<tr>
<th>NIM</th>
<th>Nama</th>
<th>Alamat</th>
</tr>

<?php
$q = mysqli_query($conn,"SELECT * FROM anggota");
while($r=mysqli_fetch_assoc($q)){
?>
<tr>
<td><?php echo $r['nim']; ?></td>
<td><?php echo $r['nama']; ?></td>
<td><?php echo $r['alamat']; ?></td>
</tr>
<?php } ?>

</table>
</div>

<div class="table-box">
<h2>📅 Data Peminjaman</h2>

<table>
<tr>
<th>ID</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
</tr>

<?php
$q = mysqli_query($conn,"SELECT * FROM peminjaman");
while($r=mysqli_fetch_assoc($q)){
?>
<tr>
<td><?php echo $r['id_peminjaman']; ?></td>
<td><?php echo $r['tanggal_pinjam']; ?></td>
<td><?php echo $r['tanggal_kembali']; ?></td>
</tr>
<?php } ?>

</table>
</div>

<div class="footer">
<h3>© 2026 Sistem Peminjaman Buku Perpustakaan</h3>
</div>

</div>

</body>
</html>
