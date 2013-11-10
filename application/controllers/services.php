<?php

class Services extends CI_Controller {
	
	function Services() {
		parent::__construct();
		$this->load->helper('url');
	}
	
	function index() {		
		$data['title'] = "List of Services";
		$data['menu'] = $this->db->get('olb_pages');
		$this->load->view('main_view', $data);
	}	
	
}
