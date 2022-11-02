<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Sepak Bola</title>
    <link rel="stylesheet" href="gaya.css">
</head>
<body>
    <header>
        <h2>Club Sepak Bola</h2>
    </header>

    <p>Tanggal Sekarang :  <?=date("d-m-Y")?></p><br>
    
    <div class="form-class">
        <h3>Tambah Club</h3>
        <form action="" method="post" enctype="multipart/form-data">

            <label for="">Nama Club</label><br>
            <input type="text" name="club" class="form-text"><br>
            
            <label for="">Liga</label><br>
            <input type="text" name="liga" class="form-text"><br>
            
            <label for="">Jumlah Pertandingan</label><br>
            <input type="text" name="jumlah" class="form-text"><br>

            <label for="">Tanggal Update : </label><br>
            <input type="date" name="up"><br><br>

            <label for="">Logo Club</label><br>
            <input type="file" name="gambar"><br><br>
            
            <input type="submit" name="submit" value="Kirim" class="btn-submit">
        
        </form>
    </div>
</body>
</html>

<?php 

require 'config.php';

if(isset($_POST['submit'])){
    $club = $_POST['club'];
    $liga = $_POST['liga'];
    $jumlah = $_POST['jumlah'];
    $up = $_POST['up'];

    $gambar = $_FILES['gambar']['name'];
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));

    $gambar_baru = "$liga.$ekstensi";
    $tmp = $_FILES['gambar']['tmp_name'];

    if(move_uploaded_file($tmp, 'gambar/'.$gambar_baru)){
        $query = "INSERT INTO pemain (club,liga,jumlah,tambah,gambar) VALUES ('$club','$liga','$jumlah','$up','$gambar_baru')";
        $result = $db->query($query);

        if($result){
            header("Location:pemain.php");
        }else{
            echo "gagal kirim";
        }
    }
}
?> 