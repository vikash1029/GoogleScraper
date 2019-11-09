var GoogleScraper = GoogleScraper || {};
GoogleScraper.Scraper = (function() {
    var init = function() {
         if ($('#scraperSubmitForm').length <= 0) {
            return;
        }
        // if somebody clicks on search button add click event
        $('#searchButton').click(function(){
        	searchData();
        });
        $('#scraperSubmitForm').on('submit', function(e) {
        	e.preventDefault();
        	searchData();
        });
        // make a post request with search term to Api/GoogleSearch.php
    };
	var searchData = function() {
        	let searchTxt = $('#searchBar').val();
        	$('#searchBoxError').hide('slow');
        	if (searchTxt.length < 1 ) {
        		$('#searchBoxError').show('slow');
        	} else {
        			$.post(API_GOOGLE_SEARCH, 
        				{search: searchTxt},
        				function(data, status) {
        					let htmlResults = '<ul>';
        					data.forEach(function(row, index) {
        						htmlResults += '<li><a target="_blank" href="'+row.anchorValue+'">'+row.anchorText+'</a></li>';
        					});	
        					htmlResults += '</ul>';
        					$('#searchResult').html(htmlResults);
        				},
        				'json'
    				);
        	}
        };
    return {
        Init: init,
    };
})();

$(document).ready(function () {
 	GoogleScraper.Scraper.Init();   
});