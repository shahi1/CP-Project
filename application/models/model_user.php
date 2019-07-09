<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_user extends CI_Model {

	public function insert($u_email,$f_name,$l_name,$u_bday,$u_position,$u_type,$u_pass,$u_mobile,$u_gender,$u_address)
	{
		$data = array(
			   'email' => $u_email,
               'first_name' => $f_name,
               'last_name' => $l_name,
               'birthday' => $u_bday,
			   'position' => $u_position,
			   'type' => $u_type,
			   'password' => $u_pass,
			   'mobile' => $u_mobile,
			   'gender' => $u_gender,
			   'address' => $u_address
            );
		$this->db->insert('users', $data); 
	}


}