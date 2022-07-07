

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
                                <div class="card-body table-responsive">
                                    <table id="datatableAkunUser" class="table table-bordered">
                                        <thead><tr>
                                            <th>Jenis Pelayanan</th>
                                            <th>Nama Pelayanan</th>
                                            <th>Lokasi</th>
                                            <th>Koordinat</th>
                                            <th>Photo</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr></thead>
                                        <tbody>
                                        <?php foreach ($tempPelayananKesehatan as $value) :?>
                                        <tr>
                                            <td><?= $value['namaJenisPelayanan'];?></td>
                                            <td><?= $value['namaPelayanan'];?></td>
                                            <td><?= $value['lokasiPelayanan'];?><br><b><?= $value['namaDaerah'];?></b></td>
                                            <td><?= $value['lang'];?>,<br><?= $value['lat'];?></td>
                                            <td>
                                                <a href="<?= base_url();?>assets/images/<?= $value['photoPelayanan'];?>" class="logo" target="blank" >
                                                    <span>
                                                        <img src="<?= base_url();?>assets/images/<?= $value['photoPelayanan'];?>" alt="logo-small" class="logo-sm"  style="width:100px;height: 100px">
                                                    </span>
                                                </a>
                                            </td>
                                            <td><?= $value['keteranganPelayanan'];?></td>
                                            <td>
                                                <?php 
                                                if ($value['statusPelayanan'] === '0'){
                                                    echo "<b>Tidak Aktif</b>";
                                                }else{
                                                    echo "<b>Aktif</b>";
                                                }
                                                ?>
                                                </td>
                                            <td>
                                                <button class="badge badge-warning" onclick="cekEdit(<?= $value['idPelayanan'];?>)">Edit</button>
                                                <button class="badge badge-danger" onclick="cekHapus(<?= $value['idPelayanan'];?>)">Hapus</button>
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

                    <form id="submit">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="page-title">Tambah Data <?= $title; ?></h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?= $title1; ?></a></li>
                                            <li class="breadcrumb-item active">Tambah Data <?= $title; ?></li>
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
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                        <div class="form-group">
                                            <label for="example-input1-group1">Pelayanan Kesehatan</label>
                                            <select class="select2 form-control mb-3 custom-select" id="idJenisPelayanan" name="idJenisPelayanan" style="width: 100%; height:36px;">
                                                <option>Select</option>
                                            </select>
                                            <label for="example-input1-group1">Pilih Daerah</label>
                                            <select class="select2 form-control mb-3 custom-select" id="idDaerah" name="idDaerah" style="width: 100%; height:36px;">
                                                <option>Select</option>
                                            </select> 
                                            <label for="example-input1-group1">Nama Pelayanan</label>
                                            <div class="input-group">
                                                <input type="text" id="namaPelayanan" name="namaPelayanan" class="form-control" placeholder="namaPelayanan">
                                            </div>
                                            <label for="example-input1-group1">Lokasi Pelayanan</label>
                                            <div class="input-group">
                                                <textarea id="lokasiPelayanan" name="lokasiPelayanan" class="form-control">
                                                </textarea>
                                            </div>
                                            <label for="example-input1-group1">Longitude</label>
                                            <div class="input-group">
                                                <input type="text" id="lang" name="lang" class="form-control" placeholder="lang">
                                            </div>
                                            <label for="example-input1-group1">Latitude</label>
                                            <div class="input-group">
                                                <input type="text" id="lat" name="lat" class="form-control" placeholder="lat">
                                            </div>
                                            <label for="example-input1-group1">Photo</label>
                                            <div class="input-group">
                                                <input type="file" id="photoPelayanan" onchange="pilihPhoto()" name="photoPelayanan" class="form-control" placeholder="photoPelayanan">
                                            <button type="button" id="buttonUpload" onclick="prosesUpload()" class="btn btn-sm btn-outline-dark">
                                            <i data-feather="book" class="align-self-center icon-xs"></i>
                                            Upload
                                            </button>
                                            <button type="button" id="buttonSuccessUpload" class="badge badge-success fa-check" disabled>Success</button>
                                            
                                            </div>
                                            <label for="example-input1-group1">Keterangan</label>
                                            <div class="input-group">
                                                <textarea id="keteranganPelayanan" name="keteranganPelayanan" class="form-control">
                                                </textarea>
                                            </div>
                                            <label for="example-input1-group1">Status Pelayanan</label>
                                            <select class="select2 form-control mb-3 custom-select" id="statusPelayanan" name="statusPelayanan" style="width: 100%; height:36px;">
                                                <option selected value="1">Aktif</option>
                                                <option value="0">Tidak Aktif</option>
                                            </select>
                                        </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                        
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <!-- add map -->
                                    <div id="map"></div>
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
                    document.getElementById('buttonSuccessUpload').style.display = 'none';
                    var idPelayananKesehatan = "";
                    var isUpload = false;
                    var dataNamaPhotoBaru;
                    getMap();
                    function getMap(){
                        var map;
                        navigator.geolocation.getCurrentPosition(function(location) {
                            var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
                            // alert(latlng);

                            map = L.map('map').setView(latlng, 13);

                             L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                            }).addTo(map);
                            var marker = L.marker(latlng).addTo(map).bindPopup("<b>Current location !</b>").openPopup();
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

                    function pilihPhoto(){
                        document.getElementById('buttonUpload').style.display = 'inline';
                        document.getElementById('buttonSuccessUpload').style.display = 'none';
                    }
                    function prosesUpload(){
                        var photoPelayanan = $('#photoPelayanan').val();
                        if (photoPelayanan !== ''){
                            var file_data = $('#photoPelayanan').prop('files')[0];
                            var form_data = new FormData();

                            form_data.append('file', file_data);
                            form_data.append('text', $('#namaPelayanan').val());

                            $.ajax({
                                 url:'<?php echo base_url();?>Home/uploadPhotoPelayananKesehatan',
                                 type:"post",
                                 data:form_data,
                                 processData:false,
                                 contentType:false,
                                 cache:false,
                                 async:false,
                                  success: function(data){
                                    if (data.status === 'success') {
                                        setAlert('Berhasil upload !','success');
                                        isUpload = true;
                                        document.getElementById('buttonUpload').style.display = 'none';
                                        document.getElementById('buttonSuccessUpload').style.display = 'inline';
                                        displayPhoto();
                                    }else{
                                        setAlert(data.msg,'error');
                                    }
                                    console.log(data);
                               }
                             });
                        }else{
                            setAlert('Harap Pilih Photo','error');
                        }
                    }

                    function displayPhoto(){
                        var filesSelected = document.getElementById("photoPelayanan").files;
                            if (filesSelected.length > 0) {
                              var fileToLoad = filesSelected[0];

                              var fileReader = new FileReader();

                               fileReader.onload = function(fileLoadedEvent) {
                                var srcData = fileLoadedEvent.target.result; // <--- data: base64

                                var newImage = document.createElement('img');
                                newImage.src = srcData;
                                newImage.style.width = '300px';
                                document.getElementById("imgTest").innerHTML = newImage.outerHTML;
                              }
                              fileReader.readAsDataURL(fileToLoad);
                            }
                    }
                    function prosesTambah(){
                        var msg="";
                        //tambah
                        var input = document.getElementById("photoPelayanan");
                        var file = input.value.split("\\");
                        var fileNamePhoto = file[file.length-1];
                        var idJenisPelayanan    = $('#idJenisPelayanan').val();
                        var idDaerah    = $('#idDaerah').val();
                        var namaPelayanan    = $('#namaPelayanan').val();
                        var lokasiPelayanan    = $('#lokasiPelayanan').val();
                        var statusPelayanan    = $('#statusPelayanan').val();
                        var lang    = $('#lang').val();
                        var lat    = $('#lat').val();
                        var keteranganPelayanan = $('#keteranganPelayanan').val(); 

                        if (idJenisPelayanan === '0'){
                            msg += 'Harap Masukan idJenisPelayanan !<br>';
                        }else if (idDaerah === '0'){
                            msg += 'Harap Masukan idDaerah !<br>';
                        }else if (namaPelayanan === ''){
                            msg += 'Harap Masukan namaPelayanan !<br>';
                        }else if (lokasiPelayanan === ''){
                            msg += 'Harap Masukan lokasiPelayanan !<br>';
                        }else if (lang === ''){
                            msg += 'Harap Masukan lang !<br>';
                        }else if (lat === ''){
                            msg += 'Harap Masukan lat !<br>';
                        }else if (keteranganPelayanan === ''){
                            msg += 'Harap Masukan keteranganPelayanan !<br>';
                        }else{
                            //add to db
                            if (idPelayananKesehatan === ""){
                                if(isUpload){
                                //add
                                    $.ajax({
                                        type: "POST", 
                                        url: "<?php echo base_url('Home/daftarPelayananKesehatan')?>",
                                        data:  {
                                            idJenisPelayanan :idJenisPelayanan,
                                            idDaerah :idDaerah,
                                            namaPelayanan :namaPelayanan,
                                            lokasiPelayanan :lokasiPelayanan,
                                            lang :lang,
                                            lat :lat,
                                            photoPelayanan :fileNamePhoto,
                                            keteranganPelayanan :keteranganPelayanan,
                                            statusPelayanan :statusPelayanan
                                        },
                                        dataType: "JSON",
                                        success: function(data){
                                          console.log(data);
                                          if (data.msg === 'berhasil'){
                                            // deleteValueForm();
                                            location.replace("<?=base_url('Home/pelayananKesehatan')?>");
                                            setAlert('Berhasil Daftar Pelayanan Kesehatan !','success')
                                          }else{
                                            setAlert('namaPelayanan Sudah Terdaftar','error');
                                          }
                                        }             
                                      });
                                }else{
                                    setAlert('Harap Upload Photo','error');
                                }
                            }else{
                                //edit
                                var isCek = true
                                if (fileNamePhoto !== ""){
                                    dataNamaPhotoBaru = fileNamePhoto
                                    if(!isUpload){
                                        setAlert("Harap Upload Photo",'error');
                                        isCek = false;
                                    }
                                }
                                if(isCek){
                                    //save edit
                                     $.ajax({
                                        type: "POST", 
                                        url: "<?php echo base_url('Home/editPelayananKesehatan')?>",
                                        data:  {
                                            idPelayanan : idPelayananKesehatan,
                                            idJenisPelayanan :idJenisPelayanan,
                                            idDaerah :idDaerah,
                                            namaPelayanan :namaPelayanan,
                                            lokasiPelayanan :lokasiPelayanan,
                                            lang :lang,
                                            lat :lat,
                                            photoPelayanan :dataNamaPhotoBaru,
                                            keteranganPelayanan :keteranganPelayanan,
                                            statusPelayanan :statusPelayanan
                                        },
                                        dataType: "JSON",
                                        success: function(data){
                                          console.log(data);
                                          if (data.msg === 'berhasil'){
                                            // deleteValueForm();
                                            location.replace("<?=base_url('Home/pelayananKesehatan')?>");
                                            setAlert('Berhasil Edit Pelayanan Kesehatan !','success')
                                          }else{
                                            setAlert('namaPelayanan Sudah Terdaftar','error');
                                          }
                                        }             
                                      });
                                }
                            }
                        }     
                        if (msg !== ''){
                             setAlert(msg,'error');
                        } 
                        
                        // var msg="";
                        // var namaPelayananDaftar = $('#namaPelayanan').val();
                        // var keteranganPenyakit = $('#keteranganPenyakit').val();
                        // var statusPenyakit = $('#statusPenyakit').val();
                        // console.log(idPelayanan);
                        // console.log(new FormData(this));
                        // if(namaPelayananDaftar === ''){
                        //     msg += 'Harap Masukan namaPelayanan !<br>';
                        // }if(keteranganPenyakit === ''){
                        //     msg += 'Harap Masukan keteranganPenyakit !<br>';
                        // }if(statusPenyakit === ''){
                        //     msg += 'Harap Masukan statusPenyakit !<br>';
                        // }else{
                        //     if (idPelayanan === ""){
                        //         $.ajax({
                        //             type: "POST", 
                        //             url: "<?php echo base_url('Home/daftarPelayanan')?>",
                        //             data:  {
                        //                 namaPelayananDaftar :namaPelayananDaftar,
                        //                 keteranganPenyakit :keteranganPenyakit,
                        //                 statusPenyakit :statusPenyakit
                        //             },
                        //             dataType: "JSON",
                        //             success: function(data){
                        //               console.log(data.length );
                        //               if (data.msg === 'berhasil'){
                        //                 // deleteValueForm();
                        //                 location.replace("<?=base_url('Home/pelayananKesehatan')?>");
                        //                 setAlert('Berhasil Daftar Pelayanan Kesehatan !','success')
                        //               }else{
                        //                 setAlert('namaPelayanan Sudah Terdaftar','error');
                        //               }
                        //             }             
                        //           });
                        //     }else{
                        //         $.ajax({
                        //             type: "POST", 
                        //             url: "<?php echo base_url('Home/editPelayanan')?>",
                        //             data:  {
                        //                 idPelayanan : idPelayanan,
                        //                 namaPelayananDaftar :namaPelayananDaftar,
                        //                 keteranganPenyakit :keteranganPenyakit,
                        //                 statusPenyakit :statusPenyakit
                        //             },
                        //             dataType: "JSON",
                        //             success: function(data){
                        //               console.log(data.length );
                        //               if (data.msg === 'berhasil'){
                        //                 // deleteValueForm();
                        //                 location.replace("<?=base_url('Home/pelayananKesehatan')?>");
                        //                 setAlert('Berhasil Edit Pelayanan Kesehatan !','success')
                        //               }else{
                        //                 setAlert('Gagal Edit Pelayanan Kesehatan','error');
                        //               }
                        //             }             
                        //           });
                        //     }
                        // }
                        // if (msg !== ''){
                        //      setAlert(msg,'error');
                        // }
                    }
                    function tambahData(){
                        showData.style.display='none';
                        formTambahData.style.display='inline';
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
                    function cekHapus(id){
                        var result = confirm("Yakin Hapus Data ?");
                            if (result) {
                                 $.ajax({
                                    type: "POST", 
                                    url: "<?php echo base_url('Home/hapusPelayananKesehatan')?>",
                                    data:  {
                                        idPelayanan :id,
                                    },
                                    dataType: "JSON",
                                    success: function(data){
                                      console.log(data);
                                      console.log(data);
                                      if (data.msg === 'berhasil'){
                                          setAlert('Berhasil Hapus !','success');
                                          location.replace("<?=base_url('Home/pelayananKesehatan')?>");
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
                            url: "<?php echo base_url('Home/getPelayananById')?>",
                            data:  {
                                idPelayanan :id,
                            },
                            dataType: "JSON",
                            success: function(data){
                              console.log(data);
                                idPelayananKesehatan = data.idPelayanan;
                                $('#idJenisPelayanan').val(data.idJenisPelayanan);
                                dataNamaPhotoBaru = data.photoPelayanan;
                                $('#idDaerah').val(data.idDaerah);
                                $('#namaPelayanan').val(data.namaPelayanan);
                                $('#lokasiPelayanan').val(data.lokasiPelayanan);
                                $('#statusPelayanan').val(data.statusPelayanan);
                                $('#lang').val(data.lang);
                                $('#lat').val(data.lat);
                                $('#keteranganPelayanan').val(data.keteranganPelayanan); 
                                tambahData();
                                var img = document.createElement('img');
                                    img.style.width = '300px';
                                    img.src = '<?php echo base_url()?>assets/images/'+data.photoPelayanan;
                                    document.getElementById('imgTest').appendChild(img);
                            }             
                          });
                    }

                </script>