<?php
	
	class DbOperations {

		private $con;

		function __construct() {

			require_once dirname(__FILE__).'/DbConnect.php';

			$db = new DbConnect();
			$this->con = $db->connect();

		}

		function createUser($name, $email, $pass) {

			$password = md5($pass);
			$stmt = $this->con->prepare("INSERT INTO users (id, name, email, password) VALUES (NULL, ?, ?, ?)");
			$stmt->bind_param("sss", $name, $email, $password);

			if ($stmt->execute()) {

				return true;

			} else {

				return false;
				
			}

		}

	}

?>