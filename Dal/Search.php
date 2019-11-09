<?php

	class Search extends DBConnect {

		public function select($title) {
			$query = "SELECT * FROM search INNER JOIN results  ON search.id = results.searchId WHERE title = :title ";
			$sql = $this->conn->prepare($query);
			$sql->execute(array(':title'=>$title));
			return $sql->fetchAll();
			
		}

		public function insert($title) {
			$query = "INSERT INTO search SET title=:title";
			$sql = $this->conn->prepare($query);
			$sql->execute(array(':title'=>$title));
			$lastInsertId = $this->conn->lastInsertId();
			return $lastInsertId;
		}

	}


?>