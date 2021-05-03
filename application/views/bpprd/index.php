<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <?php foreach ($alert as $al): ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Hello <strong><?= $user['name'] ?></strong>, Surat <ins><?php echo $al->no_surat ?></ins> baru keluar.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>

  <?php endforeach; ?>

  <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?= base_url('assets/img/profile/').$user['image']; ?>" class="card-img" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?= $user['name'] ?></h5>
          <p class="card-text"><?= $user['email'] ?></p>
          <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_create']); ?></small></p>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->