 <body class="dark-sidenav">
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <!-- LOGO -->
            <div class="brand" style="margin-top: 30px">
                <a href="#" class="logo" >
                    <span>
                        <img src="<?= base_url();?>assets/images/logo-dinkes.png" alt="logo-small" class="logo-sm">
                    </span>
                </a>
            </div>
            <!--end logo-->
            <div class="menu-content h-100" data-simplebar>
                <ul class="metismenu left-sidenav-menu">
                    <li class="menu-label mt-0">Main</li>
                    <li>
                        <a href="javascript: void(0);"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Sebaran Penyakit</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/addSebaranPenyakit') ?>"><i class="ti-control-record"></i>Tambah Data</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/showSebaran') ?>"><i class="ti-control-record"></i>List Data</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/showSebaranReport') ?>"><i class="ti-control-record"></i>Report</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/backupDatabase') ?>"><i class="ti-control-record"></i>Backup Database</a></li> 
                        </ul>
                    </li>
                    <?php if($this->session->userdata('idRuleAccess') == 1 || $this->session->userdata('idRuleAccess') == 5){ ?>
                    <li>
                        <a href="javascript: void(0);"><i data-feather="grid" class="align-self-center menu-icon"></i><span>Master Data</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                           
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/showAkun') ?>"><i class="ti-control-record"></i>Akun User</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/ruleAccess') ?>"><i class="ti-control-record"></i>Rule Access</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/jenisPenyakit') ?>"><i class="ti-control-record"></i>Jenis Penyakit</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/dataDaerah') ?>"><i class="ti-control-record"></i>Data Daerah</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/jenisPelayanan') ?>"><i class="ti-control-record"></i>Jenis Pelayanan</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/pelayananKesehatan') ?>"><i class="ti-control-record"></i> Pelayanan Kesehatan</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="javascript: void(0);"><i data-feather="file-plus" class="align-self-center menu-icon"></i><span>Display Map</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/sebaranPenyakit') ?>"><i class="ti-control-record"></i>Sebaran Penyakit</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('Home/sebaranLokasiPelayanan') ?>"><i class="ti-control-record"></i>Lokasi Pelayanan</a></li>
                           
                        </ul>
                    </li>           
                </ul>
    
                <div class="update-msg text-center">
                    <h5 class="mt-3">Selamat Datang</h5>
                    <p class="mb-3"><?= $this->session->userdata('username') ?> | <b>Administrator</b></p>
                    <a href="<?= base_url();?>" target="blank" class="btn btn-outline-warning btn-sm">Lihat Website</a>
                </div>
            </div>
        </div>
        <!-- end left-sidenav-->



        <div class="page-wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">            
                <!-- Navbar -->
                <nav class="navbar-custom">    
                    <ul class="list-unstyled topbar-nav float-right mb-0">                      

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <span class="ml-1 nav-user-name hidden-sm"><?= $this->session->userdata('username') ?></span>
                                <i data-feather="user" class="align-self-center icon-xs icon-dual mr-1"></i>                                 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               
                                <div class="dropdown-divider mb-0"></div>
                                <a class="dropdown-item" href="<?= base_url('User/Logout');?>"><i data-feather="power" class="align-self-center icon-xs icon-dual mr-1"></i>Keluar</a>
                            </div>
                        </li>
                    </ul><!--end topbar-nav-->
        
                    <ul class="list-unstyled topbar-nav mb-0">                        
                        <li>
                            <button class="nav-link button-menu-mobile">
                                <i data-feather="menu" class="align-self-center topbar-icon"></i>
                            </button>
                        </li>                         
                    </ul>
                </nav>
                <!-- end navbar-->
            </div>
            <!-- Top Bar End -->
        