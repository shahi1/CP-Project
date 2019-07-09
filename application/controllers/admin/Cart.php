<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        if ( ! $this->session->userdata('isLogin')) { 
            redirect('controller_login');
        }
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('product');
    }
    
    function index(){
        $data = array();
        
        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();
        
        // Load the cart view
        $this->load->view('admin/cart/cart', $data);
        $this->load->view('admin/partials/admin_footer');
    }
    
    function updateItemQty(){
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        echo $update?'ok':'err';
    }
    
}