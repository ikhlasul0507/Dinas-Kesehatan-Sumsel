<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username') === null){
			redirect('User');
		}
	}
	public function index()
	{
		$this->sebaranLokasiPelayanan();
	}

	public function showAkun()
	{
		$data['title']='Akun User';
		$data['title1']='Master Data';
		$data['tempAkun'] = $this->getAkunUser();
		$this->load->view('home/temp/header');
		$this->load->view('home/temp/navbar');
		$this->load->view('home/showAkun',$data);
		$this->load->view('home/temp/footer');
	}
	public function ruleAccess()
	{
		// echo $this->session->userdata('token');
		$data['title']='Akses Rule';
		$data['title1']='Master Data';
		$data['tempRuleAccess'] = $this->getRuleAccess();
		$this->load->view('home/temp/header');
		$this->load->view('home/temp/navbar');
		$this->load->view('home/showRuleAccess',$data);
		$this->load->view('home/temp/footer');
	}
	public function jenisPenyakit()
	{
		// echo $this->session->userdata('token');
		$data['title']='Jenis Penyakit';
		$data['title1']='Master Data';
		$data['tempJenisPenyakit'] = $this->getJenisPenyakit();
		$this->load->view('home/temp/header');
		$this->load->view('home/temp/navbar');
		$this->load->view('home/showJenisPenyakit',$data);
		$this->load->view('home/temp/footer');
	}
	public function dataDaerah()
	{
		// echo $this->session->userdata('token');
		$data['title']='Data Daerah';
		$data['title1']='Master Data';
		$data['tempDataDaerah'] = $this->getDataDaerah();
		$this->load->view('home/temp/header');
		$this->load->view('home/temp/navbar');
		$this->load->view('home/showDataDaerah',$data);
		$this->load->view('home/temp/footer');
	}
	public function jenisPelayanan()
	{
		// echo $this->session->userdata('token');
		$data['title']='Jenis Pelayanan';
		$data['title1']='Master Data';
		$data['tempJenisPelayanan'] = $this->getJenisPelayanan();
		$this->load->view('home/temp/header');
		$this->load->view('home/temp/navbar');
		$this->load->view('home/showJenisPelayanan',$data);
		$this->load->view('home/temp/footer');
	}
	public function pelayananKesehatan()
	{
		// echo $this->session->userdata('token');
		$data['title']='Pelayanan Kesehatan';
		$data['title1']='Master Data';
		$data['tempPelayananKesehatan'] = $this->getPelayananKesehatan();
		$this->load->view('home/temp/header');
		$this->load->view('home/temp/navbar');
		$this->load->view('home/showPelayananKesehatan',$data);
		$this->load->view('home/temp/footer');
	}
	public function sebaranLokasiPelayanan()
	{
		// echo $this->session->userdata('token');
		$data['title']='Lokasi Pelayanan Kesehatan';
		$data['title1']='Display Map';
		$this->load->view('home/temp/header');
		$this->load->view('home/temp/navbar');
		$this->load->view('home/showSebaranLokasiPelayanan',$data);
		$this->load->view('home/temp/footer');
	}
	public function sebaranPenyakit()
	{
		// echo $this->session->userdata('token');
		$data['title']='Sebaran Penyakit';
		$data['title1']='Display Map';
		$this->load->view('home/temp/header');
		$this->load->view('home/temp/navbar');
		$this->load->view('home/showSebaranPenyakit',$data);
		$this->load->view('home/temp/footer');
	}
	public function addSebaranPenyakit()
	{
		// echo $this->session->userdata('token');
		$data['title']='Tambah Data';
		$data['title1']='Sebaran Penyakit';
		$this->load->view('home/temp/header');
		$this->load->view('home/temp/navbar');
		$this->load->view('home/addSebaranPenyakit',$data);
		$this->load->view('home/temp/footer');
	}

	public function showSebaran()
	{
		// echo $this->session->userdata('token');
		$data['title']='List Data';
		$data['title1']='Sebaran Penyakit';
		$data['tempPelayananKesehatan'] = $this->getPelayananKesehatan();
		$this->load->view('home/temp/header');
		$this->load->view('home/temp/navbar');
		$this->load->view('home/showSebaran',$data);
		$this->load->view('home/temp/footer');
	}

	public function showSebaranReport()
	{
		// echo $this->session->userdata('token');
		$data['title']='List Data Report';
		$data['title1']='Sebaran Penyakit';
		$this->load->view('home/temp/header');
		$this->load->view('home/temp/navbar');
		$this->load->view('home/showSebaranReport',$data);
		$this->load->view('home/temp/footer');
	}
		//get all data

	public function getAkunUser()
	{
		$data = $this->db->query('SELECT * FROM tbl_user as a INNER JOIN tbl_rule_access as b ON a.idRuleAccess=b.idRuleAccess INNER JOIN tbl_pelayanan_kesehatan as c ON a.idPelayananKesehatan = c.idPelayanan')->result_array();
		
		return $data;
	}
	public function getRuleAccess()
	{
		$data = $this->db->query('SELECT * FROM tbl_rule_access')->result_array();
		return $data;
	}
	public function getJenisPenyakit()
	{
		$data = $this->db->query('SELECT * FROM tbl_jenis_penyakit')->result_array();
		return $data;
	}
	public function getDataDaerah()
	{
		$data = $this->db->query('SELECT * FROM tbl_daerah')->result_array();
		return $data;
	}
	public function getJenisPelayanan()
	{
		$data = $this->db->query('SELECT * FROM tbl_jenis_pelayanan')->result_array();
		return $data;
	}
	public function getPelayananKesehatan()
	{
		$data = $this->db->query('SELECT * FROM tbl_pelayanan_kesehatan as a INNER JOIN tbl_jenis_pelayanan as b ON a.idJenisPelayanan = b.idJenisPelayanan INNER JOIN tbl_daerah as c ON a.idDaerah = c.idDaerah')->result_array();
		return $data;
	}




	//get data JSON
	public function getJenisPelayananJSON()
	{
		$data = $this->db->query('SELECT * FROM tbl_jenis_pelayanan')->result_array();
		echo json_encode($data);
	}
	public function getPelayananKesehatanJSON()
	{
		$data = $this->db->query('SELECT * FROM tbl_pelayanan_kesehatan as a INNER JOIN tbl_jenis_pelayanan as b ON a.idJenisPelayanan = b.idJenisPelayanan INNER JOIN tbl_daerah as c ON a.idDaerah = c.idDaerah')->result_array();
		echo json_encode($data);
	}
	public function getDaerahJSON()
	{
		$data = $this->db->query('SELECT * FROM tbl_daerah')->result_array();
		echo json_encode($data);
	}
	public function getJenisPenyakitJSON()
	{
		$data = $this->db->query('SELECT * FROM tbl_jenis_penyakit')->result_array();
		echo json_encode($data);
	}
	public function getAkunLoginJSON()
	{
		$idUser = $this->session->userdata('idUser');
		$cek = $this->db->query("SELECT * FROM tbl_user as a INNER JOIN tbl_pelayanan_kesehatan as b ON a.idPelayananKesehatan = b.idPelayanan WHERE a.idUser='$idUser'")->row_array();
		echo json_encode($cek);
	}
	public function getSebaranJSON()
	{
		$idPelayanan = $this->input->post("idPelayanan");
		if($idPelayanan !== '1') {
			$cek = $this->db->query("SELECT * FROM tbl_sebaran as a INNER JOIN tbl_pelayanan_kesehatan as b ON a.idPelayananKesehatan = b.idPelayanan INNER JOIN tbl_jenis_penyakit as c on a.idJenisPenyakit = c.idJenisPenyakit  WHERE a.idPelayananKesehatan='$idPelayanan'")->result_array();
		}else{
			$cek = $this->db->query("SELECT * FROM tbl_sebaran as a INNER JOIN tbl_pelayanan_kesehatan as b ON a.idPelayananKesehatan = b.idPelayanan INNER JOIN tbl_jenis_penyakit as c on a.idJenisPenyakit = c.idJenisPenyakit")->result_array();
		}
		echo json_encode($cek);
	}
	public function getSebaranPenyakitMAPJSON()
	{
		$cek = $this->db->query("SELECT *, SUM(a.totalInput) AS totalPerDaerah, c.namaDaerah, b.lang, b.lat FROM tbl_sebaran AS a INNER JOIN tbl_pelayanan_kesehatan AS b ON a.idPelayananKesehatan = b.idPelayanan INNER JOIN tbl_daerah AS c ON b.idDaerah = c.idDaerah GROUP BY c.idDaerah")->result_array();
		echo json_encode($cek);
	}
	public function getSebaranPenyakitMAPJSONDetail()
	{
		$idSebaran = $this->input->post('idSebaran');
		$cek = $this->db->query("SELECT * FROM tbl_sebaran AS a 
			INNER JOIN tbl_pelayanan_kesehatan AS b ON a.`idPelayananKesehatan` = b.idPelayanan
			INNER JOIN tbl_jenis_penyakit AS d ON a.`idJenisPenyakit` = d.idJenisPenyakit
			INNER JOIN tbl_daerah AS c ON b.idDaerah = c.`idDaerah` WHERE c.`idDaerah`='$idSebaran'")->result_array();
		echo json_encode($cek);
	}

	
	//get data by id

	public function getRuleAccessById(){
		$this->db->where('idRuleAccess',$this->input->post('idRuleAccess'));
		$this->db->from('tbl_rule_access');
		$cek = $this->db->get()->row_array();
		echo json_encode($cek);
	}
	public function getJenisPelayananById(){
		$this->db->where('idJenisPelayanan',$this->input->post('idJenisPelayanan'));
		$this->db->from('tbl_jenis_pelayanan');
		$cek = $this->db->get()->row_array();
		echo json_encode($cek);
	}
	public function getJenisPenyakitById(){
		$this->db->where('idJenisPenyakit',$this->input->post('idJenisPenyakit'));
		$this->db->from('tbl_jenis_penyakit');
		$cek = $this->db->get()->row_array();
		echo json_encode($cek);
	}
	public function getDataDaerahById(){
		$this->db->where('idDaerah',$this->input->post('idDaerah'));
		$this->db->from('tbl_daerah');
		$cek = $this->db->get()->row_array();
		echo json_encode($cek);
	}
	public function getPelayananById(){
		$this->db->where('idPelayanan',$this->input->post('idPelayanan'));
		$this->db->from('tbl_pelayanan_kesehatan');
		$cek = $this->db->get()->row_array();
		echo json_encode($cek);
	}
	public function getSebaranById(){
		$this->db->where('idSebaran',$this->input->post('idSebaran'));
		$this->db->from('tbl_sebaran');
		$cek = $this->db->get()->row_array();
		echo json_encode($cek);
	}
	
	


	//delete data
	public function hapusUser(){
		$idUser = $this->input->post('idUser');
		if ($idUser !== null){
			$this->db->delete('tbl_user', array('idUser' => $idUser));
			$result = [
				'msg' => 'berhasil'
			];
		}else{
			$result = [
				'msg' => 'Gagal Hapus'
			];

		}
		echo json_encode($result);
	}
	public function hapusRuleAccess(){
		$idRuleAccess = $this->input->post('idRuleAccess');
		if ($idRuleAccess !== null){
			$this->db->delete('tbl_rule_access', array('idRuleAccess' => $idRuleAccess));
			$result = [
				'msg' => 'berhasil'
			];
		}else{
			$result = [
				'msg' => 'Gagal Hapus'
			];

		}
		echo json_encode($result);
	}
	public function hapusJenisPenyakit(){
		$idJenisPenyakit = $this->input->post('idJenisPenyakit');
		if ($idJenisPenyakit !== null){
			$this->db->delete('tbl_jenis_penyakit', array('idJenisPenyakit' => $idJenisPenyakit));
			$result = [
				'msg' => 'berhasil'
			];
		}else{
			$result = [
				'msg' => 'Gagal Hapus'
			];

		}
		echo json_encode($result);
	}
	public function hapusDataDaerah(){
		$idDaerah = $this->input->post('idDaerah');
		if ($idDaerah !== null){
			$this->db->delete('tbl_daerah', array('idDaerah' => $idDaerah));
			$result = [
				'msg' => 'berhasil'
			];
		}else{
			$result = [
				'msg' => 'Gagal Hapus'
			];

		}
		echo json_encode($result);
	}
	public function hapusJenisPelayanan(){
		$idJenisPelayanan = $this->input->post('idJenisPelayanan');
		if ($idJenisPelayanan !== null){
			$this->db->delete('tbl_jenis_pelayanan', array('idJenisPelayanan' => $idJenisPelayanan));
			$result = [
				'msg' => 'berhasil'
			];
		}else{
			$result = [
				'msg' => 'Gagal Hapus'
			];

		}
		echo json_encode($result);
	}
	public function hapusPelayananKesehatan(){
		$idPelayanan = $this->input->post('idPelayanan');
		if ($idPelayanan !== null){
			$this->db->where('idPelayanan',$idPelayanan);
			$this->db->from('tbl_pelayanan_kesehatan');
			$cek = $this->db->get()->row_array();

			$this->db->where('idPelayananKesehatan',$idPelayanan);
			$this->db->from('tbl_user');
			$cekUser = $this->db->get()->row_array();
			if($cekUser === null){
				unlink("./assets/images/".$cek['photoPelayanan']);
				$this->db->delete('tbl_pelayanan_kesehatan', array('idPelayanan' => $idPelayanan));
				$result = [
					'msg' => 'berhasil'
				];
			}else{
				$result = [
						'msg' => 'Gagal Hapus, Pelayanan sudah ada akun user'
					];
			}
		}else{
				$result = [
					'msg' => 'Gagal Hapus'
				];
		}
		
		echo json_encode($result);

	}
	public function hapusSebaran(){
		$idSebaran = $this->input->post('idSebaran');
		if ($idSebaran !== null){
			$this->db->delete('tbl_sebaran', array('idSebaran' => $idSebaran));
			$result = [
				'msg' => 'berhasil'
			];
		}else{
			$result = [
				'msg' => 'Gagal Hapus'
			];

		}
		echo json_encode($result);
	}



	//add data
	public function daftarRuleAccess()
	{
		$data = [
					'namerule' => $this->input->post('nameRuleDaftar')
	    		];

		$this->db->where('namerule',$this->input->post('nameRuleDaftar'));
		$this->db->from('tbl_rule_access');
		$cek = $this->db->get()->row_array();
		if ($cek === null){
			$this->db->insert('tbl_rule_access',$data);
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'namerule Sudah Terdaftar'
			];
		}
        echo json_encode($result);
	}
	public function daftarJenisPelayanan()
	{
		$data = [
					'namaJenisPelayanan' => $this->input->post('namaJenisPelayananDaftar')
	    		];

		$this->db->where('namaJenisPelayanan',$this->input->post('namaJenisPelayananDaftar'));
		$this->db->from('tbl_jenis_pelayanan');
		$cek = $this->db->get()->row_array();
		if ($cek === null){
			$this->db->insert('tbl_jenis_pelayanan',$data);
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'namerule Sudah Terdaftar'
			];
		}
        echo json_encode($result);
	}
	public function daftarDataDaerah()
	{
		$data = [
					'namaDaerah' => $this->input->post('namaDaerahDaftar')
	    		];

		$this->db->where('namaDaerah',$this->input->post('namaDaerahDaftar'));
		$this->db->from('tbl_daerah');
		$cek = $this->db->get()->row_array();
		if ($cek === null){
			$this->db->insert('tbl_daerah',$data);
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'daerah Sudah Terdaftar'
			];
		}
        echo json_encode($result);
	}
	public function daftarJenisPenyakit()
	{
		$data = [
					'namaPenyakit' => $this->input->post('namaPenyakitDaftar'),
					'keteranganPenyakit' => $this->input->post('keteranganPenyakit'),
					'statusPenyakit' => $this->input->post('statusPenyakit')
	    		];

		$this->db->where('namaPenyakit',$this->input->post('namaPenyakitDaftar'));
		$this->db->from('tbl_jenis_penyakit');
		$cek = $this->db->get()->row_array();
		if ($cek === null){
			$this->db->insert('tbl_jenis_penyakit',$data);
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'namerule Sudah Terdaftar'
			];
		}
        echo json_encode($result);
	}
	public function daftarPelayananKesehatan()
	{
		$data = [
					'idJenisPelayanan' => $this->input->post('idJenisPelayanan'),
					'idDaerah' => $this->input->post('idDaerah'),
					'namaPelayanan' => $this->input->post('namaPelayanan'),
					'lokasiPelayanan' => $this->input->post('lokasiPelayanan'),
					'lang' => $this->input->post('lang'),
					'lat' => $this->input->post('lat'),
					'photoPelayanan' => $this->input->post('photoPelayanan'),
					'keteranganPelayanan' => $this->input->post('keteranganPelayanan'),
					'statusPelayanan' => $this->input->post('statusPelayanan')
	    		];

		$this->db->where('namaPelayanan',$this->input->post('namaPelayanan'));
		$this->db->from('tbl_pelayanan_kesehatan');
		$cek = $this->db->get()->row_array();
		if ($cek === null){
			$this->db->insert('tbl_pelayanan_kesehatan',$data);
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'namaPelayanan Sudah Terdaftar'
			];
		}
        echo json_encode($result);
	}
	public function daftarSebaran()
	{
		$data = [
					'idPelayananKesehatan' => $this->input->post('idPelayananKesehatan'),
					'idJenisPenyakit' => $this->input->post('idJenisPenyakit'),
					'inputDate' => $this->input->post('inputDate'),
					'totalInput' => $this->input->post('totalInput')
	    		];

		$this->db->insert('tbl_sebaran',$data);
    	$result = [
    		'msg'=>'berhasil'
    	];
	
        echo json_encode($result);
	}
	




	///upload
	public function uploadPhotoPelayananKesehatan()
	{
		$config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file')){
            $status = "error";
            $msg = $this->upload->display_errors();
        }
        else{

            $dataupload = $this->upload->data();
            $status = "success";
            $msg = $dataupload['file_name']." berhasil diupload";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg)));
	}





	//edit data

	public function editRuleAccess()
	{
		$data = [
					'namerule' => $this->input->post('nameRuleDaftar')
	    		];
		$this->db->where('idRuleAccess',$this->input->post('idRuleAccess'));
		$cek = $this->db->update('tbl_rule_access',$data);
		if ($cek !== null){
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'ruleAccess Sudah Terdaftar'
			];
		}
        echo json_encode($result);
	}
	public function editJenisPelayanan()
	{
		$data = [
					'namaJenisPelayanan' => $this->input->post('namaJenisPelayananDaftar')
	    		];
		$this->db->where('idJenisPelayanan',$this->input->post('idJenisPelayanan'));
		$cek = $this->db->update('tbl_jenis_pelayanan',$data);
		if ($cek !== null){
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'jenisPelayanan Sudah Terdaftar'
			];
		}
        echo json_encode($result);
	}
	public function editDataDaerah()
	{
		$data = [
					'namaDaerah' => $this->input->post('namaDaerahDaftar')
	    		];
		$this->db->where('idDaerah',$this->input->post('idDaerah'));
		$cek = $this->db->update('tbl_daerah',$data);
		if ($cek !== null){
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'namaDaerah Sudah Terdaftar'
			];
		}
        echo json_encode($result);
	}
	public function editJenisPenyakit()
	{
		$data = [
					'namaPenyakit' => $this->input->post('namaPenyakitDaftar'),
					'keteranganPenyakit' => $this->input->post('keteranganPenyakit'),
					'statusPenyakit' => $this->input->post('statusPenyakit')
	    		];
		$this->db->where('idJenisPenyakit',$this->input->post('idJenisPenyakit'));
		$cek = $this->db->update('tbl_jenis_penyakit',$data);
		if ($cek !== null){
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'jenisPenyakit Sudah Terdaftar'
			];
		}
        echo json_encode($result);
	}
	public function editPelayananKesehatan()
	{
		$this->db->where('idPelayanan',$this->input->post('idPelayanan'));
		$this->db->from('tbl_pelayanan_kesehatan');
		$cekPoto = $this->db->get()->row_array();

		if ($cekPoto['photoPelayanan'] !== $this->input->post('photoPelayanan')){
			unlink("./assets/images/".$cekPoto['photoPelayanan']);
		}
		$data = [
					'idJenisPelayanan' => $this->input->post('idJenisPelayanan'),
					'idDaerah' => $this->input->post('idDaerah'),
					'namaPelayanan' => $this->input->post('namaPelayanan'),
					'lokasiPelayanan' => $this->input->post('lokasiPelayanan'),
					'lang' => $this->input->post('lang'),
					'lat' => $this->input->post('lat'),
					'photoPelayanan' => $this->input->post('photoPelayanan'),
					'keteranganPelayanan' => $this->input->post('keteranganPelayanan'),
					'statusPelayanan' => $this->input->post('statusPelayanan')
	    		];

		$this->db->where('idPelayanan',$this->input->post('idPelayanan'));
		$cek = $this->db->update('tbl_pelayanan_kesehatan',$data);

		if ($cek !== null){
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'pelayananKesehatan Sudah Terdaftar'
			];
		}
        echo json_encode($result);
	}
	public function editSebaran()
	{
		$data = [
					'totalInput' => $this->input->post('totalInput')
				
	    		];
		$this->db->where('idSebaran',$this->input->post('idSebaran'));
		$cek = $this->db->update('tbl_sebaran',$data);
		if ($cek !== null){
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'Sebaran Sudah Terdaftar'
			];
		}
        echo json_encode($result);
	}

	function backupDatabase(){
		$this->load->dbutil();
        $conf = [
            'format' => 'zip',
            'filename' => 'backup_db-'.Date('Y-M-D h:m:s').'.sql'
        ];

        $backup = $this->dbutil->backup($conf);
        $db_name = 'backup_db' . date("d-m-Y_H-i-s") . '.zip';
        $save = APPPATH . 'database_backup/' . $db_name;

        $this->load->helper('file');
        write_file($save, $backup);

        $this->load->helper('download');
        force_download($db_name, $backup);
	}
}
