<?php
include 'database.php';
$db_0054 = new Database; 
$db_0054->tampilData();
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD OOP PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  </head>
  <body>
    <div class="container mt-3">
            <h1>CRUD OOP PHP</h1>
            <hr>
            <!-- tombol tambah data -->
            <a href="input.php" class="btn btn-success">Tambah Data</a>
            <hr>
            <!-- tabel untuk menambah data user -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nomor = 1;
                        foreach ($db_0054->tampilData() as $dataUser) {
                            $modalId = 'modal' . $dataUser['id'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $nomor++; ?></th>
                        <td><?php echo $dataUser ['nama']; ?></td>
                        <td><?php echo $dataUser ['jns_kelamin']; ?></td>
                        <td><?php echo $dataUser ['alamat']; ?></td>
                        <td><?php echo $dataUser ['nohp']; ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId; ?>">Detail</button>

                            <!-- Modal -->
                    <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="width: 27rem;">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card" style="width: 25rem;">
                            
                            <div class="card-body d-flex justify-content-center">
                            <img src="<?php echo $dataUser['gambar']; ?>" class="card-img-top mt-3 rounded" alt="Foto <?php echo $dataUser['nama']; ?>" style="width: 100px; height: auto;">
                            </div>
                                <table class="table table-bordered no-margin">
                                    <tbody>
                                        <tr>
                                            <th style="">Nama</th>
                                            <td><?php echo $dataUser ['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="">Jenis Kelamin</th>
                                            <td><?php echo $dataUser ['jns_kelamin']; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="">Alamat</th>
                                            <td><?php echo $dataUser ['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <th style="">No HP</th>
                                            <td><?php echo $dataUser ['nohp']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                    </div>
                            <a href="edit.php?id=<?php echo $dataUser['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" 
                                class="btn btn-danger btn-sm" 
                                onclick="hapusData(<?php echo $dataUser['id']; ?>)">Hapus</a>
                        </td>
                    </tr>

                    

                    <?php
                    }
                    ?>
                </tbody>
            </table>
            
    </div>
    
    
    <!-- SweetAlert untuk notifikasi berhasil/gagal menyimpan data -->
    <script>
    // Fungsi untuk mendapatkan query parameter dari URL
    function getQueryParameter(name) {
        let urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    // Cek status di URL
    let status = getQueryParameter('status');

    // Jika status 'success', tampilkan SweetAlert berhasil
    if (status === 'success') {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data berhasil disimpan.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            // Menghapus parameter status dari URL setelah alert
            history.replaceState(null, '', window.location.pathname);
        });
    }
    // Jika status 'error', tampilkan SweetAlert gagal
    else if (status === 'error') {
        Swal.fire({
            title: 'Gagal!',
            text: 'Data gagal disimpan.',
            icon: 'error',
            confirmButtonText: 'Coba Lagi'
        }).then(() => {
            // Menghapus parameter status dari URL setelah alert
            history.replaceState(null, '', window.location.pathname);
        });
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
    function hapusData(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Pindahkan pengalihan URL ke sini agar hanya terjadi setelah konfirmasi
                window.location.href = "proses.php?id=" + id + "&aksi=hapus";
            }
        });
    }
</script>

  </body>
</html>