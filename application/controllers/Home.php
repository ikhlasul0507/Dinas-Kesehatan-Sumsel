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
		// echo $this->session->userdata('token');
		$this->load->view('home/temp/header');
		$this->load->view('home/temp/navbar');
		$this->load->view('home/index');
		$this->load->view('home/temp/footer');
	}

	public function showAkun()
	{
		// echo $this->session->userdata('token');
		$data['title']='Akun User';
		$data['title1']='Master Data';
		$data['tempAkun'] = $this->getAkunUser();
		$this->load->view('home/temp/header');
		$this->load->view('home/temp/navbar');
		$this->load->view('home/showAkun',$data);
		$this->load->view('home/temp/footer');
	}

	public function getAkunUser()
	{
		$data = $this->db->query('SELECT * FROM tbl_user as a INNER JOIN tbl_rule_access as b ON a.idRuleAccess=b.idRuleAccess INNER JOIN tbl_pelayanan_kesehatan as c ON a.idPelayananKesehatan = c.idPelayanan')->result_array();
		
		return $data;
	}

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
}
