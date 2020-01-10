<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

  public function cek_user()
  {
    $this->db->where('user', $this->input->post('username'));
    $this->db->where('pass', md5($this->input->post('password')));
    $q = $this->db->get('users',1);
    $status = '0';
    if ($q->num_rows()>0) {
      $session = array(
        'user_login' => $q->row('user'),
        'password_login' => $q->row('pass'),
      );
      $this->session->set_userdata($session);
      $status = '1';
    }else{
      $status = '0';
    }
    return $status;
  }

}
/* End of file Mlogin.php */
/* Location: ./application/models/Mlogin.php */