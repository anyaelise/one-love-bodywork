<?php

class Service extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	function get_desc($name) {
		$this->db->select('description');
		$this->db->distinct();
		$this->db->where('name', $name); 
		$query = $this->db->get('olb_services'); 
		$result = $query->row();
		
		return $result->description;
	}
	
	function get_rates($name) {
		$rates = array(); 
		$this->db->select('length, rate');
		$this->db->where('name', $name);
		$this->db->where('name', $name);
		$query = $this->db->get('olb_services'); 
		
		foreach ($query->result() as $row) {
			$rates[$row->length] = $row->rate;
		}
		return $rates;
	}
	
	function get_type($name) {
		$this->db->select('type');
		$this->db->distinct();
		$this->db->where('name', $name); 
		$query = $this->db->get('olb_services'); 
		$result = $query->row();
		
		return $result->type;
	}
}
