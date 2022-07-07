

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
                                        
                                    </div><!--end col-->  
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                        <!-- addd -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- add map -->
                                <div id="map"></div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div><!-- container -->
                <div class="container-fluid" id="formTambahData">
                    <!-- Page-Title -->

                    <form id="submit">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">Detail Data <?= $title; ?></h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?= $title1; ?></a></li>
                                            <li class="breadcrumb-item active">Detail Data <?= $title; ?></li>
                                        </ol>
                                    </div><!--end col-->
                                    <div class="col-auto align-self-center">
                                        <button type="button" onclick="tambahCancel()" class="btn btn-sm btn-outline-warning">
                                            <i data-feather="back" class="align-self-center icon-xs"></i>
                                            Kembali
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
                                            <table class="table table-bordered" id='tableDetailData' style="width: 100%">
                                                
                                            </table>
                                        </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <!-- add map -->
                                    <div id="mapDetail"></div>
                                    <a href="#" class="logo" >
                                        <span>
                                            <h5>Photo</h5>
                                            <div id="imgTest" style="width:300px;height: 300px"></div>
                                        </span>
                                    </a>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        
                    </div><!--end row-->
                    </form>
                </div><!-- container -->
                <script type="text/javascript">
                    var showData = document.getElementById('showData');
                    var formTambahData = document.getElementById('formTambahData');
                    formTambahData.style.display='none';
                    var dataJSON = [];
                    getMap();
                    function getMap(){
                        var map;
                        navigator.geolocation.getCurrentPosition(function(location) {
                            var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
                            map = L.map('map').setView(latlng, 13);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                            }).addTo(map);
                            var marker = L.marker(latlng).addTo(map).bindPopup("<b>Current location !</b>").openPopup();
                            L.control.scale().addTo(map);
                            $.ajax({
                                type: "POST", 
                                url: "<?php echo base_url('Home/getPelayananKesehatanJSON')?>",
                                dataType: "JSON",
                                success: function(data){
                                    dataJSON = data;
                                    for (var i = 0; i < data.length; i++) {
                                        L.marker([data[i].lat, data[i].lang]).addTo(map).bindPopup("<center><b>"+data[i].namaPelayanan+"</b><br>Lokasi : "+data[i].namaDaerah+"<br><img src='<?= base_url();?>assets/images/"+data[i].photoPelayanan+"' alt='logo-small' class='logo-sm'  style='width:100px;height: 100px'><br><button type='button' onclick='detailData("+data[i].idPelayanan+")' class='btn btn-sm btn-outline-primary'><i data-feather='book' class='align-self-center icon-xs'></i>Detail</button></center>");
                                        var colorValue;
                                        if (data[i].idPelayanan < 10){
                                            colorValue = '#32a852';
                                        }else{
                                            colorValue = '#ed0909';
                                        }
                                    }
                                }             
                                });
                            map.on('click', onMapClick);
                        });

                    }

                    function onMapClick(e) {
                        $('#lang').val(e.latlng.lng);
                        $('#lat').val(e.latlng.lat);
                    }

                    function detailData(id){
                        showData.style.display='none';
                        formTambahData.style.display='inline';
                        var tableDetailDataVal = document.getElementById("tableDetailData");
                        document.getElementById('imgTest').innerHTML="";
                        var tempData = "";
                        for (var i = 0; i < dataJSON.length; i++) {
                            if (dataJSON[i].idPelayanan == id){
                                tempData = "<tr><td>Pelayanan Kesehatan</td><td>"+dataJSON[i].namaJenisPelayanan+"</td></tr><tr><td>Nama Pelayanan</td><td>"+dataJSON[i].namaPelayanan+"</td></tr><tr><td>Nama Daerah</td><td>"+dataJSON[i].namaDaerah+"</td></tr><tr><td>Lokasi Pelayanan</td><td>"+dataJSON[i].lokasiPelayanan+"</td></tr><tr><td>Keterangan Pelayanan</td><td>"+dataJSON[i].keteranganPelayanan+"</td></tr><tr><td>Date Created</td><td>"+dataJSON[i].dateCreated+"</td></tr>";
                                var img = document.createElement('img');
                                img.style.width = '300px';
                                img.src = '<?php echo base_url()?>assets/images/'+dataJSON[i].photoPelayanan;
                                document.getElementById('imgTest').appendChild(img);
                                tableDetailDataVal.innerHTML = tempData;
                            }
                        }
                    }
                    function tambahCancel(){
                        showData.style.display='inline';
                        formTambahData.style.display='none';
                        $('#idJenisPelayanan').val("0");
                        $('#photoPelayanan').val("");
                        $('#idDaerah').val("0");
                        $('#namaPelayanan').val("");
                        $('#lokasiPelayanan').val("");
                        $('#statusPelayanan').val("1");
                        $('#lang').val("");
                        $('#lat').val("");
                        $('#keteranganPelayanan').val(""); 
                        idPelayananKesehatan = "";
                        pilihPhoto();
                        document.getElementById("imgTest").innerHTML = "";
                    }
                   

                </script>