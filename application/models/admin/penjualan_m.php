<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_m extends CI_Model {
 	//tampil data
		public function get_all_barang(){

			return $this->db->get('stok_kendaraan')->result();
		}

		public function total_barang(){
			$query = $this->db->query("SELECT stok_kendaraan.stok, SUM(stok) as total FROM stok_kendaraan");


			return $query->result();
		}

		public function get_all_pembelian()
		{
			$this->db->select('*');
			$this->db->from('pembelian_kendaraan');
			$this->db->join('stok_kendaraan','stok_kendaraan.kd_kendaraan = pembelian_kendaraan.kd_kendaraan');
			return $this->db->get()->result();
		}
		public function total_pembelian(){
			$query = $this->db->query("SELECT pembelian_kendaraan.jml_pembelian, SUM(jml_pembelian) as total FROM pembelian_kendaraan");


			return $query->result();
		}

		public function hapus_data_pembelian()
		{	
			$kd_kendaraan = $this->uri->segment(3);
		    $pmb = $this->db->where('kd_kendaraan',$kd_kendaraan)->delete('pembelian_kendaraan');
		    if ($pmb) {
		      redirect('admin/pembelian');
		    }
		}

		public function simpan_data_pembelian($data)
		{
		    $q = $this->db->insert('pembelian_kendaraan', $data);
		    if ($q) {
		      redirect('admin/pembelian/tambah');
		    }else{
		      redirect('admin/pembelian/tambah');
		    }
		}

		public function simpan_data_penjualan($data)
		{
		    $q = $this->db->insert('penjualan_kendaraan', $data);
		    if ($q) {
		      redirect('admin/penjualan/tambah');
		    }else{
		      redirect('admin/penjualan/tambah');
		    }
		}

		public function transaksi_pembelian(){
        // menjalankan stored procedure tampil_penerbit()
        $sql_query=$this->db->query("call transaksi_pembelian()");                     
        mysqli_next_result( $this->db->conn_id);
            if($sql_query->num_rows()>0){
                return $sql_query->result_array();
            }
    	}

	    public function transaksi_penjualan(){
	        // menjalankan stored procedure tampil_penerbit()
	        $sql_query=$this->db->query("call transaksi_penjualan()");                     
	        mysqli_next_result( $this->db->conn_id);
	            if($sql_query->num_rows()>0){
	                return $sql_query->result_array();
	            }
	    }

		public function get_all_penjualan()
		{
			$this->db->select('*');
			$this->db->from('penjualan_kendaraan');
			$this->db->join('stok_kendaraan','stok_kendaraan.kd_kendaraan = penjualan_kendaraan.kd_kendaraan');
			return $this->db->get()->result();

		}


		public function total_penjualan(){
			$query = $this->db->query("SELECT penjualan_kendaraan.jml_penjualan, SUM(jml_penjualan) as total FROM penjualan_kendaraan");
			return $query->result();
		}

		public function diskon_pembayaran(){
	        // menjalankan stored procedure tampil_penerbit()
	        $sql_query=$this->db->query("call diskon_pembayaran()");                     
	        mysqli_next_result( $this->db->conn_id);
	            if($sql_query->num_rows()>0){
	                return $sql_query->result_array();
	            }
	    }

		public function total_jual_member(){
			$query = $this->db->query("SELECT penjualan_kendaraan.nama_pembeli, count(nama_pembeli) as total FROM penjualan_kendaraan");


			return $query->result();
		}

	// 	public function total_bayar (){
	// 	$query = $this->db->query("SELECT id, kd_kendaraan, jml_penjualan, harga_jual, tanggal_jual, nama_pembeli, alamat, no_ktp, pekerjaan, status ,harga_jual*jml_penjualan AS total FROM penjualan_kendaraan");
	// 	return $query->result();
	// }
}