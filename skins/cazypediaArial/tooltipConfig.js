jQuery(document).ready(function() {
	loadMenu('#n-GH-Families', '../../index.php/Glycoside_hydrolase_tooltip');
	loadMenu('#n-Lexicon', '../../index.php/Lexicon_tooltip');
	loadLoginPane();
});
								
function loadMenu(idTag, contentUrl) {
	$(idTag).qtip({
		content: {
			text: 'Loading...',
			ajax: {
				url: contentUrl, // URL to the local file
				loading: false,
				type: 'GET', // POST or GET
				data: { }, // Data to pass along with your request
				success: function(data, status) {
					
					// Process the data
					var start = data.search('<!-- bodycontent -->');
					var end = data.search('<!-- /bodycontent -->');
					data = data.substring(start, end);
					
					// Set the content manually (required!)
					this.set('content.text', data);
				}
			}
		},
		style: {
			classes: 'ui-tooltip-light ui-tooltip-shadow ui-tooltip-bootstrap',
			tip: false 
		},
		hide: {
			fixed: true,
			delay: 200
		},
		position: {
			viewport: $(window),
			my: 'left top',
			at: 'right top',
			adjust: {
				method: 'shift',
				y: -10
			}
		}
	})
}

function loadLoginPane() {
	$('#pt-anonlogin').qtip({
		content: {
			text: 'Loading...',
			ajax: {
				url: '../../index.php?title=Special:UserLogin', // URL to the local file
				loading: false,
				type: 'GET', // POST or GET
				data: { }, // Data to pass along with your request
				success: function(data, status) {
					
					// Process the data
					var start = data.search('<!-- bodycontent -->');
					var end = data.search('<!-- /bodycontent -->');
					data = data.substring(start, end);
					
					// Set the content manually (required!)
					this.set('content.text', data);
				}
			}
		},
		style: {
			classes: 'ui-tooltip-shadow ui-tooltip-bootstrap',
			tip: false,
			width: 400
		},
		hide: {
			fixed: true,
			delay: 200
		},
		position: {
			viewport: $(window),
			my: 'right top',
			at: 'right bottom',
			adjust: {
				method: 'shift',
				x: 5
			}
		}
	})
}