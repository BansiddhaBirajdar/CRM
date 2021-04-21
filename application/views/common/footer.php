
 <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="http://adminlte.io">Msc(Tech-III) CRM</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assetes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assetes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assetes/dist/js/adminlte.js"></script>
<!-- ./wrapper -->
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>assetes/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assetes/plugins/select2/js/select2.full.min.js"></script>

<!-- InputMask -->
<script src="<?php echo base_url(); ?>assetes/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assetes/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<!-- Toastr -->
<script src="<?php echo base_url(); ?>assetes/plugins/toastr/toastr.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assetes/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assetes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assetes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assetes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- ChartJS -->
<!-- <script src="<?php echo base_url(); ?>assetes/plugins/chart.js/Chart.min.js"></script> -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
     
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  });
</script>


</body>
</html>
