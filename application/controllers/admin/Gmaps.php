<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if ( ! $this->session->userdata('isLogin')) { 
            redirect('login');
        }

	}


    public function index(){
    	$this->load->library('googlemaps');
    	$config['zoom']=auto;
    	$this->googlemaps->initialize($config);

    	$marker=array();
    	$marker['position']='37.492, -122.1419';
    	$this->googlemaps->add_marker($marker);
    	
    	$data['map']=$this->googlemaps->create_map();

    	$this->load->view('admin/view_service', $data);
    }
  
}

