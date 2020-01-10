<?php 
	class Stok extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('admin/penjualan_m');



		}
		public function index()
		{
		if ($this->session->userdata('user_login')==null) {
				redirect('dashboard/login');
		}
			$this->load->view('admin/templates/header');
			$data["barang"] = $this->penjualan_m->get_all_barang();
			$data["total_barang"]= $this->penjualan_m->total_barang();
			$this->load->view('admin/v_stok_kendaraan',$data);
			$this->load->view('admin/templates/footer');

		}

		
	}