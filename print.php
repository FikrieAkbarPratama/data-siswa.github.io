<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>-+-+-</title>
    <!-- fontAwesome -->
    <script src="https://kit.fontawesome.com/7dfe115e0d.js" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- googleFonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
            <div class="data_wrapper">
                <div class="primary-title fs-1 mb-3 fw-bold text-center">Data Siswa</div>
                <div class="little-title">List Data</div>
                <table class="table  table-striped table-hover">
                    <thead class="table-success bg-green">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Rayon</th>
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
