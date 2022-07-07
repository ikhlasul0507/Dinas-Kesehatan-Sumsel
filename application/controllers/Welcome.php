<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$this->load->view('welcome_message');
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
}
