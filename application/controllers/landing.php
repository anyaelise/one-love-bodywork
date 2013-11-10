<?php

class Landing extends CI_Controller {
	function Landing() {
		parent::__construct();
		$this->load->helper('url');
	}
	
	function index() 
	{
		$this->db->where('id >', 1);
		$data['query'] = $this->db->get('olb_pages');
		echo $this->load->view('landing_view', $data);
	}
}

?>