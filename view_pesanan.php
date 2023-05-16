<?php 
require_once 'dbkoneksi.php';
?>
<?php
    $_id = $_GET['id'];
    // select * from produk where id = $_id;
    //$sql = "SELECT a.*,b.nama as jenis FROM produk a
    //INNER JOIN jenis_produk b ON a.jenis_produk_id=b.id WHERE a.id=?";
    $sql = "SELECT * FROM pesanan WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
    //echo 'NAMA PRODUK ' . $row['nama'];
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <style>
 h1{
  font-family: sans-serif;
}
 
table {
  font-family: Arial, Helvetica, sans-serif;
  color: #666;
  text-shadow: 1px 1px 0px #fff;
  background: #eaebec;
  border: #ccc 1px solid;
}
 
table th {
  padding: 5px 30px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;
}
 
table th:first-child{  
  border-left:none;  
}
 
table tr {
  text-align: center;
  padding-left: 20px;
}
 
table td:first-child {
  text-align: justify;
  padding-left: 20px;
  border-left: 0;
}
 
table td {
  padding: 15px 20px;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  background: #fafafa;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
}
</style>
<table class="table table-striped">
    <tbody>
        <tr><td>ID</td><td><?=$row['id']?></td></tr>
        <tr>  <td>Nama Pemesan</td><td><?=$row['nama_pemesan']?></td></tr>
        <tr>   <td>Tanggal</td><td><?=$row['tanggal']?></td></tr>
        <tr>   <td>Alamat Pemesan</td><td><?=$row['alamat_pemesan']?></td></tr>
        <tr>   <td>Nomor HP</td><td><?=$row['no_hp']?></td></tr>
        <tr>   <td>Email</td><td><?=$row['email']?></td></tr>
        <tr>   <td>Jumlah Pesanan</td><td><?=$row['jumlah_pesanan']?></td></tr>
        <tr>   <td>Deskripsi</td><td><?=$row['deskripsi']?></td></tr>
        <tr>   <td>Produk Pesanan</td><td><?=$row['produk_id']?></td></tr>
    </tbody>
</table>