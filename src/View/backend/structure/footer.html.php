    </div><!--/. container-fluid -->
  </section>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <b>Hoby-Qode</b></strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="/assets/plugins/jquery.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/admin/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/assets/admin/js/pages/dashboard2.js"></script>
<script src="/assets/plugins/swup.min.js"></script>
<script>
  const swup = new Swup();
</script>
</body>
</html>
<?php $time_end = microtime(true);
  $execution_time = ($time_end - $time_start); ?>
<div class="debug" 
  style="position: fixed;
    bottom: 10px;
    right: 10px;
    z-index: 99999;
    color: white;">
  <?php echo round(($execution_time*1000), 1).'ms';?>
</div>