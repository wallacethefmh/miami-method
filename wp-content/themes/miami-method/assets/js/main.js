$(function() {

	var $nav = $('nav.side-nav'),
		$bigHeader = $('.big-header'),
		$sticky = $('.sticky');
		$mainContent = $('.blog-posts'),
		$hb = $('.sticky .hb');
		


	// NAV
	$sticky.find('.open-nav').on('click', function() {
		$nav.toggleClass('open');
		$hb.toggleClass('open');
		$(this).find('.label').toggleClass('active');
	});

	$sticky.find('.open-nav').on('mouseenter', function() {
		$hb.addClass('active');
	});

	$sticky.find('.open-nav').on('mouseleave', function() {
		$hb.removeClass('active');
	});

	$nav.find('.expand').on('click', function() {
		var $subnav = $(this).find('.nav-sub');
		var $arrow = $(this).find('.arrow');
		if ($arrow.hasClass('dashicons-arrow-down')) {
			$arrow.removeClass('dashicons-arrow-down');
			$arrow.addClass('dashicons-arrow-up');
		} else {
			$arrow.removeClass('dashicons-arrow-up');
			$arrow.addClass('dashicons-arrow-down');
		}
		$subnav.toggleClass('show');
	});



	// SEARCH
	var $searchOverlay = $('.overlay.search');
	var $searchInput = $searchOverlay.find('.search-field');
	var searchToggles = function() {
		$('body, html').toggleClass('no-scroll');
		$searchOverlay.toggleClass('active');
		$bigHeader.toggleClass('blur');
		$mainContent.toggleClass('blur');
	}

	$('.open-search').on('click', function() {
		searchToggles();
		setTimeout(function() {
			$searchInput.focus();
		}, 100);
	});

	$searchInput.on('keyup', function(e){
		var code = e.keyCode || e.which;
		if (code === 27 && $(this).val() === '') {
			searchToggles();
		}
	});

	$searchOverlay.find('.close-overlay').on('click', function(){
		searchToggles();
	});



	// SUBSCRIBE
	var $subscribeOverlay = $('.overlay.subscribe');
	var $subscribeInput = $subscribeOverlay.find('.subscribe-field');
	var subscribeToggles = function() {
		$('body, html').toggleClass('no-scroll');
		$subscribeOverlay.toggleClass('active');
		$bigHeader.toggleClass('blur');
		$mainContent.toggleClass('blur');
	}

	$('.open-subscribe').on('click', function() {
		subscribeToggles();
		setTimeout(function() {
			$subscribeInput.focus();
		}, 100);
	});

	$subscribeInput.on('keyup', function(e){
		var code = e.keyCode || e.which;
		if (code === 27) {
			subscribeToggles();
		}
	});

	$subscribeOverlay.find('.close-overlay').on('click', function(){
		subscribeToggles();
	});



	// ENTRY PAGE
	var showIntro = Cookies.get('hideIntro');
	var $entryPage = $('.entry-overlay');
	if (typeof showIntro === 'undefined') {		
		$('body, html').css('overflow', 'hidden');
		$(window).load(function() {
			$entryPage.find('.pattern').addClass('loaded');
			$entryPage.find('.entry-img').addClass('loaded');
			$entryPage.find('.box').addClass('loaded');
			$entryPage.find('.button.enter').on('click', function(){
				$entryPage.find('.pattern').removeClass('loaded');
				$entryPage.find('.entry-img').removeClass('loaded');
				$entryPage.find('.box').removeClass('loaded');
				$entryPage.removeClass('loaded');
				$('body, html').css('overflow', 'auto');
			});
		});
		Cookies.set('hideIntro', 1, {expires: 31});
	} else {
		$entryPage.removeClass('loaded');
	}



	// LOAD MORE POSTS ON SCROLL
	var pageNum = 2,
		gettingPages = false,
		template = _.template($('#article-template').html());

	window.onscroll = function(e) {
	    
	    if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight - 400) && gettingPages === false) {
	  		
	  		gettingPages = true;
	  		
	  		$.ajax({
	  			type : "post",
				dataType : "json",
				url : '/wp-admin/admin-ajax.php',
				data : {action: "load_more_posts", paged: pageNum, query: wp_query},
			}).done(function(response) {
				console.log(response);
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