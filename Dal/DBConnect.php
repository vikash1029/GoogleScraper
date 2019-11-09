<?php
class DBConnect {
	private $db_host = 'localhost';
	private $db_name = 'mysearch';
	private $db_user = 'mysql';
	private $db_pass = '123456';

	public $conn = '';

	public function __construct() {
		try {
			$this->conn = new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name.";charset=utf8", $this->db_user, $this->db_pass);

		} catch (PDOException $e) {
				die($e->getMessage());
		}
	}

} 
?>
