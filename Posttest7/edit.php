<?php 
    require 'config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = mysqli_query($db, "SELECT * FROM isi WHERE id = '$id' ");
        $row = mysqli_fetch_array($result);
    }

    if(isset($_POST['submit'])){
        $club = $_POST['club'];
        $liga = $_POST['liga'];
        $up = $_POST['up'];

        $update = mysqli_query($db, "UPDATE pemain SET club='$club', liga='$liga', up='$up' WHERE id='$id'");

        if($update){
            header("Location:pemain.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NuKuliner</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>Nusantara kuliner</h2>
    </header>
    
    <div class="form-class">
        <h3>Edit Masakan</h3>
        <form action="" method="post">
            
            <label for="">Nama Club</label><br>
            <input type="text" name="club" class="form-text" value=<?=$row['masakan'];?>><br>
            
            <label for="">liga</label><br>
            <input type="text" name="liga" class="form-text" value=<?=$row['daerah'];?>><br>
            
            <label for="">Tanggal Update : </label><br>
            <input type="date" name="up" class="form-text" value=<?=$row['resep'];?>><br>
            
            <input type="submit" name="submit" value="Kirim" class="btn-submit">
        
        </form>
    </div>

</body>
</html>