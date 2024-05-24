<?php 
session_start();

$alert = isset($_SESSION['alert']) ? $_SESSION['alert'] : null;
unset($_SESSION['alert']);
?>

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
