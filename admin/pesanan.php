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

    $queryPesanan = mysqli_query($con, "SELECT * FROM pesanan");
    $jumlahPesanan = mysqli_num_rows($queryPesanan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../admin" class="no-decoration text-muted">
                        <i class=" fas fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Pesanan
                </li>
            </ol>
        </nav>

        <div class="mt-3 mb-5">
            <h2>List Pesanan</h2>

            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>Nama Customer</th>
                            <th>Alamat</th>
                            <th>Nomor Handphone</th>
                            <th>Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                if($jumlahPesanan==0){
                            ?>
                                    <tr>
                                        <td colspan=6 class="text-center">Tidak pesanan</td>
                                    </tr>
                        <?php
                                }
                                else{
                                    $jumlah = 1;
                                    while($data=mysqli_fetch_array($queryPesanan)){
                        ?>
                                <tr>                                        
                                    <td><?php echo $jumlah; ?></td>
                                    <td><?php echo $data['nama_produk']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td><?php echo $data['nomor_hp']; ?></td>
                                    <td><?php echo $data['pesan']; ?></td>
                                    <td>
                                        <a href="pesanan-detail.php?y=<?php echo $data['id']; ?>" class="btn btn-info warna-button"><i class="fas fa-search"></i></a>
                                    </td>
                                </tr>
                        <?php
                                $jumlah++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>