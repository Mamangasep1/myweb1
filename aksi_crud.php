<?php 

//panggil koneksi db
include "koneksi.php";

//uji button simpan
if(isset($_POST['bsimpan'])) {

    //persiapan simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO tdata (tanggal_data, deskripsi_data)
                                        VALUES ('$_POST[tTanggal])',
                                                '$_POST[tDeskripsi]') ");
    //jika simpan sukses
    if ($simpan) {
        echo "<script>alert('okeh tersimpan!');
        document.location='index.php';
        </script>";
    } else {
        echo "<script>alert('waduh gagal!');
        document.location='index.php';
        </script>";
    }                         
}


//uji button ubah
if(isset($_POST['bubah'])) {

    //persiapan ubah data
    $ubah = mysqli_query($koneksi, "UPDATE tdata SET tanggal_data = '$_POST[tTanggal]', deskripsi_data = '$_POST[tDeskripsi]' WHERE id = '$_POST[id]' ");
    //jika ubah sukses
    if ($ubah) {
        echo "<script>alert('okeh terubah!');
        document.location='index.php';
        </script>";
    } else {
        echo "<script>alert('waduh gagal!');
        document.location='index.php';
        </script>";
    }                         
}


//uji button hapus
if(isset($_POST['bhapus'])) {

    //persiapan hapus data
    $hapus = mysqli_query($koneksi, "DELETE FROM tdata WHERE id = '$_POST[id]'");
    //jika hapus sukses
    if ($hapus) {
        echo "<script>alert('okeh terhapus!');
        document.location='index.php';
        </script>";
    } else {
        echo "<script>alert('waduh gagal!');
        document.location='index.php';
        </script>";
    }                         
}