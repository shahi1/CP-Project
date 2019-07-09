<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compare extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        $this->load->model('model_vehicle');
    }
    
    function index(){
        $data = array();
        
        // Fetch products from the database
        $data['vehicles'] = $this->model_vehicle->getAll();
        
        // Load the product list view
        $this->load->view('compare', $data);
        $this->load->view('public/partials/view_public_footer');

    }

    
}