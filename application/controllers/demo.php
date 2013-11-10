<?php

class Demo extends CI_Controller {
	
	function Demo() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	function index() {
		$data['query'] = $this->db->get('pages');
		$this->load->view('demo_view', $data);
	}
}
