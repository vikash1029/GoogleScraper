<?php
	class GoogleSearchResult {
		public $anchorText;
		public $anchorValue;
		public function getAnchorText() {
			return $this->anchorText;
		}
		public function setAnchorText(string $anchorText) {
			$this->anchorText = $anchorText;
		}	
		public function getAnchorValue() {
			return $this->anchorValue;
		}
		public function setAnchorValue(string $anchorValue) {
			$this->anchorValue = $anchorValue;
		}
	}

?>