  <!-- Essential javascripts for application to work-->
  <script src="<?= BASE_URL; ?>assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?= BASE_URL; ?>assets/js/popper.min.js"></script>
  <script src="<?= BASE_URL; ?>assets/js/bootstrap.min.js"></script>
  <script src="<?= BASE_URL; ?>assets/js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <!-- Pace js plugin  -->
  <script src="<?= BASE_URL; ?>assets/js/plugins/pace.min.js"></script>
  <!-- Fontawesome js plugin -->
  <script src="<?= BASE_URL; ?>assets/js/plugins/fontawesome.js"></script>
  <!-- Bootstrapp custom styles plugin -->
  <script type="text/javascript" src="<?= BASE_URL; ?>assets/js/plugins/bs-custom-file-input.js"></script>
  <!-- Datatables js plugin -->
  <script type="text/javascript" src="<?= BASE_URL; ?>assets/js/plugins/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?= BASE_URL; ?>assets/js/plugins/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">
    $('.datatable').DataTable();
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      bsCustomFileInput.init()
    })
  </script>