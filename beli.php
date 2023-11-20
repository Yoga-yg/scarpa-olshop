<?php
    $con = mysqli_connect("localhost","root","","scarpa_shop");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    $name = htmlspecialchars($_GET['nama']);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$name'");
    $data = mysqli_fetch_array($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scarpa | Beli Produk </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <div class="container mt-5">
        <div class="my-5 col-12 col-md-6 mb-5">
            <h3>Isikan Data</h3>
            <div class="mb-3">
                    <label for="currentFoto"></label>
                    <img src="img/<?php echo $data['foto']; ?>" alt="" width="300px">
                </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" id="nama_produk" name="nama_produk" readonly value="<?php echo $data['nama']; ?>" class="form-control mt-1 mb-1" autocomplete="off" required>
                </div>
                <div>
                    <label for="nama">Nama Pemesan</label>
                    <input type="text" id="nama" name="nama" class="form-control mt-1 mb-1" autocomplete="off" required>
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" class="form-control mt-1 mb-1" autocomplete="off" required>
                </div>
                <div>
                    <label for="nomor_hp">Nomor Handphone</label>
                    <input type="number" class="form-control mt-1 mb-1" name="nomor_hp" required>
                </div>
                <div>
                    <label for="pesan">Pesan untuk Admin</label>
                    <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control mt-1 mb-1"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="simpan_beli">Buat Pesanan</button>
                </div>
            </form>

            <?php
                if(isset($_POST['simpan_beli'])){
                    $nama_produk = htmlspecialchars($_POST['nama_produk']);
                    $nama = htmlspecialchars($_POST['nama']);
                    $alamat = htmlspecialchars($_POST['alamat']);
                    $nomor_hp = htmlspecialchars($_POST['nomor_hp']);
                    $pesan = htmlspecialchars($_POST['pesan']);

                    if($nama=='' || $alamat=='' || $nomor_hp==''){
            ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Nama, Alamat, dan Nomor Handphone wajib diisi
                        </div>
            <?php
                    }
            ?>
            <?php
                        $queryBuat = mysqli_query($con, " INSERT INTO pesanan (nama_produk, nama, alamat, nomor_hp, pesan) VALUES ('$nama_produk', '$nama', '$alamat', '$nomor_hp', '$pesan') ");

                        if($queryBuat){
            ?> 
                        <div class="alert alert-primary mt-3" role="alert">
                            Pesanan Berhasil Dibuat
                        </div>

                        <meta http-equiv="refresh" content="1; url=beli.php?nama=<?php echo $produk['nama']; ?>" />
            <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }   
                }
            ?>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>