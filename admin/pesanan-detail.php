<?php
    session_start();
    if($_SESSION['login']==false){
        header('location: login.php');
    }

    $con = mysqli_connect("localhost","root","","scarpa_shop");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    $id = $_GET['y'];

    $query = mysqli_query($con, "SELECT * FROM pesanan WHERE id='$id'");
    $data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <h2>Detail Pesanan</h2>
        
        <div class="col-12 col-md-6 mt-1 mb-5">
            <form action="" method="post">
                <div>
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" id="nama_produk" name="nama_produk" readonly value="<?php echo $data['nama_produk']; ?>" class="form-control mt-1 mb-1" autocomplete="off" required>
                </div>
                <div>
                    <label for="nama">Nama Pemesan</label>
                    <input type="text" id="nama" name="nama" readonly value="<?php echo $data['nama']; ?>" class="form-control mt-1 mb-1" autocomplete="off" required>
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" readonly value="<?php echo $data['alamat']; ?>" class="form-control mt-1 mb-1" autocomplete="off" required>
                </div>
                <div>
                    <label for="nomor_hp">Nomor Handphone</label>
                    <input type="number"  readonly value="<?php echo $data['nomor_hp']; ?>" class="form-control mt-1 mb-1" name="nomor_hp" required>
                </div>
                <div>
                    <label for="pesan">Pesan</label>
                    <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control mt-1 mb-1">
                        <?php echo $data['pesan']; ?>
                    </textarea>
                </div>

                <div class="mt-3 d-flex justify-content-between">
                    <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
                </div>
            </form>

            <?php
                if(isset($_POST['deleteBtn'])){
                    $queryDelete = mysqli_query($con, "DELETE FROM pesanan WHERE id='$id'");

                    if($queryDelete){
                        ?>
                            <div class="alert alert-primary mt-3" role="alert">
                                Pesanan Berhasil Dihapus
                            </div>

                            <meta http-equiv="refresh" content="1; url=pesanan.php" />
                        <?php
                    }
                    else {
                        echo mysqli_error($con);  
                    }
                }
            ?>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>