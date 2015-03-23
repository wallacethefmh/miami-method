$(function() {
	
	var $nav = $('nav.side-nav'),
		$bigHeader = $('.big-header'),
		$mainContent = $('.blog-posts');

	// NAV
	$('.open-nav').on('click', function() {
		$nav.toggleClass('open');
		// $bigHeader.addClass('blur');
		// $mainContent.toggleClass('blur');
	});

	var pageNum = 2,
		gettingPages = false,
		template = _.template($('#article-template').html());

	window.onscroll = function(e) {
	    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight && gettingPages === false) {
	  		gettingPages = true;
	  		console.log('here');
	  		$.ajax({
	  			type : "post",
				dataType : "json",
				url : '/wp-admin/admin-ajax.php',
				data : {action: "load_more_posts", paged: pageNum},
			}).done(function(response) {
				gettingPages = false;
				pageNum++;
				for (var i = 0; i < response.articles.length; i++) {
					$mainContent.append(template(response.articles[i]));
				};
			}).fail(function(response, error) {
				console.log(response);
				console.log(error);
	      	});
	    }
	}

});