        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
          	<div class="col-lg-6">

          		<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

          		<?= $this->session->flashdata('message'); ?>

          		<a href="" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#newRoleModal">Tambah Role Baru</a>

          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Role</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($role as $r) : ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $r['role'] ?></td>
				      <td>
				      		<a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-warning btn-sm">Access</a>
				      		<a href="" class="btn btn-success btn-sm">Edit</a>
				      		<a href=""class="btn btn-danger btn-sm">Delete</a>
				      </td>
				    </tr>
				    <?php $i++; ?>
					<?php endforeach; ?>
				  </tbody>
				</table>
          	</div>
          </div>
            
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

 <!-- MODAL -->

	<!-- Modal -->
	<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="newRoleModalLabel">Tambah Menu</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form method="post" action="<?= base_url('admin/role'); ?>">
		      <div class="modal-body">
		        <div class="form-group">
				    <input type="text" class="form-control" id="role" name="role" placeholder="Role">
				  </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Tambah</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>