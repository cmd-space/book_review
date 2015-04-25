<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcomes extends CI_Controller {
  public function index()
  {
    $this->load->model('Welcome');
    $data['hello'] = $this->Welcome->hello();
    $this->load->view('welcomes/index', $data);
  }
}

//end of main controller
