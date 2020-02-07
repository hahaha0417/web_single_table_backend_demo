$(function () {
	// smooth scrollTo
	$('a[href*="#"]:not([href="#"])').click(function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').stop(0,1).animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});

	// vertical nav dots
	$(window).scroll(function () {
		var windscroll = $(window).scrollTop();
		if (windscroll >= 50) {
			$('#hd section').each(function (i) {
				if ($(this).position().top <= windscroll + 100) {
					$('#fp-nav li a.active').removeClass('active');
					$('#fp-nav li').eq(i).find("a").addClass('active');
				}
			});
		} else {
			$('#fp-nav li a.active').removeClass('active');
			$('#fp-nav li:first').find("a").addClass('active');
		}


		//scrollUp btn
		if ($(this).scrollTop() > 0) {
			$('#scrollUp').addClass('hd-show');
		} else {
			$('#scrollUp').removeClass('hd-show');
		}
	}).scroll();

	//scrollUp btn
	$('#scrollUp').on('click', function () {
		$("html, body").animate({
			scrollTop: 0
		}, 1000);
		return false;
	});

	// scrollReveal
	// Changing the defaults
	window.sr = ScrollReveal({
		reset: true,
		mobile: true,
		duration: 600,
		origin: 'bottom',
		distance: '50px',
		opacity: 0,
		scale: 0.8,
		easing: 'cubic-bezier(.38,.02,.52,1.35)'
	});

	sr.reveal('.reveal3', {
		origin: 'left'
	}, 500);
	sr.reveal('#greater', {
		distance: '0',
		duration: 500,
		scale: 1.5
	})

	// evolution
	$('#owl_evolution').on('initialized.owl.carousel changed.owl.carousel resized.owl.carousel', function(event){
			var current = event.item.index;
			$('#owl_evolution .owl-item').removeClass('prev-1 prev-2 prev-3 prev-4 prev-5');
			$('#owl_evolution .owl-item').eq(current-1).addClass('prev-1');
			$('#owl_evolution .owl-item').eq(current-2).addClass('prev-2');
			$('#owl_evolution .owl-item').eq(current-3).addClass('prev-3');
			$('#owl_evolution .owl-item').eq(current-4).addClass('prev-4');
			$('#owl_evolution .owl-item').eq(current-5).addClass('prev-5');
	});
	// disable nav when reach first/last item
	$("#owl_evolution").on('initialized.owl.carousel changed.owl.carousel refreshed.owl.carousel', function (event) {
		if (!event.namespace) return;
		var carousel = event.relatedTarget,
			element = event.target,
			current = carousel.current();
		$('.owl-next', element).toggleClass('disabled', current === carousel.maximum());
		$('.owl-prev', element).toggleClass('disabled', current === carousel.minimum());
	})
	$('#owl_evolution').owlCarousel({
		startPosition: 0,
		loop:false,
		padding:0,
		nav:true,
		navText:['',''],
		dots:false,
		center:true,
		responsive:{
			0:{
				items:3,
				nav:false,
				margin: -100
			},
			621:{
				items:5,
				margin: -50
			},
			1025:{
				items:9,
				margin: -250
			}
		}
	});
	$('#owl_evolution .owl-item').on('click', function(){
		var pos = $(this).index() % 10;
		$('#owl_evolution').trigger('to.owl.carousel', [pos,300,true])
	});

	// fan control
	var fan_filter = $('.hd-sec-fan .hd-filter li'),
		fan_cover = $('.hd-sec-fan .fan_cover li'),
		fan_content = $('.hd-sec-fan .hd-content li');

	fan_filter.on('click', function(){
		var n = $(this).index();
		$(this).addClass('hd-active').siblings().removeClass('hd-active');
		fan_cover.removeClass('hd-active').eq(n).addClass('hd-active');
		fan_content.removeClass('hd-active').eq(n).addClass('hd-active');
	})

	// SUPREMEFX  click switch
	var item = $('.audio-switch li:nth-child(n-5)'),
		supremefx = $('.hd-supremefx li'),
		dragger = $('#dragger'),
		pos,
		n = 3;
	item.on('click', function(){
		n = $(this).data('supremefx');
		n = moveHandle(n);
	});
	var prevX = -1,
		flag = '';
	dragger.draggable({
		axis:'x',
		snap: '#hd .audio-switch li span',
		containment: "#hd .audio-switch",
		helper: "clone",
		start: function(e,ui) {
			$(this).addClass('moving');
			setTimeout(function(){
				$(this).removeClass('moving');
			},500)
		},
		drag:function(e,ui){
			if(prevX == -1){
				prevX = e.pageX;
				return false;
			}
			if(prevX > e.pageX) {
			   flag = 'left';
			}
			else if(prevX < e.pageX) { // dragged right
				flag = 'right';
			}
			prevX = e.pageX;
		},
		stop:function(e,ui){
			// console.log(flag);
			if(flag == 'left'){
				n--; n=moveHandle(n);
			}else if(flag == 'right'){
				n++; n=moveHandle(n);
			}
		}
	});

	function moveHandle(n){
		if(n<1){n=1}
		else if(n>5){n=5}
		else{n=Math.floor(n)}
		// console.log(n);
		pos = 'pos' + n;
		supremefx.removeClass('hd-active').eq(n).addClass('hd-active');
		dragger.removeClass().addClass(pos).attr('data-supremefx', n);
		return n;
	}

	// sonic studio ui lightbox
	var uibox = $('#sonic_ui_on');
	$('.hd-sec-sonic figure > img').on('click', function(){
		uibox.fadeIn();
	});
	uibox.on('click', function(e){
		if(e.target != this){return;}
		$(this).fadeOut();
	})

	// overview click switch
	var detail = $('.hd-detail');
	var menu = $('.hd-menu li, .hd-detail .hd-btn');
	menu.on('click', function (e) {
		var targetdetail = $(this).data('detail');
		if ($(e.target).parents().hasClass('hd-menu')) {
			menu.removeClass('hd-active');
		}
		$(this).addClass('hd-active');

		detail.removeClass('hd-open');
		$(targetdetail).addClass('hd-open');
	});

	// mode click expand content
	$('.hd-sec-mode h4').on('click', function () {
		$(this).toggleClass('hd-open');
		$(this).next().slideToggle();
	})

	// video lightbox
	var hd_lightbox = $('#hd_lightbox');
	var player = $('#player');

	$('.play-tutorial').click(function () {
		var video = $(this).data('src') +
			'?modestbranding=0&autohide=1&showinfo=0&color=white&autoplay=1&enablejsapi=1';

		player.attr('src', video);
		hd_lightbox.fadeIn();
	})

	// close lightbox
	$('#hd .hd_filter, #hd .hd_close').click(function () {
		hd_lightbox.fadeOut();
		player.attr('src', "");
	});


	// expand content
	$('.hd-more').on('click', function () {
		var $this = $(this),
			source = $this.data('source'),
			hidden = $this.next();

		hidden.find('img').each(function () {
			$(this).attr('src', $(this).data('source')).css('visibility', 'visible');
		})

		$this.toggleClass('hd-open');
		hidden.slideToggle(1000);
		if ($this.hasClass('hd-open')) {
			$('html, body').stop(0,1).animate({
				scrollTop: $this.offset().top
			}, 1000);
		}
	});
});