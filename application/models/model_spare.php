<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_spare extends CI_Model{
    
    function __construct() {
        $this->proTable = 'spare';
        $this->custTable = 'customeers';
        $this->ordTable = 'orders';
        $this->ordItemsTable = 'order_items';
    }
    
    /*
     * Fetch products data from the database
     * @param id returns a single record if specified, otherwise all records
     */
    public function insert($quantity,$image,$name,$description,$price,$created,$modified,$status)
    {
        $data = array(
            'quantity'=>$quantity,
            'image' => $image,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'created'=>$created,
            'modified' => $modified,
            'status' => $status,
        );

        $this->db->insert('spare', $data); 
    }
    public function customerList()
    {
        $this->db->select('c.name, c.email, c.phone, c.address');
        $this->db->from($this->ordTable.' as o');
        $this->db->join($this->custTable.' as c', 'c.id = o.customeer_id', 'left');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        // Get order items
        $this->db->select('p.image, p.name, p.price');
        $this->db->from($this->ordItemsTable.' as i');
        $this->db->join($this->proTable.' as p', 'p.id = i.product_id', 'left');
        $this->db->where('i.order_id', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
        // Return fetched data
        return !empty($result)?$result:false;
    }
    
    public function getRows($id = ''){
        $this->db->select($this->proTable.'.*, SUM(order_items.quantity) as sold');

        $this->db->from($this->proTable);
        $this->db->join('order_items', 'order_items.product_id = '.$this->proTable.'.id', 'left');

        $this->db->where('status', '1');
        if($id){
            $this->db->where($this->proTable.'.id', $id);
            $this->db->group_by($this->proTable.'.id');
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('name', 'asc');
            $this->db->group_by($this->proTable.'.id');
            $query = $this->db->get();
            $result = $query->result_array();
        }        
        // Return fetched data
        return !empty($result)?$result:false;
    }
    
    /*
     * Fetch order data from the database
     * @param id returns a single record of the specified ID
     */
    public function getOrder($id){
        $this->db->select('o.*, c.name, c.email, c.phone, c.address');
        $this->db->from($this->ordTable.' as o');
        $this->db->join($this->custTable.' as c', 'c.id = o.customeer_id', 'left');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        // Get order items
        $this->db->select('i.*, p.image, p.name, p.price');
        $this->db->from($this->ordItemsTable.' as i');
        $this->db->join($this->proTable.' as p', 'p.id = i.product_id', 'left');
        $this->db->where('i.order_id', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
        // Return fetched data
        return !empty($result)?$result:false;
    }

    
    /*
     * Insert customer data in the database
     * @param data array
     */
    public function insertCustomeers($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // Insert customer data
        $insert = $this->db->insert($this->custTable, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Insert order data in the database
     * @param data array
     */
    public function insertOrder($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // Insert order data
        $insert = $this->db->insert($this->ordTable, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Insert order items data in the database
     * @param data array
     */
    public function insertOrderItems($data = array()) {
        
        // Insert order items
        $insert = $this->db->insert_batch($this->ordItemsTable, $data);

        // Return the status
        return $insert?true:false;
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('spare');
    }
}