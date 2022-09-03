<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Penyebaran Penyakit</title>
  <link rel="shortcut icon" href="<?= base_url();?>assets/images/logo-dinkes.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- for leaflet js -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
  integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
  crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
  integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
  crossorigin=""></script>
  <style type="text/css">
    #map { height: 580px;width: 100% }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="<?= base_url();?>assets/js/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="<?= base_url();?>assets/images/logo-dinkes.png" width="300" height="30" class="d-inline-block align-top" alt="">
        <div class="spinner-grow text-warning" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>

  </a>
  
<div id="google_translate_element"></div>
</nav>

<script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <div class="" id="showData">
    <!-- Page-Title -->
    <!-- addd -->
    <div class="row" >
      <div class="" style="">
        <div class="card">
          <!-- add map -->
          <div id="map"></div>
        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->
  </div><!-- container -->
  <div class="" id="formTambahData">
    <!-- Page-Title -->

    <form id="submit">
      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box">
            <div class="row">
              <div class="col">
                <h5 class="page-title">Detail Data Sebaran Penyakit</h5>
              </div><!--end col-->
              <div class="col-auto align-self-center">
                <button type="button" onclick="tambahCancel()" class="btn btn-sm btn-outline-primary">
                  <i data-feather="back" class="align-self-center icon-xs"></i>
                  Kembali
                </button>   
              </div><!--end col-->  
            </div><!--end row-->                                                              
          </div><!--end page-title-box-->
        </div><!--end col-->
      </div><!--end row-->
      <!-- addd -->

      <div class="row mt-4">
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
              <span class="logo" >
                <h5>Grafik Sebaran</h5>
                <div>
                  <canvas id="myChart"></canvas>
                </div>
              </span>
            </div><!--end card-body-->
          </div><!--end card-->
        </div><!--end col-->

      </div><!--end row-->
    </form>
  </div><!-- container -->
  <div class="card text-center">
    <div class="card-header">
          <div class="d-flex align-items-center">
      <strong >Real Time Updated Data</strong> - Dinas Kesehatan Provinsi Sumatera Selatan
      <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
    </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script type="text/javascript">
    var showData = document.getElementById('showData');
    var formTambahData = document.getElementById('formTambahData');
    formTambahData.style.display='none';
    var dataJSON = [];
    let  dataChart;
    var  dataTempChartLabel = [];
    var  dataTempChartValue = [];

    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum;at', 'Sabtu'];
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth();
    var thisDay = date.getDay(),
    thisDay = myDays[thisDay];
    var yy = date.getYear();
    var year = (yy < 1000) ? yy + 1900 : yy;

    function showTime() {
      var a_p = "";
      var today = new Date();
      var curr_hour = today.getHours();
      var curr_minute = today.getMinutes();
      var curr_second = today.getSeconds();
      if (curr_hour < 12) {
        a_p = "AM";
      } else {
        a_p = "PM";
      }
      if (curr_hour == 0) {
        curr_hour = 12;
      }
      if (curr_hour > 12) {
        curr_hour = curr_hour - 12;
      }
      curr_hour = checkTime(curr_hour);
      curr_minute = checkTime(curr_minute);
      curr_second = checkTime(curr_second);
      document.getElementById('clock').innerHTML=thisDay + ', ' + day + ' ' + months[month] + ' ' + year +" "+curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
    }
    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
    setInterval(showTime, 500);
                    // getMap();
    setInterval(getMap, 500);
  
    // getMap();
    function getMap(){
      var map;
      navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
        map = L.map('map').setView(latlng, 13);
        var marker = L.marker(latlng).addTo(map).bindPopup("<b>Current location !</b>").openPopup();
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
        }).addTo(map);
        L.control.scale().addTo(map);
        $.ajax({
          type: "POST", 
          url: "<?php echo base_url('Welcome/getSebaranPenyakitMAPJSON')?>",
          dataType: "JSON",
          success: function(data){
            dataJSON = data;
            console.log(data);
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
        url: "<?php echo base_url('Welcome/getSebaranPenyakitMAPJSONDetail')?>",
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
              tempData += "<tr><td>Lokasi : <b>"+data[i].namaDaerah+"</b><br><br><img src='<?php echo base_url()?>assets/images/"+data[i].photoPelayanan+"' style='width : 200px;height:100px'></td><td>Nama Pelayanan : <b>"+data[i].namaPelayanan+"</b> <br>Nama Penyakit : "+data[i].namaPenyakit+"<br>Total Data : "+data[i].totalInput+"<br>Tanggal Input : "+data[i].inputDate+"</td></tr>";
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
      </body>
      </html>