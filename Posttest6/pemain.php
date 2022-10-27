<?php 
    require 'config.php';

    date_default_timezone_set("Asia/Makassar");
    
    $query = "SELECT * FROM pemain";
    $result = $db->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Daftar pemain</h3>
    <a href="forms.php">Tambah pemain</a>
    <table border=1>
        <tr>
            <th>No</th>
            <th>Tanggal tambah</th>
            <th>Tanggal bermain</th>
            <th>Status</th>
            <th>Gambar</th>
        </tr>
        <?php 
            $i = 1;
            while($row=mysqli_fetch_array($result)){
        ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$row['masih bermain'] ?></td>
                <td><?=$row['Pensiun']?></td>
                <td>
                    <?php 
                        if($row['kembali'] <= date("Y-m-d")){
                            echo "Pensiun";
                        }else {
                            echo "masih bermain";
                        }
                    ?>
                </td>
                <td><img src="gambar/<?=$row['nama']?>" alt="" width="100px"></td>
            </tr>

        <?php 
            $i++;
            }
        ?>
    </table>
</body>
</html>