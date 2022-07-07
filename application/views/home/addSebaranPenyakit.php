

            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid" id="formTambahData">
                    <!-- Page-Title -->

                    <form id="submit">
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
                                            <label for="example-input1-group1">Pilih Jenis Penyakit</label>
                                            <select class="select2 form-control mb-3 custom-select" id="idJenisPenyakit" name="idJenisPenyakit" style="width: 100%; height:36px;">
                                                <option>Select</option>
                                            </select> 
                                            <label for="example-input1-group1">Tanggal Data Input</label>
                                            <div class="input-group">
                                                <input type="date" id="inputDate" name="inputDate" class="form-control" placeholder="inputDate">
                                            </div>
                                            <label for="example-input1-group1">Total Data</label>
                                            <div class="input-group">
                                                <input type="number" id="totalInput" name="totalInput" class="form-control" placeholder="Masukan Total Data">
                                            </div>
                                        <hr>
                                        <label>Chart</label>
                                        </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <!-- add map -->
                                    <div id="map"></div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        
                    </div><!--end row-->
                    </form>
                </div><!-- container -->
                <script type="text/javascript">
                    var showData = document.getElementById('showData');
                    var formTambahData = document.getElementById('formTambahData');
                    var idSebaran = "";
                    var isUpload = false;
                    var dataNamaPhotoBaru;
                    var dataLoginJSON;
                    getMap();
                    function getMap(){
                        var map;
                        navigator.geolocation.getCurrentPosition(function(location) {
                            var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
                            // alert(latlng);

                            map = L.map('map').setView([dataLoginJSON.lat,dataLoginJSON.lang], 13);

                             L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                            }).addTo(map);
                            var marker = L.marker([dataLoginJSON.lat,dataLoginJSON.lang]).addTo(map).bindPopup(dataLoginJSON.namaPelayanan+"<br>Total Penyakit : 30").openPopup();
                            // var circle = L.circle(latlng, {
                            //     color: 'red',
                            //     fillColor: '#f03',
                            //     fillOpacity: 0.5,
                            //     radius: 500
                            // }).addTo(map).bindPopup("hay");
                            map.on('click', onMapClick);

                        });

                    }
                    function onMapClick(e) {

                        $('#lang').val(e.latlng.lng);
                        $('#lat').val(e.latlng.lat);
                        // alert("You clicked the map at " + e.latlng);
                    }

                    function prosesTambah(){
                        var msg="";
                        //tambah
                        var idJenisPenyakit    = $('#idJenisPenyakit').val();
                        var inputDate    = $('#inputDate').val();
                        var totalInput    = $('#totalInput').val();
                        if (idJenisPenyakit === '0'){
                            msg += 'Harap Masukan Jenis Penyakit !<br>';
                        }else if (inputDate === ''){
                            msg += 'Harap Masukan Tanggal Input !<br>';
                        }else if (totalInput === ''){
                            msg += 'Harap Masukan total Input !<br>';
                        }else{
                            //add to db
                            if (idSebaran === ""){
                                //add
                                console.log(inputDate);
                                $.ajax({
                                    type: "POST", 
                                    url: "<?php echo base_url('Home/daftarSebaran')?>",
                                    data:  {
                                        idPelayananKesehatan :dataLoginJSON.idPelayanan,
                                        idJenisPenyakit :idJenisPenyakit,
                                        inputDate :inputDate,
                                        totalInput :totalInput
                                    },
                                    dataType: "JSON",
                                    success: function(data){
                                      console.log(data);
                                      if (data.msg === 'berhasil'){
                                        // deleteValueForm();
                                        location.replace("<?=base_url('Home/addSebaranPenyakit')?>");
                                        setAlert('Berhasil Input Data !','success')
                                      }else{
                                        setAlert('Input Gagal','error');
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
                    
                </script>