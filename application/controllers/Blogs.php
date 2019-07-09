<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_blog');

	}

	public function index()
	{
        $data['blogs'] = $this->model_blog->getAll();
        
        //$this->load->view('view_vehicle', $data); 
        $this->parser->parse('view_blog', $data);  
    }


	public function add()
	{	
		if($this->input->post('buttonSubmit')) {
			$data['message'] = '';
		
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('message', 'Message', 'required');
				if($this->form_validation->run() == FALSE)
				{
					//$data['vRow'] = $this->model_vehicle->get($cid);
                    $this->load->view('view_blog');
				}
				else{            
            $name = $this->input->post('name');
		    $message = $this->input->post('message'); 

            $this->model_blog->insert($name, $message);
			$this->session->set_flashdata('message','Comment Successfully Created.');
			redirect(base_url('blogs'));
		
			}
		}
		else{
		redirect(base_url('blogs'));
		}
	}
}

