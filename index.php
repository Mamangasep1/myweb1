<?php 

    //panggil koneksi db
    include "koneksi.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Metoda Berorientasi Objek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">

    <div class="mt-3">
        <h3 class="text-center">Dashboard Web Daftar Tugas</h3>
    </div>
    
        <div class="card mt-3">
            <div class="card-header bg-dark text-white">
                Data Tugas
            </div>
            <div class="card-body">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                Tambah Data
                </button>

                <!-- tabel -->
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Deskripsi Tugas</th>
                        <th>Aksi</th>
                    </tr>

                    <?php 

                    //persiapan menampilkan data
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tdata ORDER BY id DESC");
                    while ($data = mysqli_fetch_array($tampil)) :
                    ?>
                    <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$data['tanggal_data']; ?></td>
                        <td><?=$data['deskripsi_data']; ?></td>
                        <td>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUbah<?=$no ?>" >Ubah</a>
                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?=$no ?>" >Hapus</a>
                        </td>
                    </tr>

                            <!-- Modal  ubah-->
                    <div class="modal fade" id="modalUbah<?=$no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Ubah Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="aksi_crud.php" method="POST">
                            <!-- id data yg mau diubah -->
                            <input type="hidden" name="id" value="<?=$data['id'] ?>">

                        <div class="modal-body">
                                <div class="mb-3">
                                    <label for="tanggal1" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="tTanggal" value="<?=$data['tanggal_data'] ?>" placeholder="name@example.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi1" class="form-label">Deskripsi Tugas</label>
                                    <textarea class="form-control" name="tDeskripsi" rows="3" placeholder="Ketikan Deskripsi Tugas..."><?=$data['deskripsi_data'] ?></textarea>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="bubah">Simpan</button>
                        </div>
                        </form>
                        
                        </div>
                    </div>
                    </div>
                    <!-- akhir modaal ubah -->

                            <!-- Modal  hapus-->
                            <div class="modal fade" id="modalHapus<?=$no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="aksi_crud.php" method="POST">
                            <!-- id data yg mau diubah -->
                            <input type="hidden" name="id" value="<?=$data['id'] ?>">

                        <div class="modal-body">
                                <div class="mb-3">
                                    
                                    <h5 class="text-center">Apakah anda yakin menghapus data ini ?</h5>

                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="bhapus">Hapus</button>
                        </div>
                        </form>
                        
                        </div>
                    </div>
                    </div>
                    <!-- akhir modaal hapus -->

                    <?php endwhile; ?>
                </table>

                <!-- Modal  tambah-->
                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Tambah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="aksi_crud.php" method="POST">
                    <div class="modal-body">
                            <div class="mb-3">
                                <label for="tanggal1" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" name="tTanggal" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi1" class="form-label">Deskripsi Tugas</label>
                                <textarea class="form-control" name="tDeskripsi" rows="3" placeholder="Ketikan Deskripsi Tugas..."></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                    </div>
                    </form>
                    
                    </div>
                </div>
                </div>
                <!-- akhir modaal tambah-->

            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>