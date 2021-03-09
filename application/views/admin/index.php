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

            <!-- Button trigger modal -->
			<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			  DAFTAR USER
			</button> -->

			<!-- Modal -->
			<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">DAFTAR USER</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
		                <div class="form-group">
		                  <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
		                  <?= form_error('name', '<div class="text-danger small ml-2">', '</div>') ?>
		                </div>                     
		                <div class="form-group">
		                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
		                  <?= form_error('email', '<div class="text-danger small ml-2">', '</div>') ?>
		                </div>
		                <div class="form-group row">
		                  <div class="col-sm-6 mb-3 mb-sm-0">
		                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
		                     <?= form_error('password1', '<div class="text-danger small ml-2">', '</div>') ?>
		                  </div>
		                  <div class="col-sm-6">
		                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
		                     <?= form_error('password2', '<div class="text-danger small ml-2">', '</div>') ?>
		                  </div>
		                </div>
		                <button type="submit" class="btn btn-primary btn-block">
		                  Register Account
		                </button>
		                <hr>                
		              <div class="text-center">
		                <a class="small" href="<?= base_url('auth/forgotpassword') ?>">Forgot Password?</a>
		              </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div> -->

          </div>
          <!-- End container fluid -->
            
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->