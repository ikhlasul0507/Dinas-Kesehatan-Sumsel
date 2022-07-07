

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
                                            <h5>Grafik Sebaran</h5>
                                            <div>
                                              <canvas id="myChart"></canvas>
                                            </div>
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
                    let  dataChart;
                    var  dataTempChartLabel = [];
                    var  dataTempChartValue = [];
                    getMap();
                    function getMap(){
                        var map;
                        navigator.geolocation.getCurrentPosition(function(location) {
                            var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
                            map = L.map('map').setView(latlng, 13);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                            }).addTo(map);
                            L.control.scale().addTo(map);
                            $.ajax({
                                type: "POST", 
                                url: "<?php echo base_url('Home/getSebaranPenyakitMAPJSON')?>",
                                dataType: "JSON",
                                success: function(data){
                                    dataJSON = data;
                                    for (var i = 0; i < data.length; i++) {
                                        var colorValue;
                                        var radiusValue;
                                        if (data[i].totalPerDaerah < 50){
                                            colorValue = '#ff0000';
                                            radiusValue = 500;
                                        }else if (data[i].totalPerDaerah > 50 && data[i].totalPerDaerah < 100){
                                            colorValue = '#e60000';
                                            radiusValue= 700;
                                        }else if (data[i].totalPerDaerah > 150 && data[i].totalPerDaerah < 200){
                                            colorValue = '#cc0000';
                                            radiusValue= 900;
                                        }else if (data[i].totalPerDaerah > 250 && data[i].totalPerDaerah < 350){
                                            colorValue = '#b30000';
                                            radiusValue= 1100;
                                        }else if (data[i].totalPerDaerah > 350 && data[i].totalPerDaerah < 500){
                                            colorValue = '#990000';
                                            radiusValue= 1300;
                                        }else if (data[i].totalPerDaerah > 500 && data[i].totalPerDaerah < 600){
                                            colorValue = '#660000';
                                            radiusValue= 1500;
                                        }
                                        circle = L.circle([data[i].lat, data[i].lang], {
                                            color: colorValue,
                                            fillColor: colorValue,
                                            fillOpacity: 0.5,
                                            radius: radiusValue
                                        }).addTo(map).bindPopup("<center><b>Total Penyakit : "+data[i].totalPerDaerah+"</b><br>Lokasi : "+data[i].namaDaerah+"<br><button type='button' onclick='detailData("+data[i].idDaerah+")' class='btn btn-sm btn-outline-primary'><i data-feather='book' class='align-self-center icon-xs'></i>Detail</button></center>");
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
                        tableDetailDataVal.innerHTML = "";
                       
                        console.log("id" + id);
                        $.ajax({
                                type: "POST", 
                                url: "<?php echo base_url('Home/getSebaranPenyakitMAPJSONDetail')?>",
                                async : false,
                                data : {
                                    idSebaran : id
                                },
                                dataType: "JSON",
                                success: function(data){
                                    console.log(data);
                                    var tempData = "";
                                    var idPelayanan;
                                    if (data.length > 0){
                                        for (var i = 0; i < data.length; i++) {
                                        dataTempChartLabel.push("Penyakit :"+data[i].namaPenyakit+"("+data[i].totalInput+") Di "+data[i].namaPelayanan);
                                        dataTempChartValue.push(data[i].totalInput);
                                        idPelayanan = data[i].idPelayanan;
                                        tempData += "<tr><td>Lokasi : <b>"+data[i].namaDaerah+"</b><br><br><img src='<?php echo base_url()?>assets/images/"+data[i].photoPelayanan+"' style='width : 200px;height:100px'></td><td>Nama Pelayanan : <b>"+data[i].namaPelayanan+"</b> <br>Nama Penyakit : "+data[i].namaPenyakit+"<br>Total Data : <button class='badge badge-danger' disabled>"+data[i].totalInput+"</button> <br>Tanggal Input : "+data[i].inputDate+"</td></tr>";
                                        }
                                        tableDetailDataVal.innerHTML = tempData;
                                    }
                                }
                            });

                            console.log(dataTempChartLabel);
                            console.log(dataTempChartValue);

                            //chart
                            const data = {
                              labels: dataTempChartLabel,
                              datasets: [{
                                label: 'My First Dataset',
                                data: dataTempChartValue,
                                backgroundColor: [
                                    '#003f5c',
                                    '#2f4b7c',
                                    '#665191',
                                    '#a05195',
                                    '#d45087',
                                    '#f95d6a',
                                    '#ff7c43',
                                    '#ffa600',
                                    '#F9F871',
                                    '#00DAFF',
                                    '#FF89F3'

                                ],
                                hoverOffset: 4
                              }]
                            };

                            const config = {
                              type: 'doughnut',
                              data: data,
                            };
                            dataChart = new Chart(document.getElementById('myChart'),config);

                    }
                    
                    function tambahCancel(){
                        showData.style.display='inline';
                        formTambahData.style.display='none';
                        dataTempChartLabel = [];
                        dataTempChartValue = [];
                        dataChart.destroy();
                    }
                   

                </script>