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
            boxAlertVal.style.display = "none";
            var idPelayananSebaran = '';
            $.ajax({
                type: "POST", 
                url: "<?php echo base_url('Home/getAkunLoginJSON')?>",
                async : false,
                dataType: "JSON",
                success: function(data){
                    dataLoginJSON = data;
                    idPelayananSebaran = data.idPelayanan;
                }             
            });
            
            if (document.getElementById('dataSebaranJSON') !== null){
                    getSebaranJSON();
            }
            if (document.getElementById('dataSebaranJSONReport') !== null){
                getSebaranJSONReport();
            }
            function getSebaranJSON(){
                $.ajax({
                        type: "POST", 
                        url: "<?php echo base_url('Home/getSebaranJSON')?>",
                        data : {
                            idPelayanan : idPelayananSebaran
                        },
                        dataType: "JSON",
                        success: function(data){
                            dataTempSebaran = data;
                            listSebaran();
                        }             
                    });
            }
            function getSebaranJSONReport(){
                $.ajax({
                        type: "POST", 
                        url: "<?php echo base_url('Home/getSebaranJSON')?>",
                        data : {
                            idPelayanan : idPelayananSebaran
                        },
                        dataType: "JSON",
                        success: function(data){
                            dataTempSebaranReport = data;
                            listSebaranReport();
                        }             
                    });
            }
            function listSebaran(){
                var ketOptions = "";
                for (var i = 0; i < dataTempSebaran.length; i++) {
                    ketOptions += "<tr><td>"+dataTempSebaran[i].namaPelayanan+"</td><td>"+dataTempSebaran[i].namaPenyakit+"</td><td>"+dataTempSebaran[i].inputDate+"</td><td>"+dataTempSebaran[i].totalInput+"</td><td><button class='badge badge-warning' onclick='cekEdit("+dataTempSebaran[i].idSebaran+")''>Edit</button><button class='badge badge-danger' onclick='cekHapus("+dataTempSebaran[i].idSebaran+")'>Hapus</button></td></tr>";
                }
                document.getElementById('dataSebaranJSON').innerHTML = ketOptions;
            }

            function listSebaranReport(){
                var ketOptions = "";
                for (var i = 0; i < dataTempSebaranReport.length; i++) {
                    ketOptions += "<tr><td>"+dataTempSebaranReport[i].namaPelayanan+"</td><td>"+dataTempSebaranReport[i].namaPenyakit+"</td><td>"+dataTempSebaranReport[i].inputDate+"</td><td>"+dataTempSebaranReport[i].totalInput+"</td></tr>";
                }
                document.getElementById('dataSebaranJSONReport').innerHTML = ketOptions;
            }

            if (document.getElementById('idJenisPelayanan') !== null){
                    $.ajax({
                        type: "POST", 
                        url: "<?php echo base_url('Home/getJenisPelayananJSON')?>",
                        dataType: "JSON",
                        success: function(data){
                            var ketOptions = "<option value='0' selected>Select</option>";
                            for (var i = 0; i < data.length; i++) {
                                ketOptions += "<option value="+data[i].idJenisPelayanan+">"+data[i].namaJenisPelayanan+"</option>"
                            }
                            document.getElementById('idJenisPelayanan').innerHTML = ketOptions;
                        }             
                    });
            }
            if (document.getElementById('idPelayanan') !== null){
                    $.ajax({
                        type: "POST", 
                        url: "<?php echo base_url('Home/getPelayananKesehatanJSON')?>",
                        dataType: "JSON",
                        success: function(data){
                            var ketOptions = "<option value='0' selected>Select All</option>";
                            for (var i = 0; i < data.length; i++) {
                                ketOptions += "<option value="+data[i].idPelayanan+">"+data[i].namaPelayanan+"</option>"
                            }
                            document.getElementById('idPelayanan').innerHTML = ketOptions;
                        }             
                    });
            }
            if (document.getElementById('idJenisPenyakit') !== null){
                    $.ajax({
                        type: "POST", 
                        url: "<?php echo base_url('Home/getJenisPenyakitJSON')?>",
                        dataType: "JSON",
                        success: function(data){
                            var ketOptions = "<option value='0' selected>Select</option>";
                            for (var i = 0; i < data.length; i++) {
                                ketOptions += "<option value="+data[i].idJenisPenyakit+">"+data[i].namaPenyakit+"</option>"
                            }
                            
                            document.getElementById('idJenisPenyakit').innerHTML = ketOptions;
                        }             
                    });
            }
            if (document.getElementById('idDaerah') !== null){
                    $.ajax({
                        type: "POST", 
                        url: "<?php echo base_url('Home/getDaerahJSON')?>",
                        dataType: "JSON",
                        success: function(data){
                            var ketOptions = "<option value='0' selected>Select</option>";
                            for (var i = 0; i < data.length; i++) {
                                ketOptions += "<option value="+data[i].idDaerah+">"+data[i].namaDaerah+"</option>"
                            }
                            document.getElementById('idDaerah').innerHTML = ketOptions;
                        }             
                    });
            }
            if (document.getElementById('idRuleAccess') !== null){
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
            }
            function setAlert(val,type){
                if (type === 'error'){
                    boxAlertVal.style.display = "inline-flex";
                    boxAlertVal.style.backgroundColor = "red";
                    document.getElementById('typeAlert').innerHTML = 'Peringatan !!';
                    document.getElementById('keteranganAlert').innerHTML = val;
                }else if(type === 'success'){
                    boxAlertVal.style.display = "inline-flex";
                    boxAlertVal.style.backgroundColor = "green";
                    document.getElementById('typeAlert').innerHTML = 'Berhasil !!';
                    document.getElementById('keteranganAlert').innerHTML = val;
                }
                boxAlertVal.focus();
                setTimeout(closeAlert, 3000);
            }
            function closeAlert(){
                boxAlertVal.style.display = "none";
            }
            $(document).ready( function () {
                $('#datatableAkunUser').DataTable();
            } );


        </script>
    </body>
