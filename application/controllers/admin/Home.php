<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
		$data["total_barang"]=$this->penjualan_m->total_barang();
		$data["total_pembelian"]=$this->penjualan_m->total_pembelian();
		$data["total_penjualan"]=$this->penjualan_m->total_penjualan();
		$data["total_jual_member"]=$this->penjualan_m->total_jual_member();
		$data['transaksi_pembelian']=$this->penjualan_m->transaksi_pembelian();
		$data['transaksi_penjualan']=$this->penjualan_m->transaksi_penjualan();
		$this->load->view('admin/v_home',$data);
		$this->load->view('admin/templates/footer');
	}



}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */