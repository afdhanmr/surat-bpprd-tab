        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="container-fluid">
              <!-- Content Row -->
              <div class="row">

                  <!-- Jumlah pelatihan semua -->                        
                  <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-primary shadow h-100 py-2">
                          <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                          Jumlah Surat</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->db->query("SELECT id_surat FROM user_data_surat")->num_rows(); ?></div>
                                  </div>
                                  <div class="col-auto">
                                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
              <!-- End Row -->
          </div>
          <!-- End container fluid -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->