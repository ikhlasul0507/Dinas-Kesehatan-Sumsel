<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->view('auth/index');
		if ($this->session->userdata('username') === NULL){
			$dataUserVal = $this->session->userdata('username');
			$this->db->query("UPDATE tbl_user SET tokenCreated = ''");
		}
	}
	public function getPelayanan(){
		$data = $this->db->get_where('tbl_pelayanan_kesehatan',['statusPelayanan' => 1])->result_array();
		echo json_encode($data);
	}

	public function getRuleAccess(){
		$data = $this->db->get('tbl_rule_access')->result_array();
		echo json_encode($data);
	}

	public function getUserById(){
		$this->db->where('idUser',$this->input->post('idUser'));
		$this->db->from('tbl_user');
		$cek = $this->db->get()->row_array();
		echo json_encode($cek);
	}

	public function resetPasswordUser(){
		$this->db->where('idUser',$this->input->post('idUser'));
		$this->db->from('tbl_user');
		$ambil = $this->db->get()->row_array();
		$pass = $ambil['username'];
		$passenkrip = password_hash($pass, PASSWORD_DEFAULT);
		$cek = $this->db->query("UPDATE tbl_user SET password = '$passenkrip' WHERE username='$pass'");
		if ($cek !== null){
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'Reset password gagal'
			];
		}
        echo json_encode($result);
	}
	public function cekData()
	{
	    $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
		$kvc  = substr(str_shuffle($karakter), 0, 8);

	    $this->db->where('username',$this->input->post('username'));
		$this->db->from('tbl_user');
		$cek = $this->db->get()->row_array();
		if ($cek !== null) {
			if($cek['tokenCreated'] === null || $cek['tokenCreated'] === ''){
				if(password_verify($this->input->post('userpassword'), $cek['password'])){
					if($cek['statusUser'] > 0){
					//benar
						$dataSession = [
							'username' => $cek['username'],
							'token' => $kvc,
							'idRuleAccess' => $cek['idRuleAccess']
						];
						$dataUserVal = $cek['username'];
						$this->db->query("UPDATE tbl_user SET tokenCreated = '$kvc' WHERE username='$dataUserVal'");
		        		$this->session->set_userdata($dataSession);
		        		// $this->session->sess_expiration(10000);
						$result = [
							'msg' => 'berhasil'
						];
					}else{
						$result = [
						'msg' => 'Akun Belum Aktif, Hubungi Admin !'
						];
					}
				}else{
					$result = [
						'msg' => 'Username dan password salah !'
					];
				}
			}else{
				$result = [
					'msg' => 'Akun Sedang Login !'
				];
			}
		}else{
			$result = [
					'msg' => 'Akun Tidak Terdaftar !'
				];
		}
		echo json_encode($result);
	}

	public function daftarUser()
	{
		$data = [
					'idRuleAccess' => $this->input->post('idRuleAccess'),
					'idPelayananKesehatan' =>$this->input->post('idPelayanan'),
		            'username'  => $this->input->post('usernameDaftar'), 
		            'email'  => $this->input->post('useremail'),
		            'password'  => password_hash($this->input->post('passwordDaftar'), PASSWORD_DEFAULT),
		            'handphone'  => $this->input->post('mo_number'),
		            'statusUser'  => $this->input->post('statusUser'),
	    		];

		$this->db->where('username',$this->input->post('usernameDaftar'));
		$this->db->from('tbl_user');
		$cek = $this->db->get()->row_array();
		if ($cek === null){
			$this->db->insert('tbl_user',$data);
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'Username Sudah Terdaftar'
			];
		}
        echo json_encode($result);
	}

	public function editUser()
	{
		$data = [
					'idRuleAccess' => $this->input->post('idRuleAccess'),
					'idPelayananKesehatan' =>$this->input->post('idPelayanan'),
		            'username'  => $this->input->post('usernameDaftar'), 
		            'email'  => $this->input->post('useremail'),
		            'password'  => password_hash($this->input->post('passwordDaftar'), PASSWORD_DEFAULT),
		            'handphone'  => $this->input->post('mo_number'),
		            'statusUser'  => $this->input->post('statusUser'),
	    		];
		$this->db->where('username',$this->input->post('usernameDaftar'));
		$cek = $this->db->update('tbl_user',$data);
		if ($cek !== null){
	    	$result = [
	    		'msg'=>'berhasil'
	    	];
		}else{
			$result = [
				'msg' => 'Username Sudah Terdaftar'
			];
		}
        echo json_encode($result);
	}

	public function logout(){
		$dataUserVal = $this->session->userdata('username');
		$this->db->query("UPDATE tbl_user SET tokenCreated = '' WHERE username='$dataUserVal'");
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		$this->index();
	}
}
