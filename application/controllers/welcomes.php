<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcomes extends CI_Controller {
  public function index()
  {
    $this->load->view('welcomes/index');
  }

  public function validate() {
  	$this->load->library('form_validation');
  	if($this->input->post('reg') == 'yes') {
	  	$this->form_validation->set_rules('name', 'Name', 'trim|required|alpha');
	  	$this->form_validation->set_rules('alias', 'Alias', 'trim|required');
	  	$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]|valid_email');
	  	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
	  	$this->form_validation->set_rules('confirm_pass', 'Confirm PW', 'trim|required|matches[password]');
	  	if($this->form_validation->run() === FALSE) {
	  		$this->view_data['errors'][] = validation_errors();
	  		$this->session->set_flashdata('errors', $this->view_data['errors']);
	  		// var_dump($this->view_data['errors']);
	  		redirect('/');
	  	} else {
	  		$this->session->set_flashdata('user', $this->input->post());
	  		redirect('/welcomes/register');
	  	}
	} else {
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	  	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
	  	if($this->form_validation->run() === FALSE) {
	  		$this->view_data['errors'][] = validation_errors();
	  		$this->session->set_flashdata('log_errors', $this->view_data['errors']);
	  		redirect('/');
	  	} else {
	  		$this->session->set_flashdata('user_login', $this->input->post());
	  		redirect('/welcomes/login');
	  	}
	}
  }

  public function register() {
  	$this->load->model('Welcome');
  	$user = $this->session->flashdata('user');
  	$this->Welcome->create($user);
  	$this->session->set_flashdata('user', $user);
  	redirect('/welcomes/books');
  }

  public function login() {
  	$this->load->model('Welcome');
  	$user = $this->session->flashdata('user_login');
  	if(!empty($this->Welcome->user_by_email($user['email']))) {
  		$db_user = $this->Welcome->user_by_email($user['email']);
  		if($user['password'] !== $db_user['password']) {
  			$this->session->set_flashdata('log_errors', array('db_no' => 'Incorrect username or password'));
  			redirect('/');
  		} else {
  			$this->session->set_flashdata('user', $db_user);
  			$this->session->set_userdata('user_id', $db_user['id']);
  			redirect('/welcomes/books');
  		}
  	} else {
  		$this->session->set_flashdata('log_errors', array('db_no' => 'Incorrect username or password'));
  		redirect('/');
  	}
  }

  public function books() {
  	$user = $this->session->flashdata('user');
  	var_dump($user);
  	die();
  	$this->load->view('books', $user);
  }
}

//end of main controller
