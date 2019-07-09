<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_blog extends CI_Model {

	public function insert($name, $message)
	{
		$data = array(
			'name' => $name,
			'message' => $message,
        );

		$this->db->insert('blog', $data); 
	}


	public function getAll()
	{
		// $result = $this->db->get('vehicles');
		$this->db->select('*');
        $this->db->from('blog');
        $result = $this->db->get();
		return $result->result_array();
	}


	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('blog');
	}
        
}