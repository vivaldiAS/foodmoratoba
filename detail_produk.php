<?php 
session_start();
include('koneksi.php');
$id_produk = $_GET['detail'];
$select = "SELECT * FROM produk p INNER JOIN kategori k ON p.kategori_id = k.id_kategori WHERE p.id = '$id_produk'";
$query  = mysqli_query($con, $select);
$produk 	= mysqli_fetch_assoc($query);
$q_produk_terlaris  = mysqli_query($con, "SELECT p.nama, pt.id_produk_terlaris FROM produk p
LEFT JOIN produk_terlaris pt
ON p.id = pt.id_produk WHERE p.id = '$id_produk'");
$produk_terlaris    = mysqli_fetch_assoc($q_produk_terlaris)
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <?php include('header.html'); ?>
  <title>Detail produk</title>
</head>

<header>
  <?php include 'navbar.php'; ?>
</header>

<body style="background-color:whitesmoke;">


  <div class="konten">
    <div class="atas-produk">
      <nav class="breadcrumbs">
        <a href="index.php" class="breadcrumbs__item">Beranda</a>
        <a href="produk.php" class="breadcrumbs__item">Produk</a>
        <div class="breadcrumbs__item is-active"><?= $produk['nama']; ?></div>
      </nav>
    </div>
    <div class="card-wrappers" style="height:fit-content;">

      <div class="card" style="height:fit-content;">
        <!-- card left -->
        <div class="product-imgs" data-aos="fade-right">

          <center><img src="image/<?= $produk['foto']; ?>" class="gambar-product" alt="gambar <?= $produk['nama']; ?>">
          </center>

        </div>
        <!-- card right -->
        <div class="product-content" data-aos="fade-left" style="height:fit-content;">
          <h2 class="product-title"><?= $produk['nama']; ?></h2>
          <div>
            <h4>
              <p class="harga">
                <font style="font-size:27px;">Rp</font> <?=  number_format($produk['harga'],2,',','.'); ?>
              </p>
            </h4>
          </div>

          <?php if ($produk_terlaris['id_produk_terlaris'] !== null): ?>
          <a href="index.php#produk_terlaris" class="product-link mb-2">Produk terlaris</a><br>
          <?php endif; ?>


          <div class="desk-produk row">
            <div>
              <section style="widthfit-content; float: left; height:fit-content ;">
                <font style="color:black;">Kategori :</font>
              </section>
              <section style="text-align:justify; ">
                &nbsp;<?= $produk['nama_kategori']; ?>
              </section>
            </div>
          </div>
          <br>
          <div class="desk-produk row">
            <div>
              <section style="width:fit-content; float: left; height:fit-content ;">
                <font style="color:black;">Deskripsi :</font>
              </section>
              <section style="text-align:justify;color:#41464B; ">
                &nbsp;<?= $produk['detail']; ?>
              </section>
            </div>
          </div>
        </div>


      </div>
      <div style="display: flex; justify-content: flex-end; padding: 1rem; ">
            <a href="#" onclick="history.go(-1); return false;" class="back-link" style="text-decoration:none;">
              <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali
            </a>
          </div>
    </div>
  </div>
  </div>
</body>
<?php include 'footer.php'; ?>

</html>

<link rel="stylesheet" href="css/detailproduks.css">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<style>
  .hitam {
    color: black;
  }

  .product-link {
    border: 1px solid #3A7CFF;

  }

  .product-link:hover {
    background-color: white;
    border: 1px solid #3A7CFF;
  }


  /* PAGINATION */
  .breadcrumbs {
    border: 1px solid #cbd2d9;
    border-radius: 0.3rem;
    display: inline-flex;
    overflow: hidden;
  }

  .breadcrumbs__item {
    background: #fff;
    color: #333;
    outline: none;
    padding: 0.75em 0.75em 0.75em 1.25em;
    position: relative;
    text-decoration: none;
    transition: background 0.2s linear;
  }

  .breadcrumbs__item:hover:after,
  .breadcrumbs__item:hover {
    background: #edf1f5;
  }



  .breadcrumbs__item:after,
  .breadcrumbs__item:before {
    background: white;
    bottom: 0;
    clip-path: polygon(50% 50%, -50% -50%, 0 100%);
    content: "";
    left: 100%;
    position: absolute;
    top: 0;
    transition: background 0.2s linear;
    width: 1em;
    z-index: 1;
  }

  .breadcrumbs__item:before {
    background: grey;
  }

  .breadcrumbs__item:last-child {
    border-right: none;
  }

  .breadcrumbs__item.is-active {
    background: #edf1f5;
  }
</style>