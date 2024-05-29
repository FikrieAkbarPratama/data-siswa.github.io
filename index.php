<?php 
session_start();

if (!isset($_SESSION['dataSiswa'])) {
    $_SESSION['dataSiswa'] = array();
}

$alert = null;

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['tambah'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $nis = htmlspecialchars($_POST['nis']);
    $rayon = htmlspecialchars($_POST['rayon']);

    $nis_ada = false;
    foreach ($_SESSION['dataSiswa'] as $siswa) {
        if ($siswa['nis'] == $nis) {
            $nis_ada = true;
            break;
        }
    }

    if (!$nis_ada) {
        $_SESSION['dataSiswa'][] = array(
            "nama" => $nama,
            "nis" => $nis,
            "rayon" => $rayon
        );
        $_SESSION['alert'] = 'success_add';
    } else {
        $_SESSION['alert'] = 'failure_add';
    }
}

$alert = isset($_SESSION['alert']) ? $_SESSION['alert'] : null;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- fontAwesome -->
    <script src="https://kit.fontawesome.com/7dfe115e0d.js" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        function printOtherPage(url) {
            var printWindow = window.open(url, '_blank');
            printWindow.addEventListener('load', function() {
                printWindow.print();
                printWindow.close();
            }, true);
        }
    </script>
</head>
<body >
    <div class="container">
        <h1 class="primary-heading text-center mb-5 mt-5">Menambahkan Data Siswa</h1>
        
        <?php if ($alert == 'success_add') : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil menambah!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($alert == 'failure_add') : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Gagal menambah!</strong> NIS yang anda masukkan sudah terdaftar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($alert == 'success_update') : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil mengubah!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif ($alert == 'failure_update') : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Gagal mengubah!</strong> NIS yang anda masukkan sudah terdaftar atau ID tidak valid.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>


        <form action="" method="post">
            <div class="input_data_wrapper mb-5">
                <div class="input_data mb-3">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="nis" placeholder="NIS (maxlength: 8)"  maxlength="8" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="rayon" placeholder="Rayon (contoh: Cicurug 7)" required>
                        </div>
                    </div>
                </div>
                <div class="action">
                    <button type="submit" class="btn btn-success" name="tambah"><i class="fa-solid fa-plus"></i>Tambah</button>
                    <a class="btn btn-danger" href="deleteAll.php" role="button" onclick="return confirm('Ingin menghapus semua data?')"> <i class="fa-solid fa-arrow-rotate-right"></i>Reset</a>
                    <button type="button" class="btn btn-primary" name="cetak" onclick="printOtherPage('print.php')"><i class="fa-solid fa-print"></i>Cetak</button>
                </div>
            </div>
    
            <hr>
    
            <div class="data_wrapper">
                <div class="little-title">List Data</div>

                <table class="table table-striped table-hover">
                    <thead class="table-success">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Rayon</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    <?php $i = 1; ?>
                    <?php if(!empty($_SESSION["dataSiswa"])) : ?>
                    <?php foreach($_SESSION['dataSiswa'] as $key => $row) : ?>
                      <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['nis'] ?></td>
                        <td><?= $row['rayon'] ?></td>
                        <td>
                            <a class="btn btn-primary" title="detail siswa" href="detail.php?id=<?= $key ?>" role="button"><i class="fa-solid fa-user"></i></a>
                            <a class="btn btn-warning" title="perbarui" href="update.php?id=<?= $key ?>" role="button"><i class="fa-solid fa-pen"></i></a>
                            <a class="btn btn-danger" title="hapus satu baris data" href="deleteRow.php?id=<?= $key ?>" role="button"><i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php $i++; ?>
                      <?php endforeach; ?>
                      <?php else : ?>
                        <td colspan="5"><center>Tidak ada data</center></td>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
