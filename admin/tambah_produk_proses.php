<?php
session_start();
if (!isset($_SESSION['sedang-login'])) {
    header('Location: login_admin.php');
    exit;
}

include('config.php');
if (isset($_POST['tambah'])) {
    $nama_produk = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Mengambil informasi file yang diunggah
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $target_dir = "../image/";

    // Mendapatkan ekstensi file
    $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

    // Daftar tipe file yang diizinkan (file gambar)
    $allowed_extensions = array('jpg', 'jpeg', 'png');

    // Memeriksa apakah ekstensi file yang diunggah termasuk dalam daftar tipe yang diizinkan
    if (in_array($ext, $allowed_extensions)) {
        // Membuat penamaan file dengan format "time_namafile"
        $nama_file_baru = time() . '_' . $gambar;
        $target_file = $target_dir . $nama_file_baru;

        // Memindahkan file yang diunggah ke folder tujuan
        move_uploaded_file($tmp_name, $target_file);

        $query_tambah = "INSERT INTO produk VALUES('', '$kategori', '$nama_produk', '$harga', '$nama_file_baru', '$deskripsi')";
        $tambah = mysqli_query($koneksi, $query_tambah);

        $_SESSION['tertambah'] = true;
        header('Location: produk.php');
        exit;
    } else {
        $_SESSION['gagaldata'] = true;
        header('Location: produk.php');
        exit;
    }
}
?>
