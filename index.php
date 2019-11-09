<!DOCTYPE html>
<html>
	<head>
		<title>SearchPage</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="Css/Bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="Css/Search.css">
	</head>
<body>
	<div class="container">
		<div class="formWraper">
			<form id="scraperSubmitForm">
				<div class="form-group">
					<input type="text" name="searchBar" id="searchBar" placeholder="Search or Type URL">
					<input type="button" value="Search" id="searchButton">
				</div>	
					<span class="error" id="searchBoxError" style="display: none;">Please input some value</span>
		 	</form>
		 	<div id="searchResult">
		 			
		 	</div>
	 </div>
 </div>
</body>
<script src="Js/jquery.min.js"></script>
<script type="text/javascript" src="Js/Constant.js"></script>
<script type="text/javascript" src="Js/Scraper.js"></script>
</html>