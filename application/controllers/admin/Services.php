<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if ( ! $this->session->userdata('isLogin')) { 
            redirect('login');
        }
		
		$this->load->model('model_service');
	}

	public function index()
	{
        $data['udata']=$this->session->userdata;
        $data['services'] = $this->model_service->getAll();
        
        //$this->load->view('view_vehicle', $data); 
        $this->parser->parse('admin/view_service', $data);   
    }

  
	public function add()
	{	
		if($this->input->post('buttonSubmit')) {
			$data['message'] = '';
		
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('category', 'Category ', 'required');
				$this->form_validation->set_rules('from', 'From', 'required');
                $this->form_validation->set_rules('timing', 'Timing', 'required');
				if($this->form_validation->run() == FALSE)
				{
					//$data['vRow'] = $this->model_vehicle->get($cid);
                    $this->load->view('admin/view_service');
				}
				else{
                      
            $email = $this->input->post('email');
		    $name = $this->input->post('name');
            $category = $this->input->post('category');
            $from = $this->input->post('from');
        
            $timing = $this->input->post('timing');

			
            $this->model_service->insert($email, $name, $category,$from,$timing);
			$this->session->set_flashdata('message','Servicing request Created.');
			redirect(base_url('admin/services'));
		
			}
		}
		else{
		redirect(base_url('admin/services'));
		}
	} 
}

