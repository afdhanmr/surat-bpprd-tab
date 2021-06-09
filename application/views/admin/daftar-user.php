<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('message'); ?>

	<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="<?= base_url('admin/registration'); ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                  <?= form_error('name', '<div class="text-danger small ml-2">', '</div>') ?>
                </div>                     
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<div class="text-danger small ml-2">', '</div>') ?>
                </div>                
                <div class="form-group">
                <input type="text" class="form-control form-control-user" id="role_id" name="role_id" placeholder="Role ID contoh : 2 ,3 Atau 4" value="<?= set_value('role_id'); ?>">
				<div class="alert alert-success mt-2" role="alert">
				  	<p>* Role id 2 : Untuk User Pembuat Surat</p>
				  	<p>* Role id 3 : Untuk Kepala Badan</p>
				  	<p>* Role id 4 : Untuk Kabid, Kasubid, Kasubag, dll</p>
				  	<p>*Masukan Role id sesuai kebutuhan</p>
				</div>
				</div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                     <?= form_error('password1', '<div class="text-danger small ml-2">', '</div>') ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                     <?= form_error('password2', '<div class="text-danger small ml-2">', '</div>') ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
	  	<div class="col-md-12">
	  		<div class="card shadow-sm table-responsive">
	  			<div class="card-body">
			  		<table class="table table-hover" id="datatablesadmindaftaruser">
			  			<thead class="thead-dark">
			  				<th>No</th>
			  				<th>Nama</th>
			  				<th>Email</th>
			  				<th>Role ID</th>
			  			</thead>
			  			<tbody>
			  				<?php
			  				$no = 1;
			  				foreach ($daftaruser as $us) : ?>
			  				
			  				<tr>
			  					<td><?php echo $no++ ?></td>
			  					<td><?php echo $us->name ?></td>
			  					<td><?php echo $us->email ?></td>
			  					<td>
			  						<?php if($us->role_id == '1') { ?>
			  							<p class="btn btn-primary btn-sm btn-block">Admin Super</p>
			  						<?php } elseif($us->role_id == '2') { ?>
			  							<p class="btn btn-info btn-sm btn-block">User</p>
			  						<?php } elseif($us->role_id == '3') { ?>
			  							<p class="btn btn-warning btn-sm btn-block">kepala Badan</p>
			  						<?php } elseif($us->role_id == '4') { ?>
			  							<p class="btn btn-danger btn-sm btn-block">Kabid, Kasubid, Kasubag dll</p>
			  						<?php } ?>
			  					</td>
			  				</tr>

			  				<?php endforeach; ?>
			  			</tbody>
			  		</table>
	      		</div>
	  		</div>
  		</div>
  	</div>

</div>
</div>