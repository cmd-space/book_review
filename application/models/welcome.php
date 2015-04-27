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
  // Grabs info for each book to display an individualized page
  public function book_page($id) {
  	$this->db->query("SELECT * FROM books WHERE id = ?", $id)->row_array();
  }
  // Add a review to the DB
  public function add_review($review) {
  	$query = "INSERT INTO reviews (review, rating, created_at, updated_at, user_id, book_id)
			  VALUES (?,?,NOW(),NOW(),?,?)";
	$values = array($review['review'], $review['stars'], $review['user'], $review['book']);
	return $this->db->query($query, $values);
  }
  // Add a book to the DB
  public function add_book($book) {
  	$query = "INSERT INTO books (title, author, created_at, updated_at)
  			  VALUES (?,?,NOW(),NOW())";
  	$values = array($book['title'], $book['author']);
  	return $this->db->query($query, $values);
  }
  // Checks for duplicate books
  public function check_book($book) {
  	return $this->db->query("SELECT * FROM books WHERE title = ? AND author = ?", $book)->row_array();
  }
}
