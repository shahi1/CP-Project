<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_service extends CI_Model {

    public function insert($email, $name, $category,$from,$timing)
    {
        $data = array(
            'email' => $email,
            'name' => $name,
            'category' => $category,
            'from' => $from,
            'timing' => $timing
        );

        $this->db->insert('service', $data); 
    }


    public function getAll()
    {
        // $result = $this->db->get('vehicles');
        $this->db->select('*');
        $this->db->from('service');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getById($id)
    {
        // $result = $this->db->get('vehicles');
        $this->db->select('*');
        $this->db->from('vehicles');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->db->where('vehicle_id', $vehicle_id);
        $this->db->limit(1);
        $result = $this->db->get();
        return $result->result_array();
    }
        
    public function customerList()
    {
        $this->db->select('*');
                $this->db->from('customer');
                $this->db->join('vehicles', 'customer.vehicle_id = vehicles.vehicle_id','inner');
                $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
                $this->db->join('models', 'models.id = vehicles.model_id', 'inner');

                $result = $this->db->get();
                //echo $this->db->last_query();
        return $result->result_array();
    }
        
    public function get($v_id)
    {
        $this->db->where('vehicle_id', $v_id);
        $result = $this->db->get('service');
        return $result->row_array();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('service');
    }
}