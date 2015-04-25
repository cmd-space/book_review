<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Model {
  public function create($user) {
  	$query = 'INSERT INTO users (alias, name, email, created_at, updated_at)
  			  VALUES (?,?,?,NOW(),NOW())';
  	$values = array($user['alias'], $user['name'], $user['email']);
  	return $this->db->query($query, $values);
  }

  public function user_by_email($email) {
  	return $this->db->query('SELECT * FROM users WHERE email = ?', $email)->row_array();
  }

  public function get_authors() {
  	return $this->db->query('SELECT author FROM books')->result_array();
  }
}
