<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/penjualan_m');
	}

		public function index()
		{
			if ($this->session->userdata('user_login')==null)
			{
				redirect('dashboard/login');
   		 	}
   			 $this->load->view('admin/templates/header');
			$data["pembelian"]= $this->penjualan_m->get_all_pembelian();
			$data["total_pembelian"]= $this->penjualan_m->total_pembelian();
			$this->load->view('admin/v_pembelian_kendaraan',$data);
			$this->load->view('admin/templates/footer');
  		}

  		public function tambah()
  		{
    		$data = array('judul' => 'Tambah Data');
    		$this->load->view('admin/templates/header');
    		$data["barang"] = $this->penjualan_m->get_all_barang();
			$data["total_barang"]= $this->penjualan_m->total_barang();
    		$this->load->view('admin/v_stok_kendaraan', $data);
    		$this->load->view('admin/templates/footer');
  		}

  		public function simpan()
		  {
		    $data = array(
		      'id' => ''
		      , 'kd_kendaraan' => $this->input->post('kd_kendaraan')
		      , 'jml_pembelian' => $this->input->post('jml')
		      , 'tanggal_beli' => $this->input->post('tanggal')
		    );
		    $this->penjualan_m->simpan_data_pembelian($data);
		  }

		public function hapus()
		  {
		    $data["kd_kendaraan"]= $this->penjualan_m->hapus_data_pembelian();
		  }

  		


}
/* End of file Pembelian.php */
/* Location: ./application/controllers/admin/Pembelian.php */