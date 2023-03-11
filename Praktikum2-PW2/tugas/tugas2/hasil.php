<?php
    // menyimpan inputan user kedalam variabel
    $nama = $_POST['nama'];
    $matkul = $_POST['matkul'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];
    $tugas = $_POST['tugas'];


    // menentukan nilai akhir
    $hasil = ($uts + $uas + $tugas) / 3 ;

    // hitung grade
    if($hasil <= 35) {
    $grade = 'E';

    } elseif ($hasil <= 55) {
    $grade = 'D';

    } elseif ($hasil <= 69) {
    $grade = 'C';

    } elseif ($hasil <= 84) {
    $grade = 'B';

    } elseif ($hasil <= 100) {
    $grade = 'A';

    } else {
    $grade = 'I';
    }

    // hitung predikat
    switch ($grade) {
    case 'E':
        $predikat = 'Sangat Kurang';
        break;
    
    case 'D':
        $predikat = 'Kurang';
        break;
    
    case 'C':
        $predikat = 'Cukup';
        break;
    
    case 'B':
        $predikat = 'Memuaskan';
        break;
        
    case 'A':
        $predikat = 'Sangat Memuaskan';
        break;
    
    default:
        $predikat = 'Tidak ada';
        break;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penilaian Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <table class="table">
    <thead>
        <tr>
            <th scope="col">Nama</th> 
            <th scope="col">Mata Kuliah</th> 
            <th scope="col">UTS</th> 
            <th scope="col">UAS</th> 
            <th scope="col">Tugas/Praktikum</th> 
            <th scope="col">NILAI AKHIR</th> 
            <th scope="col">GRADE</th> 
            <th scope="col">PREDIKAT</th> 
        <tr>
    <thead>
    <tbody>
        <tr>
            <td> <?= $nama ?>   </td>
            <td> <?= $matkul ?> </td>
            <td> <?= $uts ?>    </td>
            <td> <?= $uas ?>    </td>
            <td> <?= $tugas ?>  </td>
            <td> <?= $hasil ?> </td>
            <td> <?= $grade ?> </td>
            <td> <?= $predikat ?> </td>
        <tr>
    </tbody> 
<table>  
<?php
if($hasil > 55){
echo '<div class="text-center mt-6 py-4 bg-success text-white fs-4 fw-bold">Selamat! Anda dinyatakan lulus</div>';
}
else{
echo '<div class="text-center py-4 bg-danger text-white fs-4 fw-bold">Maaf, Anda tidak dinyatakan lulus</div>';
}
?>         
</body>
</html>