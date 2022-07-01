      <footer class="footer text-center text-sm-left">
                    &copy; 2020<span class="d-none d-sm-inline-block float-right">Dinas Kesehatan <i class="mdi mdi-heart text-danger"></i> Sumatera Selatan</span>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        


        <!-- jQuery  -->
        <script src="<?= base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?= base_url();?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url();?>assets/js/metismenu.min.js"></script>
        <script src="<?= base_url();?>assets/js/waves.js"></script>
        <script src="<?= base_url();?>assets/js/feather.min.js"></script>
        <script src="<?= base_url();?>assets/js/simplebar.min.js"></script>
        <script src="<?= base_url();?>assets/js/jquery-ui.min.js"></script>
        <script src="<?= base_url();?>assets/js/moment.js"></script>
        <script src="<?= base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>

        <script src="<?= base_url();?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="<?= base_url();?>assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>

        <!-- App js -->
        <script src="<?= base_url();?>assets/js/app.js"></script>

         <!-- Required datatable js -->
        <script src="<?= base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url();?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <script type="text/javascript">
            var boxAlertVal = document.getElementById('box-alert-val');
            // alert("aaa");
            $.ajax({
                type: "POST", 
                url: "<?php echo base_url('User/getPelayanan')?>",
                dataType: "JSON",
                success: function(data){
                    var ketOptions = "<option value='0' selected>Select</option>";
                    for (var i = 0; i < data.length; i++) {
                        ketOptions += "<option value="+data[i].idPelayanan+">"+data[i].namaPelayanan+"</option>"
                    }
                    document.getElementById('idPelayanan').innerHTML = ketOptions;
                }             
            });

            $.ajax({
                type: "POST", 
                url: "<?php echo base_url('User/getRuleAccess')?>",
                dataType: "JSON",
                success: function(data){
                    var ketOptions = "<option value='0' selected>Select</option>";
                    for (var i = 0; i < data.length; i++) {
                        ketOptions += "<option value="+data[i].idRuleAccess+">"+data[i].nameRule+"</option>"
                    }
                    document.getElementById('idRuleAccess').innerHTML = ketOptions;
                }             
            });
            boxAlertVal.style.display = "none";
            
            function setAlert(val,type){
                if (type === 'error'){
                    boxAlertVal.style.display = "inline-flex";
                    document.getElementById('typeAlert').innerHTML = 'Peringatan !!';
                    document.getElementById('keteranganAlert').innerHTML = val;
                }else{
                    boxAlertVal.style.display = "inline-flex";
                    boxAlertVal.style.backgroundColor = "green";
                    document.getElementById('typeAlert').innerHTML = 'Berhasil !!';
                    document.getElementById('keteranganAlert').innerHTML = val;
                }
                boxAlertVal.focus();
            }
            $(document).ready( function () {
                $('#datatableAkunUser').DataTable();

            } );
        </script>
    </body>
