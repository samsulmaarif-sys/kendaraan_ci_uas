<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
  }

  public function index()
  {
    if ($this->session->userdata('user_login')==null) {
      redirect('dashboard/login');
    }
    $this->load->view('dashboard');
  }

  public function login()
  {
    $this->load->view('v_login');
  }

  public function proses_login()
  {
    $this->load->model('mlogin');
    $cek = $this->mlogin->cek_user();
    if ($cek=='1') {
      redirect('admin/home');
    }else{
      echo "username atau password tidak cocok";
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('dashboard','refresh');
  }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */