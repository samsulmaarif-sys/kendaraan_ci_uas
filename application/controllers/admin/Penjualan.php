<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

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
		$data["penjualan"]=$this->penjualan_m->get_all_penjualan();
		$data["total"]=$this->penjualan_m->total_penjualan();
		$data["diskon_pembayaran"]=$this->penjualan_m->diskon_pembayaran();
		$this->load->view('admin/v_penjualan_kendaraan',$data);
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
		     , 'jml_penjualan' => $this->input->post('jml')
		     , 'nama_pembeli' => $this->input->post('nama')
		     , 'alamat' => $this->input->post('alamat')
		     , 'harga_jual' => $this->input->post('harga')
		     , 'no_ktp' => $this->input->post('no_ktp')
		     , 'pekerjaan' => $this->input->post('pekerjaan')
		     , 'tanggal_jual' => $this->input->post('tanggal_jual')
		     , 'status' => $this->input->post('status')
		);
		$this->penjualan_m->simpan_data_penjualan($data);
	}

}
