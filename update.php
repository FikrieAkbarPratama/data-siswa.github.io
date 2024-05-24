<?php 
session_start();

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!isset($_SESSION['dataSiswa'])) {
    $_SESSION['dataSiswa'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['ubah'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $nis = htmlspecialchars($_POST['nis']);
    $rayon = htmlspecialchars($_POST['rayon']);

    $nis_ada = false;
    foreach ($_SESSION['dataSiswa'] as $key => $siswa) {
        if ($siswa['nis'] == $nis && $key != $id) {
            $nis_ada = true;
            break;
        }
    }

    if (!$nis_ada && isset($_SESSION['dataSiswa'][$id])) {
        $_SESSION['dataSiswa'][$id] = array(
            "nama" => $nama,
            "nis" => $nis,
            "rayon" => $rayon
        );
        $_SESSION['alert'] = 'success_update';
    } else {
        $_SESSION['alert'] = 'failure_update';
    }
    header("Location: index.php");
    exit;
}

$student = isset($_SESSION['dataSiswa'][$id]) ? $_SESSION['dataSiswa'][$id] : null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- css -->
    <style>
    .container {
        max-width: 790px;
        margin: 50px auto;
        padding: 20px;
    }
    </style>
</head>
<body>
    <div class="container shadow p-3 mb-5 bg-body-tertiary rounded">
        <form action="" method="post">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama :</label>
              <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $student ? htmlspecialchars($student['nama']) : ''; ?>" required>
            </div>
            <div class="mb-3">
              <label for="nis" class="form-label">NIS :</label>
              <input type="text" class="form-control" name="nis" id="nis" value="<?php echo $student ? htmlspecialchars($student['nis']) : ''; ?>" required>
            </div>
            <div class="mb-3">
              <label for="rayon" class="form-label">Rayon :</label>
              <input type="text" class="form-control" name="rayon" id="rayon" value="<?php echo $student ? htmlspecialchars($student['rayon']) : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
            <a class="btn btn-danger" href="index.php" role="button">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
