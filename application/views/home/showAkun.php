

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
                                        <thead><tr><th>Rule Access</th><th>Pelayanan</th><th>Username</th><th>Email</th><th>Handphone</th><th>Status</th><th>DateCreated</th><th>Action</th></tr></thead>
                                        <tbody>
                                        <?php foreach ($tempAkun as $value) :?>
                                        <tr>
                                            <td>
                                                <?= $value['nameRule'];?>
                                                <?php if ($this->session->userdata('username') !== $value['username'] && $value['username'] !== 'amal@gmail.com'){ ?>
                                                <button class="badge badge-danger" onclick="resetPassword(<?= $value['idUser'];?>)">Reset Password</button>
                                                <?php }?>
                                                </td>
                                            <td><?= $value['namaPelayanan'];?></td>
                                            <td><?= $value['username'];?></td>
                                            <td><?= $value['email'];?></td>
                                            <td><?= $value['handphone'];?></td>
                                            <td><?= ($value['statusUser'] === '1' ? 'Aktif' : 'Tidak Aktif');?></td>
                                            <td><?= $value['dateCreated'];?></td>
                                            <td>
                                                <?php if ($this->session->userdata('username') !== $value['username'] && $value['username'] !== 'amal@gmail.com'){ ?>
                                                <button class="badge badge-warning" onclick="cekEdit(<?= $value['idUser'];?>)">Edit</button>
                                                <button class="badge badge-danger" onclick="cekHapus(<?= $value['idUser'];?>)">Hapus</button>
                                                <?php }else{
                                                    echo "Sedang Login";
                                                } ?>
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
                                        <h4 class="page-title">Tambah Data User</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?= $title1; ?></a></li>
                                            <li class="breadcrumb-item active">Tambah Data User</li>
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
                                            <label for="example-input1-group1">Rule Access</label>
                                            <select class="select2 form-control mb-3 custom-select" id="idRuleAccess" style="width: 100%; height:36px;">
                                                <option>Select</option>
                                            </select>
                                            <label for="example-input1-group1">Pelayanan Kesehatan</label>
                                            <select class="select2 form-control mb-3 custom-select" id="idPelayanan" style="width: 100%; height:36px;">
                                                <option>Select</option>
                                            </select> 
                                            <label for="example-input1-group1">Username</label>
                                            <div class="input-group">
                                                <input type="text" id="username" name="example-input1-group1" class="form-control" placeholder="Username">
                                            </div>
                                            <label for="example-input1-group1">Email</label>
                                            <div class="input-group">
                                                <input type="text" id="email" name="example-input1-group1" class="form-control" placeholder="Email">
                                            </div> 
                                            <label for="example-input1-group1">Password</label>
                                            <div class="input-group">
                                                <input type="password" id="password" name="example-input1-group1" class="form-control" placeholder="Password">
                                            </div>
                                            <label for="example-input1-group1">Password Confirm</label>
                                            <div class="input-group">
                                                <input type="password" id="password-confirm" name="example-input1-group1" class="form-control" placeholder="Password Confirm">
                                            </div>
                                            <label for="example-input1-group1">Handphone</label>
                                            <div class="input-group">
                                                <input type="text" id="handphone" name="example-input1-group1" class="form-control" placeholder="Handphone">
                                            </div>
                                             <label for="example-input1-group1">Status User</label>
                                            <select class="select2 form-control mb-3 custom-select" id="statusUser" style="width: 100%; height:36px;">
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
                    var idUser;

                     

                    function prosesTambah(){
                        var msg="";
                        var idRuleAccess= $('#idRuleAccess').val();
                        var idPelayanan= $('#idPelayanan').val();
                        var usernameDaftar = $('#username').val();
                        var useremail = $('#email').val();
                        var passwordDaftar = $('#password').val();
                        var conf_password= $('#password-confirm').val();
                        var mo_number = $('#handphone').val();
                        var statusUser = $('#statusUser').val();

                        if (passwordDaftar !== conf_password){
                            msg += 'Konfirmasi Password Tidak Sama !<br>';
                        }else if(usernameDaftar === ''){
                            msg += 'Harap Masukan Username !<br>';
                        }else if(useremail === ''){
                            msg += 'Harap Masukan Email !<br>';
                        }else if(passwordDaftar === ''){
                            msg += 'Harap Masukan Password !<br>';
                        }else if(conf_password === ''){
                            msg += 'Harap Ulangi password !<br>';
                        }else if(mo_number === ''){
                            msg += 'Harap Masukan Handphone !<br>';
                        }else if(idPelayanan === '0'){
                            msg += 'Harap Pilih Pelayanan !<br>';
                        }else if(idRuleAccess === '0'){
                            msg += 'Harap Pilih Access !<br>';
                        }else{
                            if (idUser === ""){
                                $.ajax({
                                    type: "POST", 
                                    url: "<?php echo base_url('User/daftarUser')?>",
                                    data:  {
                                        idRuleAccess : idRuleAccess,
                                        idPelayanan :idPelayanan,
                                        usernameDaftar :usernameDaftar,
                                        useremail :useremail,
                                        passwordDaftar :passwordDaftar,
                                        mo_number :mo_number,
                                        statusUser :statusUser
                                    },
                                    dataType: "JSON",
                                    success: function(data){
                                      console.log(data.length );
                                      if (data.msg === 'berhasil'){
                                        // deleteValueForm();
                                        location.replace("<?=base_url('Home/showAkun')?>");
                                        setAlert('Berhasil Daftar Akun !','success')
                                      }else{
                                        setAlert('Username Sudah Terdaftar','error');
                                      }
                                    }             
                                  });
                            }else{
                                $.ajax({
                                    type: "POST", 
                                    url: "<?php echo base_url('User/editUser')?>",
                                    data:  {
                                        idUser : idUser,
                                        idRuleAccess : idRuleAccess,
                                        idPelayanan :idPelayanan,
                                        usernameDaftar :usernameDaftar,
                                        useremail :useremail,
                                        passwordDaftar :passwordDaftar,
                                        mo_number :mo_number,
                                        statusUser :statusUser
                                    },
                                    dataType: "JSON",
                                    success: function(data){
                                      console.log(data.length );
                                      if (data.msg === 'berhasil'){
                                        // deleteValueForm();
                                        location.replace("<?=base_url('Home/showAkun')?>");
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
                        $('#password').prop('disabled', false);
                        $('#password-confirm').prop('disabled', false);
                        $('#username').prop('disabled', false);
                    }

                    function tambahCancel(){
                        showData.style.display='inline';
                        formTambahData.style.display='none';
                        $('#idRuleAccess').val("0");
                        $('#idPelayanan').val("0");
                        $('#username').val("");
                        $('#email').val("");
                        $('#password').val("");
                        $('#password-confirm').val("");
                        $('#handphone').val("");
                        $('#statusUser').val("1");
                        idRuleAccess = "";
                    }
                    function cekHapus(id){
                        var result = confirm("Yakin Hapus Data ?");
                            if (result) {
                                 $.ajax({
                                    type: "POST", 
                                    url: "<?php echo base_url('Home/hapusUser')?>",
                                    data:  {
                                        idUser :id,
                                    },
                                    dataType: "JSON",
                                    success: function(data){
                                      console.log(data);
                                      console.log(data);
                                      if (data.msg === 'berhasil'){
                                          setAlert('Berhasil Hapus !','success');
                                          location.replace("<?=base_url('Home/showAkun')?>");
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
                            url: "<?php echo base_url('User/getUserById')?>",
                            data:  {
                                idUser :id,
                            },
                            dataType: "JSON",
                            success: function(data){
                              console.log(data);
                                idUser = data.idUser;
                                $('#idRuleAccess').val(data.idRuleAccess);
                                $('#idPelayanan').val(data.idPelayananKesehatan);
                                $('#username').val(data.username);
                                $('#email').val(data.email);
                                $('#password').val(data.password);
                                $('#password-confirm').val(data.password);
                                $('#handphone').val(data.handphone);
                                $('#statusUser').val(data.statusUser);
                                tambahData();
                                $('#password').prop('disabled', true);
                                $('#password-confirm').prop('disabled', true);
                                $('#username').prop('disabled', true);
                            }             
                          });
                    }
                    function resetPassword(id){
                        $.ajax({
                            type: "POST", 
                            url: "<?php echo base_url('User/resetPasswordUser')?>",
                            data:  {
                                idUser :id,
                            },
                            dataType: "JSON",
                            success: function(data){
                              console.log(data);
                              if (data.msg === 'berhasil'){
                                  setAlert('Berhasil Reset Password !','success');
                                  location.replace("<?=base_url('Home/showAkun')?>");
                              }else{
                                  setAlert(data.msg,'error');
                              }
                            }             
                          });

                    }

                </script>