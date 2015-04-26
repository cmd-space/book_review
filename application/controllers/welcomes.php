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
  	$this->session->set_userdata('user', $this->Welcome->user_by_email($user['email']));
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
  			$this->session->set_userdata('user', $db_user);
  			redirect('/welcomes/books');
  		}
  	} else {
  		$this->session->set_flashdata('log_errors', array('db_no' => 'Incorrect username or password'));
  		redirect('/');
  	}
  }

  public function books() {
  	$user = $this->session->userdata('user');
  	$this->load->view('books', $user);
  }

  public function destroy() {
  	$this->session->sess_destroy();
  	redirect('/');
  }

  public function add() {
  	$this->output->enable_profiler(TRUE);
  	$this->load->model('Welcome');
  	$author_array = $this->Welcome->get_authors();
  	$authors['author'] = $author_array;
  	$authors['errors'] = $this->session->flashdata('errors');
  	$this->load->view('add', $authors);
  }

  public function add_review() {
  	$this->load->library('form_validation');
  	$this->form_validation->set_rules('title', 'Title', 'trim|required');
  	if($this->form_validation->run() === FALSE) {
  		$this->session->set_flashdata('errors', 'Please enter a title');
  		redirect('/welcomes/add');
  	} else {
	  	$this->load->model('Welcome');
	  	$review['review'] = $this->input->post('review');
	  	$review['stars'] = $htis->input->post('stars');
	  	if($this->input->post('author') === '') {
	  		$review['author'] = $this->input->post('add_author');
	  	}
	  	// This should come after figuring out whether or not the book already exists
	  	// $this->Welcome->add_review($review);
	  	$book['title'] = $this->input->post('title');
	  	$book['author'] = $this->input->post('author');
	  	$this->Welcome->add_book($book);
	  	$this->load->view('book')
	}
  }

  public function book($id) {
  	$this->load->model('Welcome');
  	$book = $this->Welcome->book_page($id);
  	var_dump($book);
  	die();
  	$this->load->view('book', $book);
  }
}

//end of main controller
