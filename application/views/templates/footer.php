<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright 2021 &copy; BPPRD Tabalong</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Datatables -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js" defer></script>

  <!-- <script src="<?= base_url('assets/'); ?>dataTables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>dataTables/dataTables.bootstrap4.min.js"></script> -->


  <!-- Login page -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->

  <!-- Dropdowns porfile -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"></link> -->

  <!-- Datepicker -->
  <script src="<?= base_url('assets/'); ?>datepicker/jquery-3.5.1.min.js"></script>
  <script src="<?= base_url('assets/'); ?>datepicker/jquery-ui.min.js"></script>

  <script>
    
    $("#datepicker").datepicker({
        changeMonth : true,
        changeYear : true,
    });

  </script>

  <script>

    $("#datepicker1").datepicker({
        changeMonth : true,
        changeYear : true
    });

  </script>

  <!-- JQUERY -->
  <script>
  
  //EDIT PROFILE
    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

  // CHECKBOX  
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url:"<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
              menuId: menuId,
              roleId: roleId
            },
            success: function(){
              document.location.href = "<?= base_url('admin/roleaccess/'); ?>" +  roleId;
            }
        });

    });

  </script>

<!-- Load edit foto -->

  <script>
     var loadFile = function(event) {
         var output = document.getElementById('output');
         output.src = URL.createObjectURL(event.target.files[0]);
     };
  </script>

  <!-- DataTables -->
  <script>
    $(document).ready(function() {
        $('#datatables').DataTable({
           "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    } );
  </script>

  <!-- DataTables admin menu -->
  <script>
    $(document).ready(function() {
        $('#datatablesadminmenu').DataTable({
           "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    } );
  </script>

  <!-- DataTables admin sub menu -->
  <script>
    $(document).ready(function() {
        $('#datatablesadminsubmenu').DataTable({
           "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    } );
  </script>

  <!-- DataTables admin daftaruser -->
  <script>
    $(document).ready(function() {
        $('#datatablesadmindaftaruser').DataTable({
           "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    } );
  </script>
  

</body>

</html>