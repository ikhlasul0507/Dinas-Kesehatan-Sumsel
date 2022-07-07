

<!-- Page Content-->
<div class="page-content">
    <div class="container-fluid" id="showData">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title"><?= $title; ?></h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);"><?= $title1; ?></a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div><!--end col-->
                        <div class="col-auto align-self-center">
                            <div class="row">
                                <div class="col">
                                    <select class="select2 form-control-sm mb-3 custom-select" onchange="filterbyPelayanan()" id="idPelayanan" name="idPelayanan" style="width: 100%; height:36px;">
                                        <option>Select</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="select2 form-control mb-3 custom-select" onchange="filterbyPenyakit()" id="idJenisPenyakit" name="idJenisPenyakit" style="width: 100%; height:36px;">
                                        <option>Select</option>
                                    </select>
                                </div>
                                <div class="col">
                                   <div class="input-group">
                                        <input type="date" id="inputDate" name="inputDate" onchange="filterbyTanggal()" class="form-control" placeholder="inputDate">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!--end col-->  
                </div><!--end row-->                                                              
            </div><!--end page-title-box-->
        </div><!--end col-->
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead><tr>
                            <th>Nama Pelayanan</th>
                            <th>Jenis Penyakit</th>
                            <th>Tanggal Input</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr></thead>
                        <tbody id="dataSebaranJSON">
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    </div><!--end row-->
    <!-- addd -->
    

<div class="container-fluid" id="formTambahData">
    <!-- Page-Title -->

    <form id="submit">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Tambah Data <?= $title; ?></h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);"><?= $title1; ?></a></li>
                                <li class="breadcrumb-item active">Tambah Data <?= $title; ?></li>
                            </ol>
                        </div><!--end col-->
                        <div class="col-auto align-self-center">
                            <button type="button" onclick="tambahCancel()" class="btn btn-sm btn-outline-warning">
                                <i data-feather="plus" class="align-self-center icon-xs"></i>
                                Cancel
                            </button>   
                            <button type="button" onclick="prosesTambah()" class="btn btn-sm btn-outline-primary">
                                <i data-feather="book" class="align-self-center icon-xs"></i>
                                Simpan
                            </button>
                        </div><!--end col-->  
                    </div><!--end row-->                                                              
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- addd -->
          <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                        <div class="form-group">
                                            <label for="example-input1-group1">Total Data</label>
                                            <div class="input-group">
                                                <input type="number" id="totalInput" name="totalInput" class="form-control" placeholder="Masukan Total Data">
                                            </div>
                                        </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
    </form>
</div><!-- container -->
</div><!-- container -->
<script type="text/javascript">
                    var showData = document.getElementById('showData');
                    var formTambahData = document.getElementById('formTambahData');
                    formTambahData.style.display='none';
                    var idSebaran = "";
                    var isUpload = false;
                    var dataNamaPhotoBaru;


                    var dataTempSebaran;


                    function filterbyPelayanan(){
                        
                        var idPelayanan = $('#idPelayanan').val();
                        if (idPelayanan == '0'){
                            $('#inputDate').val('');
                            $('#idJenisPenyakit').val('0');
                            getSebaranJSON();
                        }else{
                            var newArray = dataTempSebaran.filter(function (el) {
                              return el.idPelayanan === idPelayanan;
                            });
                            console.log(newArray);
                            dataTempSebaran = newArray;
                        }
                        listSebaran();
                    }

                    function filterbyPenyakit(){
                        var idJenisPenyakit = $('#idJenisPenyakit').val();
                        if (idJenisPenyakit == '0'){
                            getSebaranJSON();
                        }else{
                            var newArray = dataTempSebaran.filter(function (el) {
                              return el.idJenisPenyakit === idJenisPenyakit;
                            });
                            console.log(newArray);
                            dataTempSebaran = newArray;
                        }
                        listSebaran();
                    }
                    function filterbyTanggal(){
                        var inputDate = $('#inputDate').val() + " 00:00:00";
                        console.log(inputDate);
                        if (inputDate == '0'){
                            getSebaranJSON();
                        }else{
                            var newArray = dataTempSebaran.filter(function (el) {
                              return el.inputDate === inputDate;
                            });
                            console.log(newArray);
                            dataTempSebaran = newArray;
                        }
                        listSebaran();
                    }
                    

                                    
                    function prosesTambah(){
                        var msg="";
                        var totalInput = $('#totalInput').val();
                        //tambah
                            //add to db
                            if (idSebaran !== ""){
                                    //save edit
                                    $.ajax({
                                        type: "POST", 
                                        url: "<?php echo base_url('Home/editSebaran')?>",
                                        data:  {
                                            idSebaran : idSebaran,
                                            totalInput :totalInput
                                        },
                                        dataType: "JSON",
                                        success: function(data){
                                          console.log(data);
                                          if (data.msg === 'berhasil'){
                                            // deleteValueForm();
                                            location.replace("<?=base_url('Home/showSebaran')?>");
                                            setAlert('Berhasil Edit Sebaran !','success')
                                        }else{
                                            setAlert('Sebaran Sudah Terdaftar','error');
                                        }
                                    }             
                                });
                            }
                            if (msg !== ''){
                               setAlert(msg,'error');
                            } 
                    }
                    function tambahData(){
                        showData.style.display='none';
                        formTambahData.style.display='inline';
                    }

                    function tambahCancel(){
                        showData.style.display='inline';
                        formTambahData.style.display='none';
                          $('#inputDate').val('');
                          $('#totalInput').val('');
                        idPelayananKesehatan = "";

                    }
                    function cekHapus(id){
                        var result = confirm("Yakin Hapus Data ?");
                        if (result) {
                           $.ajax({
                            type: "POST", 
                            url: "<?php echo base_url('Home/hapusSebaran')?>",
                            data:  {
                                idSebaran :id,
                            },
                            dataType: "JSON",
                            success: function(data){
                              console.log(data);
                              console.log(data);
                              if (data.msg === 'berhasil'){
                                  setAlert('Berhasil Hapus !','success');
                                  location.replace("<?=base_url('Home/showSebaran')?>");
                              }else{
                                  setAlert(data.msg,'error');
                              }
                          }             
                      });
                       }
                   }
                   function cekEdit(id){
                    $.ajax({
                        type: "POST", 
                        url: "<?php echo base_url('Home/getSebaranById')?>",
                        data:  {
                            idSebaran :id,
                        },
                        dataType: "JSON",
                        success: function(data){
                          idSebaran = data.idSebaran;
                          $('#idJenisPenyakit').val(data.idJenisPenyakit);
                          $('#inputDate').val(data.inputDate.substring(0, 9));
                          $('#totalInput').val(data.totalInput);
                          tambahData();
                      }             
                  });
                }

            </script>