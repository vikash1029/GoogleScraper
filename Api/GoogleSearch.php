<?php
	require('../Dal/DBConnect.php');
	require('../Dal/Search.php');
	require('../Dal/SearchResults.php');

	class GoogleSearch {
		public function getResult() {
			if (isset($_POST['search'])) {
				$searchTxt = $_POST['search'];
				
				$dbSearchObj = new Search();
				$dbSearchData = $dbSearchObj->select($searchTxt);

				$dbSearchResultsObj = new SearchResults();  

				if (count($dbSearchData) === 0) {							
					$insertId = $dbSearchObj->insert($searchTxt);

					$url = 'http://www.google.co.in/search?q='.urlencode($searchTxt).'';
					$scrape = file_get_contents($url);

					$doc = new DOMDocument();
					@$doc->loadHTML($scrape);

					$xpath = new DOMXpath($doc);
					$results = $xpath->query("//*[contains(@class, 'r')]");;
				
					$htmlResults = [];
					foreach($results as $container) {
						$attribute = $container->getElementsByTagName('a');
						
						foreach ($attribute as $link) {
							if (count($htmlResults) == 10) {
								break;
							}

							$href = $link->getAttribute("href");
							$text = trim(preg_replace("/[\r\n]+/", " ", $link->nodeValue));
							if (strchr($href, '/url?q=https://') && $text != '') {
								$href = str_replace('/url?q=', '', $href);
								$htmlResults[] =['anchorValue' => $href, 'anchorText' => $text];
								$dbSearchResultsObj->insert($insertId, $text, $href); 
							}
						}
					}
				} else {
					$htmlResults = [];
					foreach ($dbSearchData as $data) {
						$htmlResults[] = ['anchorText' =>$data['anchorText'], 'anchorValue' => $data['anchorValue']];
					}
			  }
			  echo json_encode($htmlResults);
			}
		}
	}

	$search = new GoogleSearch();
	$search->getResult();
?>