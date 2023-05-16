<?php 
require_once 'dbkoneksi.php';
?>

<?php 
    // cek apakah terdapat parameter id pada URL, jika ada maka dilakukan edit data
    $_id = isset($_GET['idedit']) ? $_GET['idedit'] : null;
    if(!empty($_id)){
        // ambil data pelanggan berdasarkan id
        $sql = "SELECT * FROM pesanan WHERE id=?";
        $st = $dbh->prepare($sql);
        $st->execute([$_id]);
        $row = $st->fetch();
    }else{
        // jika tidak ada parameter id pada URL, maka dianggap input data baru
        // inisialisasi variabel $row sebagai array kosong
        $row = [];
    }
?>

<html>
<head>
<title>Form Pemesanan</title>
</head>
<body>     
<form method="POST" action="proses_pesanan.php">
<br>
<div class="container">
  <div class="align-justify"><h1>Order</h1>
</div>
  <hr>
  
    <label for="nama_pemesan" class="col-4 col-form-label">Nama Pemesan</label>
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-adjust"></i>
          </div>
        </div> 
        <input id="nama_pemesan" name="nama_pemesan" type="text" class="form-control" 
        value="<?php if(isset($row['nama_pemesan'])) echo $row['nama_pemesan']; ?>">
      </div>
    </div>
  </div>  
 <div class="container">
    <label for="tanggal" class="col-4 col-form-label">Tanggal</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-right"></i>
          </div>
        </div> 
        <input id="tanggal" name="tanggal" value="<?php if(isset($row['tanggal'])) echo $row['tanggal']; ?>" type="date" class="form-control">
      </div>
    </div>
  </div>
  <div class="container">
    <label for="alamat_pemesan" class="col-4 col-form-label">Alamat Pemesan</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-adjust"></i>
          </div>
        </div> 
        <input id="alamat_pemesan" name="alamat_pemesan" type="text" class="form-control" 
        value="<?php if(isset($row['alamat_pemesan'])) echo $row['alamat_pemesan']; ?>">
      </div>
    </div>
  </div>  
 <div class="container">
    <label for="no_hp" class="col-4 col-form-label">Nomor HP</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-anchor"></i>
          </div>
        </div> 
        <input id="no_hp" name="no_hp" type="text" class="form-control"
        value="<?php if(isset($row['no_hp'])) echo $row['no_hp']; ?>">
      </div>
    </div>
  </div>
  <div class="container">
    <label for="email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-right"></i>
          </div>
        </div> 
        <input id="email" name="email" value="<?php if(isset($row['email'])) echo $row['email']; ?>" type="email" class="form-control">
      </div>
    </div>
  </div>
  <div class="container">
    <label for="jumlah_pesanan" class="col-4 col-form-label">Jumlah Pesanan</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-right"></i>
          </div>
        </div> 
        <input id="jumlah_pesanan" name="jumlah_pesanan" 
        value="<?php if(isset($row['jumlah_pesanan'])) echo $row['jumlah_pesanan']; ?>"
        type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="container">
    <label for="deskripsi" class="col-4 col-form-label">Deskripsi Pesanan</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-adjust"></i>
          </div>
        </div> 
        <input id="deskripsi" name="deskripsi" type="text" class="form-control" 
        value="<?php if(isset($row['deskripsi'])) echo $row['deskripsi']; ?>">
      </div>
    </div>
  </div>
  <div class="container">
    <label for="jenis" class="col-4 col-form-label">Produk Pesanan</label> 
    <div class="col-8">
        <?php 
            $sqljenis = "SELECT * FROM produk";
            $rsjenis = $dbh->query($sqljenis);
        ?>
      <select id="produk_id" name="produk_id" class="custom-select">
          <?php 
            foreach($rsjenis as $rowjenis){
         ?>
            <option value="<?=$rowjenis['id']?>"><?=$rowjenis['nama']?></option>
         <?php
            }
        ?>
        <!--
        <option value="1">Pakaian</option>
        <option value="2">Makanan</option>
        <option value="3">Elektronik</option>-->

      </select>
    </div>
  </div>
  </div> 
  <div class="container">
  <div class="form-group row">
    <div class="offset-0 col-2">
    <?php
        $button = (empty($_id)) ? "Save":"Update"; 
    ?>
    <br>
    <input type="submit" name="proses" type="submit" 
    class="btn btn-primary" value="<?=$button?>"/> 
    <a class="btn btn-primary" href="index.html" role="button">Back</a>
    <table class="table" width="100%"></table>
    <input type="hidden" name="idedit" value="<?=$_id?>">
          </div>
  </div> 
  </div>
</form>
</body>
</html>