<?php

	class SearchResults extends DBConnect {
		public function insert($lastId, $anchorText, $anchorValue) {
			$query = "INSERT INTO results SET searchId=:lastId, anchorText=:anchorText, anchorValue=:anchorValue";
			$sql = $this->conn->prepare($query);
			$sql->execute(array(':lastId'=>$lastId, ':anchorText'=>$anchorText, ':anchorValue'=>$anchorValue));
			return true;
		}
	}
?>