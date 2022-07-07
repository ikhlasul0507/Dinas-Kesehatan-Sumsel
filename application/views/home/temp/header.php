

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
        <link rel="shortcut icon" href="<?= base_url();?>assets/images/logo-dinkes.png">

        <!-- jvectormap -->
        <link href="<?= base_url();?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

        <!-- App css -->
        <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/jquery-ui.min.css" rel="stylesheet">
        <link href="<?= base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
         <!-- DataTables -->
        <link href="<?= base_url();?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?= base_url();?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
        <!-- for leaflet js -->
         <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
           integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
           crossorigin=""/>
            <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
           integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
           crossorigin=""></script>
        <style type="text/css">
            #map { height: 580px; }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>


    <div class="alert custom-alert custom-alert-danger icon-custom-alert alert-secondary-shadow fade show" role="alert" style="
                                      display:none; 
                                      z-index: 1000; 
                                      width:100%;  
                                      position: fixed;
                                      right: 0;
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