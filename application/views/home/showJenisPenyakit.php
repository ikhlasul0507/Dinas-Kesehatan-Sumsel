

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
                                        <thead><tr><th>Nama Penyakit</th><th>Keterangan</th><th>Status</th><th>Action</th></tr></thead>
                                        <tbody>
                                        <?php foreach ($tempJenisPenyakit as $value) :?>
                                        <tr>
                                            <td><?= $value['namaPenyakit'];?></td>
                                            <td><?= $value['keteranganPenyakit'];?></td>
                                            <td>
                                                <?php 
                                                if ($value['statusPenyakit'] === '0'){
                                                    echo "<b>Tidak Aktif</b>";
                                                }else{
                                                    echo "<b>Aktif</b>";
                                                }
                                                ?>
                                                </td>
                                            <td>
                                                <button class="badge badge-warning" onclick="cekEdit(<?= $value['idJenisPenyakit'];?>)">Edit</button>
                                                <button class="badge badge-danger" onclick="cekHapus(<?= $value['idJenisPenyakit'];?>)">Hapus</button>
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
                                        <h4 class="page-title">Tambah Data Jenis Penyakit</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?= $title1; ?></a></li>
                                            <li class="breadcrumb-item active">Tambah Data Jenis Penyakit</li>
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
                                            <label for="example-input1-group1">Nama Jenis Penyakit</label>
                                            <div class="input-group">
                                                <input type="text" id="namaPenyakit" name="example-input1-group1" class="form-control" placeholder="namaPenyakit">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-input1-group1">Keterangan Penyakit</label>
                                            <div class="input-group">
                                                <textarea id="keteranganPenyakit" class="form-control">
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-input1-group1">Status Penyakit</label>
                                            <select class="select2 form-control mb-3 custom-select" id="statusPenyakit" style="width: 100%; height:36px;">
                                                <option selected value="1">Aktif</option>
                                                <option value="0">Tidak Aktif</option>
                                            </select>
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
                    var idJenisPenyakit = "";
                    function prosesTambah(){
                        var msg="";
                        var namaPenyakitDaftar = $('#namaPenyakit').val();
                        var keteranganPenyakit = $('#keteranganPenyakit').val();
                        var statusPenyakit = $('#statusPenyakit').val();
                        console.log(idJenisPenyakit);
                        if(namaPenyakitDaftar === ''){
                            msg += 'Harap Masukan namaPenyakit !<br>';
                        }if(keteranganPenyakit === ''){
                            msg += 'Harap Masukan keteranganPenyakit !<br>';
                        }if(statusPenyakit === ''){
                            msg += 'Harap Masukan statusPenyakit !<br>';
                        }else{
                            if (idJenisPenyakit === ""){
                                $.ajax({
                                    type: "POST", 
                                    url: "<?php echo base_url('Home/daftarJenisPenyakit')?>",
                                    data:  {
                                        namaPenyakitDaftar :namaPenyakitDaftar,
                                        keteranganPenyakit :keteranganPenyakit,
                                        statusPenyakit :statusPenyakit
                                    },
                                    dataType: "JSON",
                                    success: function(data){
                                      console.log(data.length );
                                      if (data.msg === 'berhasil'){
                                        // deleteValueForm();
                                        location.replace("<?=base_url('Home/jenisPenyakit')?>");
                                        setAlert('Berhasil Daftar Jenis Penyakit !','success')
                                      }else{
                                        setAlert('namaPenyakit Sudah Terdaftar','error');
                                      }
                                    }             
                                  });
                            }else{
                                $.ajax({
                                    type: "POST", 
                                    url: "<?php echo base_url('Home/editJenisPenyakit')?>",
                                    data:  {
                                        idJenisPenyakit : idJenisPenyakit,
                                        namaPenyakitDaftar :namaPenyakitDaftar,
                                        keteranganPenyakit :keteranganPenyakit,
                                        statusPenyakit :statusPenyakit
                                    },
                                    dataType: "JSON",
                                    success: function(data){
                                      console.log(data.length );
                                      if (data.msg === 'berhasil'){
                                        // deleteValueForm();
                                        location.replace("<?=base_url('Home/jenisPenyakit')?>");
                                        setAlert('Berhasil Edit Jenis Penyakit !','success')
                                      }else{
                                        setAlert('Gagal Edit Jenis Penyakit','error');
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
                        $('#namaPenyakit').val("");
                        $('#keteranganPenyakit').val("");
                        $('#statusPenyakit').val("1");
                        idJenisPenyakit = "";
                    }
                    function cekHapus(id){
                        var result = confirm("Yakin Hapus Data ?");
                            if (result) {
                                 $.ajax({
                                    type: "POST", 
                                    url: "<?php echo base_url('Home/hapusJenisPenyakit')?>",
                                    data:  {
                                        idJenisPenyakit :id,
                                    },
                                    dataType: "JSON",
                                    success: function(data){
                                      console.log(data);
                                      console.log(data);
                                      if (data.msg === 'berhasil'){
                                          setAlert('Berhasil Hapus !','success');
                                          location.replace("<?=base_url('Home/jenisPenyakit')?>");
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
                            url: "<?php echo base_url('Home/getJenisPenyakitById')?>",
                            data:  {
                                idJenisPenyakit :id,
                            },
                            dataType: "JSON",
                            success: function(data){
                              console.log(data);
                                idJenisPenyakit = data.idJenisPenyakit;
                                $('#namaPenyakit').val(data.namaPenyakit);
                                $('#keteranganPenyakit').val(data.keteranganPenyakit);
                                $('#statusPenyakit').val(data.statusPenyakit);
                                tambahData();
                            }             
                          });
                    }

                </script>