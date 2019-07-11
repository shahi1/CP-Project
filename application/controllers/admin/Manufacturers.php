<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manufacturers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if ( ! $this->session->userdata('isLogin') || $this->session->userdata('type')!="admin") { 
            redirect('controller_login');
        }
		
		$this->load->database();
		$this->load->model('model_manufacturer');
	}


	public function index()
	{	
	    $data['manufacturers'] = $this->model_manufacturer->getAllManufacturers();
	    $this->parser->parse('admin/view_manufacturers', $data);
	}

	public function addManufacturer()
	{	
		if(! $this->input->post('submit')) {
			redirect(base_url() . 'admin/manufacturers');
		}
		else {

			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_width']    = '2048';
            $config['max_height']   = '2048';
            $this->load->library('upload', $config);

		    $manufacturer_name = $this->input->post('manufacturer_name');
		    
		    $this->upload->do_upload('manufacturer_logo');
            $data = $this->upload->data('manufacturer_logo');
            $manufacturer_logo= $data['file_name']; 

		    $this->session->set_flashdata('message','Manufacturer Successfully Created.');
			$this->model_manufacturer->insertManufacturer($manufacturer_name,$manufacturer_logo);
			redirect(base_url() . 'admin/manufacturers');
		}
	}

	public function deleteManufacturer($cid)
	{	
        $this->model_manufacturer->deleteManufacturer($cid);
        $this->session->set_flashdata('message','Manufacturer Successfully Deleted.');
        redirect(base_url('admin/manufacturers'));
	}
}