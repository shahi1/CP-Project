<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        if ( ! $this->session->userdata('isLogin') ) { 
            redirect('login');
        }
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('product');
    }
    
    function index(){
      $data = array();
        
        // Fetch products from the database
        $data['products'] = $this->product->getRows();
        // Load the product list view
        $this->load->view('admin/products/products', $data);
        $this->load->view('admin/partials/admin_footer');

    }
    
    function addToCart($proID){
     
        // Fetch specific product by ID
        $product = $this->product->getRows($proID);
        
        // Add product to the cart
        $data = array(
            'id'    => $product['id'],
            'qty'    => 1,
            'price'    => $product['price'],
            'name'    => $product['name'],
            'image' => $product['image']
        );
        $this->cart->insert($data);
        
        // Redirect to the cart page
        redirect('admin/cart/');
    }

    public function add()
    {   
        if($this->input->post('buttonSubmit')) {
            $data['message'] = '';
        
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');
                $this->form_validation->set_rules('quantity', 'Quantity', 'required');
                $this->form_validation->set_rules('price', 'Price ', 'required');
                $this->form_validation->set_rules('created', 'Created', 'required');
                $this->form_validation->set_rules('modified', 'Modified', 'required');
                 $this->form_validation->set_rules('hand', 'Hand', 'required');

                if($this->form_validation->run() == FALSE)
                {
                    //$data['vRow'] = $this->model_vehicle->get($cid);
                    $this->load->view('admin/products/products');
                }
                else{

                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_width']    = '2048';
                    $config['max_height']   = '2048';
                    $this->load->library('upload', $config);
                    
                    
                    $name = $this->input->post('name');
                    $description= $this->input->post('description');
                    $quantity= $this->input->post('quantity');
                    $price = $this->input->post('price');
                    $created=$this->input->post('created');
                    $modified = $this->input->post('modified');
                    $status = 1;
                    $hand=$this->input->post('hand');
                    
                    $this->upload->do_upload('image');
                    $data = $this->upload->data('image');
                    $image= $data['file_name']; 
                    
                    $this->product->insert($quantity,$image,$name,$description,$price,$created,$modified,$status,$hand);

                    $this->session->set_flashdata('message','Vehicle parts Successfully Created.');
                    redirect(base_url('admin/products'));
                
                }
        }
        else{
        redirect(base_url('admin/products'));
        }
    }

    public function DeleteProducts()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST'){  
             
            $id = $this->input->post('id');
            $this->product->delete($id);
            $this->session->set_flashdata('message','Products Sucessfully deleted.');
            redirect(base_url('admin/products'));
        }
        else {
            redirect(base_url('admin/products'));
        }
    }
}