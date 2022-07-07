

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sistem Informasi Penyebaran Penyakit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="account-body accountbg">

    <!-- Register page -->
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center p-3">
                                    <a href="index.html" class="logo logo-admin">
                                        <img src="<?= base_url();?>assets/images/logo-dinkes.png" height="50" alt="logo" class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">Sistem Informasi Sebaran Penyakit Menular</h4>   
                                    <p class="text-muted  mb-0">Dinas Kesehatan Provinsi Sumatera Selatan</p>  
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="alert custom-alert custom-alert-danger icon-custom-alert alert-secondary-shadow fade show" role="alert" style="
                                      display:none; 
                                      z-index: 1000; 
                                      width:100%;  
                                      position: fixed;
                                      left: 0;
                                      bottom: 0;
                                      width: 30%;
                                      color: white;
                                      background-color: red;
                                      text-align: center;" id="box-alert-val">                                            
                                    <i class="la la-skull-crossbones alert-icon text-danger align-self-center font-30 mr-3" style="color: white"></i>
                                    <div class="alert-text my-1">
                                        <h5 class="mb-1 font-weight-bold mt-0" id="typeAlert" style="color: white">Danger</h5>
                                        <span id="keteranganAlert" >Oh snap! Change a few things up and try submitting again.</span>
                                    </div>                                        
                                    <div class="alert-close">
                                       <!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="mdi mdi-close font-16"></i></span>
                                        </button> -->
                                    </div>
                                </div> 
                                <div class="alert custom-alert custom-alert-danger icon-custom-alert alert-secondary-shadow fade show" role="alert" style="
                                      display:inline-flex; 
                                      z-index: 1000; 
                                      width:100%;  
                                      position: fixed;
                                      right:0;
                                      bottom: 0;
                                      width: 15%;
                                      color: white;
                                      background-color: #303e67;
                                      text-align: center;" id="box-notif-val">                                            
                                   
                                    <div class="alert-text my-1">
                                        <h5 class="mb-1 font-weight-bold mt-0" id="typeAlert" style="color: white">Kontak Admin</h5>
                                        <span id="keteranganAlert" >Hubungi : 0812-1212-1212</span>
                                    </div>                                        
                                    <div class="alert-close">
                                       <!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="mdi mdi-close font-16"></i></span>
                                        </button> -->
                                    </div>
                                </div> 
                                <ul class="nav-border nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active font-weight-semibold" data-toggle="tab" href="#LogIn_Tab" role="tab">  <i class="fas fa-angle-double-right"></i> Masuk <i class="fas fa-angle-double-left"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link font-weight-semibold" data-toggle="tab" href="#Register_Tab" role="tab">  <i class="fas fa-angle-double-right"></i> Daftar <i class="fas fa-angle-double-left"></i></a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3 pt-3" id="LogIn_Tab" role="tabpanel">                                        
                                        <form class="form-horizontal auth-form my-4" action="index.html">

                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <div class="input-group mb-3">                                                                                         
                                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                                                </div>                                    
                                            </div><!--end form-group--> 

                                            <div class="form-group">
                                                <label for="userpassword">Password</label>                                            
                                                <div class="input-group mb-3">                                  
                                                    <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">
                                                </div>                               
                                            </div><!--end form-group--> 

                                            <div class="form-group mb-0 row">
                                                <div class="col-12 mt-2">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" onclick="masukSystem()" type="button">Masuk<i class="fas fa-sign-in-alt ml-1" id="buttonMasuk"></i></button>
                                                </div><!--end col--> 
                                            </div> <!--end form-group-->                           
                                        </form><!--end form-->

                                    </div>
                                    <div class="tab-pane  px-3 pt-3" id="Register_Tab" role="tabpanel">
                                        <form class="form-horizontal auth-form my-4">

                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <div class="input-group mb-3">                                                                                         
                                                    <input type="text" class="form-control" name="usernameDaftar" id="usernameDaftar" placeholder="Enter username">
                                                </div>                                    
                                            </div><!--end form-group--> 

                                            <div class="form-group">
                                                <label for="useremail">Email</label>
                                                <div class="input-group mb-3">                                                                                         
                                                    <input type="email" class="form-control" name="email" id="useremail" placeholder="Enter Email">
                                                </div>                                    
                                            </div><!--end form-group-->

                                            <div class="form-group">
                                                <label for="userpassword">Password</label>                                            
                                                <div class="input-group mb-3">                                  
                                                    <input type="password" class="form-control" name="passwordDaftar" id="passwordDaftar" placeholder="Enter password">
                                                </div>                               
                                            </div><!--end form-group--> 

                                            <div class="form-group">
                                                <label for="conf_password">Confirm Password</label>                                            
                                                <div class="input-group mb-3">                                   
                                                    <input type="password" class="form-control" name="conf-password" id="conf_password" placeholder="Enter Confirm Password">
                                                </div>
                                            </div><!--end form-group-->

                                            <div class="form-group">
                                                <label for="mo_number">Mobile Number</label>                                            
                                                <div class="input-group mb-3">                                 
                                                    <input type="number" class="form-control" name="mobile number" id="mo_number" placeholder="Enter Mobile Number">
                                                </div>                               
                                            </div><!--end form-group-->  

                                             <div class="form-group">
                                                <label for="mo_number">Health services</label>                                            
                                            <select class="select2 form-control mb-3 custom-select" id="idPelayanan" style="width: 100%; height:36px;">
                                            </select>                               
                                            </div><!--end form-group--> 

                                            <div class="form-group row mt-4">
                                                <div class="col-sm-12">
                                                    <div class="custom-control custom-switch switch-success">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                                                        <label class="custom-control-label text-muted" for="customSwitchSuccess">Cheklist, Jika Data Benar</label>
                                                    </div>
                                                </div><!--end col-->                                             
                                            </div><!--end form-group--> 

                                            <div class="form-group mb-0 row">
                                                <div class="col-12 mt-2">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="button" onclick="daftarSystem()">Daftar <i class="fas fa-sign-in-alt ml-1"></i></button>
                                                </div><!--end col--> 
                                            </div> <!--end form-group-->                           
                                        </form><!--end form-->                                                 
                                    </div>
                                </div>
                            </div><!--end card-body-->
                            <div class="card-body bg-light-alt text-center">
                                <span class="text-muted d-none d-sm-inline-block">Sistem Informasi Sebaran Penyakit Menular © <?= date('Y');?></span>                                            
                            </div>
                        </div><!--end card-->

                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <!-- End Register page -->





    <!-- jQuery  -->
    <script src="<?= base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url();?>assets/js/waves.js"></script>
    <script src="<?= base_url();?>assets/js/feather.min.js"></script>
    <script src="<?= base_url();?>assets/js/simplebar.min.js"></script>

    <script >
        var boxAlertVal = document.getElementById('box-alert-val');
        // alert("aaa");
        boxAlertVal.style.display = "none";

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

        function masukSystem(){
            var msg = "";
            var username = document.getElementById('username');
            var userpassword = document.getElementById('userpassword');
            if (username.value === "" || userpassword.value === ""){
                msg += 'Username di isi !<br>';
                msg += 'Password di isi !<br>';
                setAlert(msg,'error')
            }else{
              $.ajax({
                type: "POST", 
                url: "<?php echo base_url('User/cekData')?>",
                data:  {
                    username :username.value,
                    userpassword :userpassword.value
                },
                dataType: "JSON",
                success: function(data){
                  console.log(data);
                  console.log(data.msg);
                  if (data.msg === 'berhasil'){
                      var audio = new Audio('<?=base_url()?>assets/sound/sound-login.mp3');
                      audio.play();
                      location.replace("<?=base_url('Home')?>");
                      setAlert('Berhasil Login !','success');
                  }else{
                      setAlert(data.msg,'error');
                  }
                }             
              });
            }
        }

        function daftarSystem(){
            var msg = "";
            var usernameDaftar = document.getElementById('usernameDaftar');
            var useremail = document.getElementById('useremail');
            var passwordDaftar = document.getElementById('passwordDaftar');
            var conf_password = document.getElementById('conf_password');
            var mo_number = document.getElementById('mo_number');
            var idPelayanan = document.getElementById('idPelayanan');
            var customSwitchSuccess = document.getElementById('customSwitchSuccess');
            console.log(customSwitchSuccess.checked);
            if(customSwitchSuccess.checked){
                if (passwordDaftar.value !== conf_password.value){
                    msg += 'Konfirmasi Password Tidak Sama !<br>';
                }else if(usernameDaftar.value === ''){
                    msg += 'Harap Masukan Username !<br>';
                }else if(useremail.value === ''){
                    msg += 'Harap Masukan Email !<br>';
                }else if(passwordDaftar.value === ''){
                    msg += 'Harap Masukan Password !<br>';
                }else if(conf_password.value === ''){
                    msg += 'Harap Ulangi password !<br>';
                }else if(mo_number.value === ''){
                    msg += 'Harap Masukan Handphone !<br>';
                }else if(idPelayanan.value === '0'){
                    msg += 'Harap Pilih Pelayanan !<br>';
                }else{
                    $.ajax({
                        type: "POST", 
                        url: "<?php echo base_url('User/daftarUser')?>",
                        data:  {
                            usernameDaftar :usernameDaftar.value,
                            useremail :useremail.value,
                            passwordDaftar :passwordDaftar.value,
                            mo_number :mo_number.value,
                            idPelayanan :idPelayanan.value,
                            idRuleAccess : 5,
                            statusUser :0
                        },
                        dataType: "JSON",
                        success: function(data){
                          console.log(data.length );
                          if (data.msg === 'berhasil'){
                            deleteValueForm();
                            location.replace("<?=base_url('User')?>");
                            setAlert('Berhasil Daftar Akun !','success')
                          }else{
                            setAlert('Username Sudah Terdaftar','error');
                          }
                        }             
                      });
                }
                if (msg !== ''){
                     setAlert(msg,'error');
                }
            }else{
                setAlert('Please Cheklist Data !', 'error');
            }
        }
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
            setTimeout(closeAlert, 3000);
        }
        function closeAlert(){
            boxAlertVal.style.display = "none";
        }

        function deleteValueForm(){
            usernameDaftar.value = '';
            useremail.value = '';
            passwordDaftar.value = '';
            conf_password.value = '';
            mo_number.value = '';
            customSwitchSuccess.checked = false;
            boxAlertVal.style.display = "none";
        }

    </script>
</body>

</html>