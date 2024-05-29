<?php 
session_start();

$id = $_GET['id'];

$siswa = $_SESSION['dataSiswa'][$id];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card w-50 m-auto mt-5">
            <div class="card-body m-5 ">
                <div class="fs-2 fw-bold text-center mb-5">Detail Siswa</div>
                <div class="nama-siswa mb-1">Nama Siswa : <?= $siswa['nama'] ?></div>
                <div class="nis-siswa mb-1">NIS : <?= $siswa['nis'] ?></div>
                <div class="rayon-siswa mb-1">RAYON : <?= $siswa['rayon'] ?></div>
                <a class="btn btn-secondary w-100 mt-3" href="index.php" role="button">Kembali</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>