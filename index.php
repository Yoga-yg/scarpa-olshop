<?php
    $con = mysqli_connect("localhost","root","","scarpa_shop");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scarpa | Home </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Scarpa Online Shop</h1>
            <h3>Temukan Sepatu Idamanmu Disini</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Telusuri..." aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna3 text-white">Telusuri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Kategori Terlaris</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted kategori-sepatu-casual d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Sepatu Casual">Sepatu Casual</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted kategori-sepatu-wanita d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Sepatu Wanita">Sepatu Wanita</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted kategori-sepatu-pria d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Sandal Pria">Sandal Pria</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3 class="text-white">Tentang Kami</h3>
            <p class="fs-5 mt-3 text-white">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                Impedit, recusandae. Adipisci quam eius quo cum voluptatem fugiat quis molestiae, 
                quisquam nulla voluptatibus cupiditate nostrum expedita. 
                Illum beatae vero eaque alias veritatis adipisci odio ipsam aspernatur sit quaerat 
                cumque reiciendis excepturi magni fuga porro, soluta ratione harum aperiam? Minus inventore 
                maiores sunt laudantium eaque! Laborum perferendis culpa quam sunt aliquam voluptates praesentium, 
                ratione, eligendi illum aperiam temporibus sit pariatur expedita veritatis tempora dolores ipsam consequatur 
                optio porro debitis? Ab, corporis dolor!
            </p>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryProduk)){ ?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="image-box">
                            <img src="img/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                            <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                            <p class="card-text text-harga">Rp<?php echo $data['harga']; ?></p>
                            <a href="produk-detail.php?nama=<?php echo $data['nama'] ?>" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a class="btn btn-outline-primary mt-3 fs-4" href="produk.php">See More</a>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>