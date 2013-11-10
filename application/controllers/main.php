<?php

class Main extends CI_Controller {
	
	function Main() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	function index($page_id) {
		if(isset($page_id)) {
			 $data['page_id'] = $page_id;
		}
		else {
			$data['page_id'] = 'about';
		}
		$this->db->where('id >', 1);
		$data['menu'] = $this->db->get('olb_pages');
		$this->load->view('main_view', $data);
	}
	
	function services() {
		$data['title'] = "List of Services";
		$this->load->model('Service');
		$data['services'] = array();
		$data['descs'] = array();
		$data['rates'] = array();
		
		$this->db->select('name, priority');
		$this->db->distinct();
		$query = $this->db->get('olb_services');
		foreach($query->result() as $row) {
			$data['services'][$row->name] = $row->priority;
			$data['descs'][$row->name] = $this->Service->get_desc($row->name);
			$data['rates'][$row->name] = $this->Service->get_rates($row->name);
			$data['types'][$row->name] = $this->Service->get_type($row->name);
		}
		
		$this->load->view('services_view', $data);
	}
	
	function booking($status) { 
		$data['title'] = "Make A Reservation";
		$this->db->where('id >', 1);
		$data['menu'] = $this->db->get('olb_pages');	
		$this->db->order_by('name');	
		$data['services'] = $this->db->get('olb_services');
		
		$this->db->group_by('name');
		$data['aromatherapy'] = $this->db->get('olb_aromatherapy');
		
		$this->db->group_by('name');
		$data['music'] = $this->db->get('olb_music');
		
		$this->db->group_by('name');
		$data['draping'] = $this->db->get('olb_draping');
		
		$data['errors'] = 0;
		
		if(isset($status)) {
			if($status == "create") {
				$postarray["postdata"] = array();
				foreach($_POST as $key=>$val) {
					$postarray["postdata"][$key] = $val;
				}
				$this->session->set_userdata($postarray);
				$data['page_id'] = "booking/validate";
				$this->load->view('main_view', $data);				 
			}
			else if($status == "validate") {
				$_POST = $this->session->userdata('postdata');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
				$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('phone', 'Telephone number', 'trim|required');
				$this->form_validation->set_rules('date', 'Date', 'required');
				$this->form_validation->set_rules('time', 'Time Window', 'trim|required');
				$this->form_validation->set_rules('location', 'Location', 'required');
				$this->form_validation->set_rules('type', 'Type of Service', 'required');
				$this->form_validation->set_rules('payment', 'Method of Payment', 'required');
				$this->form_validation->set_rules('allergies', 'Allergy Considerations', 'required');
				$this->form_validation->set_error_delimiters('<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>', '</p>');
				if ($this->form_validation->run() == FALSE) {
					$data['errors'] = 1;
					$this->load->view('booking_view', $data);
				}
				else {
					$this->load->view('booking_success', $this->session->userdata('postdata'));
				}
			}
		}
		else {
			$this->load->view('booking_view', $data);
		}
	}
	
	function about() {
		$data['menu'] = $this->db->get('olb_pages');
		$this->load->view('about_view', $data);
	}
	
	function contact() {
		$this->load->view('contact_view');
	}
}