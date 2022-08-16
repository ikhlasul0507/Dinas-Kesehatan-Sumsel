

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
                                        
                                        <button type="button" onclick="tambahData()" class="btn btn-sm btn-outline-primary">
                                            <i data-feather="plus" class="align-self-center icon-xs"></i>
                                            Tambah
                                        </button>
                                    </div><!--end col-->  
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                        <!-- addd -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatableAkunUser" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead><tr><th>Nama Daerah</th><th>DateCreated</th><th>Action</th></tr></thead>
                                        <tbody>
                                        <?php foreach ($tempDataDaerah as $value) :?>
                                        <tr>
                                            <td><?= $value['namaDaerah'];?></td>
                                            <td><?= $value['dateCreated'];?></td>
                                            <td>
                                                <button class="badge badge-warning" onclick="cekEdit(<?= $value['idDaerah'];?>)">Edit</button>
                                                <button class="badge badge-danger" onclick="cekHapus(<?= $value['idDaerah'];?>)">Hapus</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
    
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div><!-- container -->
                <div class="container-fluid" id="formTambahData">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">Tambah Data Daerah</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?= $title1; ?></a></li>
                                            <li class="breadcrumb-item active">Tambah Data Daerah</li>
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form>
                                       
                                        <div class="form-group">
                                            <label for="example-input1-group1">Nama Daerah</label>
                                            <div class="input-group">
                                                <input type="text" id="namaDaerah" name="example-input1-group1" class="form-control" placeholder="namaDaerah">
                                            </div>
                                        </div>
                                    </form><!--end form-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        
                    </div><!--end row-->
                </div><!-- container -->
                <script type="text/javascript">
                    var showData = document.getElementById('showData');
                    var formTambahData = document.getElementById('formTambahData');
                    formTambahData.style.display='none';
                    var idDaerah = "";
                    function prosesTambah(){
                        var msg="";
                        var namaDaerahDaftar = $('#namaDaerah').val();
                        console.log(idDaerah);
                        if(namaDaerahDaftar === ''){
                            msg += 'Harap Masukan namaDaerah !<br>';
                        }else{
                            if (idDaerah === ""){
                                $.ajax({
                                    type: "POST", 
                                    url: "<?php echo base_url('Home/daftarDataDaerah')?>",
                                    data:  {
                                        namaDaerahDaftar :namaDaerahDaftar
                                    },
                                    dataType: "JSON",
                                    success: function(data){
                                      console.log(data.length );
                                      if (data.msg === 'berhasil'){
                                        // deleteValueForm();
                                        location.replace("<?=base_url('Home/dataDaerah')?>");
                                        setAlert('Berhasil Daftar Akun !','success')
                                      }else{
                                        setAlert('namaDaerah Sudah Terdaftar','error');
                                      }
                                    }             
                                  });
                            }else{
                                $.ajax({
                                    type: "POST", 
                                    url: "<?php echo base_url('Home/editDataDaerah')?>",
                                    data:  {
                                        idDaerah : idDaerah,
                                        namaDaerahDaftar :namaDaerahDaftar
                                    },
                                    dataType: "JSON",
                                    success: function(data){
                                      console.log(data.length );
                                      if (data.msg === 'berhasil'){
                                        // deleteValueForm();
                                        location.replace("<?=base_url('Home/dataDaerah')?>");
                                        setAlert('Berhasil Edit Akun !','success')
                                      }else{
                                        setAlert('Gagal Edit Akun','error');
                                      }
                                    }             
                                  });
                            }
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
                        $('#namaDaerah').val("");
                        idDaerah = "";
                    }
                    function cekHapus(id){
                        var result = confirm("Yakin Hapus Data ?");
                            if (result) {
                                 $.ajax({
                                    type: "POST", 
                                    url: "<?php echo base_url('Home/getPelayananKesehatanJSON')?>",
                                    data:  {
                                        idDaerah :id,
                                    },
                                    dataType: "JSON",
                                    success: function(data){
                                      console.log(data);
                                      console.log(data);
                                      if (data.msg === 'berhasil'){
                                          setAlert('Berhasil Hapus !','success');
                                          location.replace("<?=base_url('Home/dataDaerah')?>");
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
                            url: "<?php echo base_url('Home/getDataDaerahById')?>",
                            data:  {
                                idDaerah :id,
                            },
                            dataType: "JSON",
                            success: function(data){
                              console.log(data);
                                idDaerah = data.idDaerah;
                                $('#namaDaerah').val(data.namaDaerah);
                                tambahData();
                            }             
                          });
                    }

                </script>