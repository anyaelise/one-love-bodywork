<?php

class Booking extends CI_Controller {
	
	function Booking() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	
	function create()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Telephone number', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			//$this->load->view('booking_view');
			$this->load-view('main_view', $data);
		}
		else
		{
			$this->load->view('booking_success');
		}
	}
}
