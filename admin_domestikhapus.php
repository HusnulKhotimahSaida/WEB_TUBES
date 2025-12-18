<?php
include 'koneksi.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $query_gambar = "SELECT gambar FROM paket_domestik WHERE id = '$id'";
    $result_gambar = mysqli_query($koneksi, $query_gambar);
    $data = mysqli_fetch_assoc($result_gambar);
    
   
    $path_gambar = "assets/" . $data['gambar'];
    if (file_exists($path_gambar)) {
        unlink($path_gambar); 
    }

   
    $query_delete = "DELETE FROM paket_domestik WHERE id = '$id'";
    $hapus = mysqli_query($koneksi, $query_delete);

    if ($hapus) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location = 'admin_domestik.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data!');
                window.location = 'admin_domestik.php';
              </script>";
    }
} else {
   
    header("Location: admin_domestik.php");
}
?>