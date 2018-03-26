"use strict";



$(document).ready(function() {
	/* Defaults */
	// Timing
	var dynamicDuration = 300; 
	var dynamicDelay = 0;

	/* Window Resize Timer Function */
	var uniqueTimeStamp = new Date().getTime();

	var waitForFinalEvent = (function () {
		var timers = {};
		return function (callback, ms, uniqueId) {
			if (!uniqueId) {
				uniqueId = 'unique id';
			}
			if (timers[uniqueId]) {
				clearTimeout (timers[uniqueId]);
			}
			timers[uniqueId] = setTimeout(callback, ms);
		};
	})();

	/* Misc Chunks of Code */
	function qp_required_misc(){

		/* Dropdown Menu - Submenu */
		$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
			if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
			}

			var subMenu = $(this).next(".dropdown-menu");
			subMenu.toggleClass('show');
			subMenu.prev().toggleClass('show');

			$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
				$('.dropdown-submenu .show').removeClass("show");
			});

			return false;
		});

		/* Buttons */
		// Gradient Buttons
		$('.btn-gradient').each(function(){
			var thisBtn = $(this);
			var btnContent = thisBtn.html();
			var btnContentNew = '<span class="gradient">' + btnContent + '</span>';

			thisBtn.html(btnContentNew);
		});


		/* Cards */
		// Custom Scrollbar
		qp_add_scrollbar('.card-media-list', 'dark');
		// qp_add_scrollbar('.card-img-overlay', 'dark');

		// Create scroll where needed
		$('.has-scroll').each(function(){
			qp_add_scrollbar($(this), 'dark');
		});

		// Fix card-header button position when necessary
		$('.card-header').each(function(){
			var thisHeader = $(this);

			if(thisHeader.height() > 40){
				thisHeader.find('.header-btn-block').css({'top' : '31px'});
			}
		});


		/* Sidebar */
		// Menu Controls
		var parentLink = 'a.nav-parent';
		if($(parentLink).length){
			$('a.nav-parent').on('click', function(e){

				var clickedLink = $(this);

				if(clickedLink.closest('li').hasClass('open')){
					clickedLink.closest('li').removeClass('open');
					clickedLink.siblings('ul.nav').velocity('slideUp', {
						easing: 'easeOutCubic',
						duration: dynamicDuration,
						delay: dynamicDelay,
						complete:
						function(elements){
							// callback here
							// Close all open children sub-menus
							clickedLink.closest('li').find('li').removeClass('open');
							clickedLink.closest('li').find('ul.nav').removeAttr('style');
						}
					});
				}else{
					// Opens its sub-menu
					clickedLink.closest('li').addClass('open');
					clickedLink.siblings('ul.nav').velocity('slideDown', {
						easing: 'easeOutCubic',
						duration: dynamicDuration,
						delay: dynamicDelay,
						complete:
						function(elements){
							// callback here
						}
					});

					// Closes the sub-menus' and children sub-menus of other menu items in the same ul parent
					clickedLink.closest('li').siblings('li.nav-item.open').find('ul.nav').velocity('slideUp', {
						easing: 'easeOutCubic',
						duration: dynamicDuration,
						delay: dynamicDelay,
						complete:
						function(elements){
							// callback here
							$(this).removeAttr('style');
							$(this).closest('li').removeClass('open');
						}
					});

					// Closes the sub-menus' and children sub-menus of other menu items in other ul parents
					clickedLink.closest('ul').siblings('ul.nav').find('ul.nav').velocity('slideUp', {
						easing: 'easeOutCubic',
						duration: dynamicDuration,
						delay: dynamicDelay,
						complete:
						function(elements){
							// callback here
							$(this).closest('li').removeClass('open');
							$(this).closest('li').removeClass('open');
						}
					});
				}

				e.preventDefault();
			});
		}

		// Menu Scroll
		var sidebarNav = 'nav.sidebar';
		if($(sidebarNav).length){
			var windowHeight = $(window).height();
			
			// Set Height of the Left Column
			$(sidebarNav).height(windowHeight);

			// Destroy old scrollbar if present
			$(sidebarNav).mCustomScrollbar("destroy");

			qp_add_scrollbar('nav.sidebar', 'light');

			// Add Hamburger Menu to .sidebar
			$('.sidebar > .mCustomScrollBox').before('<button class="hamburger hamburger--slider" type="button" data-target=".sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle Sidebar"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>');

			// On window resize
			$(window).resize(function () {
				waitForFinalEvent(function(){
					var windowHeight = $(window).height();

					// Set Height of the Left Column
					$(sidebarNav).height(windowHeight);

					// Destroy old scrollbar if present
					$(sidebarNav).mCustomScrollbar("destroy");

					// Destroy Hamburger
					$('.sidebar .hamburger').remove();

					// Add new scrollbar
					qp_add_scrollbar('nav.sidebar', 'light');

					// Add Hamburger Menu to .sidebar
					$('.sidebar > .mCustomScrollBox').before('<button class="hamburger hamburger--slider" type="button" data-target=".sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle Sidebar"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>');

				}, 500, 'RandomUniqueString');
			});
		}

		// Hamburger Menu Controls
		$(document).on('click', 'button.hamburger', function(e){
			var mainNavbarHeight = $('.navbar-sidebar-horizontal').outerHeight();

			$('.sidebar-horizontal.fixed-top').css({'top' : mainNavbarHeight + 'px'});

			if($('.hamburger').hasClass('is-active')){
				$('.hamburger').removeClass('is-active');
				$('#sidebar').removeClass('open');
				$('.sidebar-horizontal').slideUp().promise().always(function(){
					$(this).removeAttr('style');
				});
			}else{
				$('.hamburger').addClass('is-active');
				$('#sidebar').addClass('open');
				$('.sidebar-horizontal').slideDown();
			}
			e.preventDefault();
		});


		/* Forms */
		// Input Group Highlight Color - Focus/Blur
		$('.input-group .form-control').focus(function(){
			$(this).closest('.input-group').addClass('focus');
		});

		$('.input-group .form-control').blur(function(){
			$(this).closest('.input-group').removeClass('focus');
		});


		/* Popover */
		$('[data-toggle="popover"]').popover();


		/* Enable Tooltips */
		$('[data-toggle="tooltip"]').tooltip();


		/* Auto-Links */
		// Allows you to make any element clickable without the affecting the style of the page
		$('[data-qp-link]').on('click', function(e){
			window.location = $(this).data('qp-link');
			e.preventDefault();
		});


		/* Signin, Signup, Forgotten Password */
		// Auto-adjust page height
		var signInLeftColumn = '.signin-left-column';
		if($(signInLeftColumn).length){
			var windowHeight = $(window).height();

			if(windowHeight > 630){
				$(signInLeftColumn).css({'height' : windowHeight + 'px'});
			}

			// On window resize
			$(window).resize(function () {
				waitForFinalEvent(function(){

					var windowHeight = $(window).height();

					if(windowHeight > 630){
						$(signInLeftColumn).css({'height' : windowHeight + 'px'});
					}

				}, 500, 'randomStringForSignupPage');
			});
		}

		// Add background image to the Right column
		var signInRightColumn = '.signin-right-column';
		if($(signInRightColumn).length){

			// Background Image
			if((typeof($(signInRightColumn).data('qp-bg-image')) !== 'undefined') && ($(signInRightColumn).data('qp-bg-image') != '')){
				var backgroundImage = $(signInRightColumn).data('qp-bg-image');

				$(signInRightColumn).css({'background-image' : 'url(assets/img/' + backgroundImage + ')'});
			}
		}


		/* CKEditor */
		var placeholder = '.load-ckeditor';
		if($(placeholder).length){
			$(placeholder).ckeditor();
		}


		/* Prettify */
		if($('.prettyprint').length){
			prettyPrint();
		}


		/* Color Controls */
		// Radio Select
		var customColorControl = $('.custom-color-control.custom-control.custom-radio');
		if(customColorControl.length){
			$('.custom-color-control.custom-control.custom-radio').each(function(){
				var thisObj = $(this);
				var color = thisObj.data('qp-color');

				thisObj.find('.custom-control-indicator').css({'background-color' : color});
			});
		}


		/* Animate on load */
		qp_animate_css();


		// Misc



		/* Misc */
		// Dropdown Menu - Make full right-column width
		if($('.dropdown-menu-fullscreen').length){
			var rightColumnWidth = $('.right-column').width();

			// Resize the .dropdown-menu-fullscreen
			$('.dropdown-menu-fullscreen').css({'width' : rightColumnWidth + 'px'});

			// Navbar Search - Works for all .nav-items for .dropdown-menu-fullscreen
			$('.dropdown-menu-fullscreen').closest('.nav-item').css({'position' : 'static'});

			// On window resize
			$(window).resize(function () {
				waitForFinalEvent(function(){
					var rightColumnWidth = $('.right-column').width();

					// Resize the .dropdown-menu-fullscreen
					$('.dropdown-menu-fullscreen').css({'width' : rightColumnWidth + 'px'});

				}, 500, uniqueTimeStamp);
			});
		}

		// Dropdown Width on Mobile
		// If browser width is less tha 576 then make dropdown menu of navbar fullscreen width
		var windowWidth = $(window).width();

		$('.dropdown-toggle').on('click', function(){
			if($(window).width() <= 576){
				$(this).siblings('.dropdown-menu').each(function(){
					if(!$(this).hasClass('dropdown-menu-fullscreen')){
						$(this).css({'position' : 'absolute', 'width' : windowWidth + 'px'});
						$(this).closest('.dropdown').css({'position' : 'static'});
					}
				});
			}else{
				$(this).siblings('.dropdown-menu').each(function(){
					if(!$(this).hasClass('dropdown-menu-fullscreen')){
						$(this).removeAttr('style');
						$(this).closest('.dropdown').removeAttr('style');
					}
				});
				// $('.dropdown-menu').removeAttr('style');
				// $('.dropdown-menu').closest('.dropdown').removeAttr('style');
			}
		});

		// Reloads the map function on window resize
		$(window).resize(function () {
			waitForFinalEvent(function(){
				// functions here...
				// $('.dropdown-menu').removeAttr('style');
				// $('.dropdown-menu').closest('.dropdown').removeAttr('style');

				if($(window).width() <= 576){
					$('.dropdown-toggle').on('click', function(){
						var windowWidth = $(window).width();
						$(this).siblings('.dropdown-menu').each(function(){
							if(!$(this).hasClass('dropdown-menu-fullscreen')){
								$(this).css({'position' : 'absolute', 'width' : windowWidth + 'px'});
								$(this).closest('.dropdown').css({'position' : 'static'});
							}
						});
					});
				}else{
					if(!$(this).hasClass('dropdown-menu-fullscreen')){
						$(this).siblings('.dropdown-menu').removeAttr('style');
						$(this).siblings('.dropdown-menu').closest('.dropdown').removeAttr('style');
					}
				}
			}, 500, 'uniqueTimeStamp+345');
		});

		// Unknown
		$('[data-toggle=offcanvas]').click(function() {
			$('.row-offcanvas').toggleClass('active');
		});

		// Removes MDB Waves Effect from respective items
		$('.no-waves-effect').removeClass('waves-effect');

		// Add dark waves to navbar
		// $('.navbar-nav > .nav-item > .nav-link').removeClass('waves-light').addClass('waves-dark');

	}

	/* Animate.css - Animation/Transition */
	function qp_animate_css(){

		// If the body class does not prevent animation, then animation occurs.
		// This overrides all animation calls
		if(!$('body').hasClass('no-animation')){

			$('[data-qp-animate-type]').each(function(){

				var mainElement = $(this);

				if(mainElement.visible(true) || mainElement.closest('nav').hasClass('sidebar')){
					load_animation(mainElement);
				}

				$(window).scroll(function() {
					if(mainElement.visible(true)){
						load_animation(mainElement);
					}
				});

				function load_animation(mainElement){
			
					var animationName = '';

					if(typeof(mainElement.data('qp-animate-type')) === 'undefined'){
						var animationName = 'fadeInDown';
					}else{
						var animationName = mainElement.data('qp-animate-type');
					}

					if(typeof(mainElement.data('qp-animate-delay')) === 'undefined'){
						var timeoutDelay = 0;
					}else{
						var timeoutDelay = mainElement.data('qp-animate-delay');
					}

					var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

					if(mainElement.hasClass('invisible')){


						setTimeout(function(){
							mainElement.removeClass('invisible').addClass('animated ' + animationName).one(animationEnd, function(){
								$(this).removeClass(animationName);
								$(this).removeClass('animated');

								// If the element has infinite animation
								$(this).removeClass('infinite');
							});
						}, timeoutDelay);
					}

					if(mainElement.hasClass('invisible-children')){

						mainElement.children().each(function(){

							var thisElement = $(this);

							setTimeout(function(){
								thisElement.addClass('animated ' + animationName).one(animationEnd, function(){
									// Nothing to do after animation ends
								});
							}, timeoutDelay);

							timeoutDelay += 75;
						});
					}

					if(mainElement.hasClass('invisible-children-with-scrollbar')){

						mainElement.children('.mCustomScrollBox').find('.mCSB_container').children().each(function(){

							var thisElement = $(this);

							setTimeout(function(){
								thisElement.addClass('animated ' + animationName).one(animationEnd, function(){
									 // Nothing to do after animation ends
								});
							}, timeoutDelay);

							timeoutDelay += 75;
						});
					}
				}
			});
		}
	}

	/* Hex to RGBA */
	function qp_hexToRgbA(hex, alpha){
		var r = parseInt(hex.slice(1, 3), 16),
		g = parseInt(hex.slice(3, 5), 16),
		b = parseInt(hex.slice(5, 7), 16);

		if(alpha){
			return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
		}else{
			return "rgb(" + r + ", " + g + ", " + b + ")";
		}
	}

	function qp_add_scrollbar(scrollContainer, scrollBarTheme){
		
		// Current Color Preset
		var colorPresetGlobal = $('body').data('color-preset');

		$(scrollContainer).mCustomScrollbar({
			autoHideScrollbar: true,
			scrollbarPosition: 'inside',
			theme: scrollBarTheme,
			mouseWheel: {
				preventDefault: true
			}
		});
	}

	function qp_chart_sizes(chartID){
		// Card Chart Sizes
		var chartWidth = '';
		var chartHeight = '';

		chartWidth = $(chartID).parent().width();


		// Get the chart preset data-height.
		// If not present, then use the height of closest parent of .card-chart
		// If .card-body is smaller than the data-height (responsive fix), then use the height of .card-body
		if(typeof($(chartID).closest('.card-chart').data('chart-height')) === 'undefined'){
			chartHeight = 281;
		}else{
			if(chartWidth < 300){
				chartHeight = 281;
			}else{
				chartHeight = $(chartID).closest('.card-chart').data('chart-height');
			}
		}

		var chartSizes = [chartWidth, chartHeight];

		return chartSizes;
	}

	/**
	 * @chartID					{string}
	 * @maxHeight 				{int}(optional)
	 */
	function qp_line_chart(chartID, maxHeight){
		if($(chartID).length){
			var chartSizes = qp_chart_sizes(chartID);
			var chartWidth = chartSizes[0];
			var chartHeight = chartSizes[1];

			if(typeof(maxHeight) === 'undefined'){
				maxHeight = chartHeight;
			}
			if(maxHeight != chartHeight){
				chartHeight = maxHeight;
			}

			// If there is a date/range dropdown, then enable a click event
			// If not, use another trigger
			var clickedElement = $(chartID).closest('.card').find('.header-btn-block .data-range.dropdown .dropdown-item');
			var triggeredEvent = 'click';

			if(!clickedElement.length){
				var clickedElement = $(chartID);
				var triggeredEvent = 'load';
			}

			clickedElement.on(triggeredEvent, function(e){
				e.preventDefault();

				// If default range is not set, then get the range from the clicked element
				if(triggeredEvent != "load"){
					var range = $(this).attr('href');
				}else{
					// B5B Documentation:
					// Set the default range if no data/range dropdown is present
					var range = 'Mois';
				}

				// Highlight clicked item as active
				$(this).siblings().removeClass('active');
				$(this).addClass('active');

                $.ajax({
                    type: "GET",
                    url: "api/charts/players",

                    success: function(request){
                        var req = $.parseJSON(request);

                        var month = [];
                        var total = [];
                        var data = [];

                        for(var i in req) {
                            month.push(req[i].date);
                            total.push(req[i].total);
                        }

                        load_chart(range, month, total);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        apiError(XMLHttpRequest, textStatus, errorThrown);
                    }
                });
			});

			if(triggeredEvent == 'load'){
				clickedElement.trigger(triggeredEvent);
			}else{
				$(chartID).closest('.card').find('.header-btn-block .data-range.dropdown .dropdown-item.active').trigger(triggeredEvent);
			}

			function load_chart(range, xAxisLabels, dataSet1){
				var canvasParent = $(chartID).closest('.card-chart');
				var color1 = canvasParent.data('chart-color-1');

				var legendLine1 = canvasParent.data('chart-legend-1');

				// B5B Documentation:
				// Use these settings if it's called from a '.card-sm'
				// Add more card classes as you wish
				if(canvasParent.closest('.card').hasClass('card-sm')){
					color1 = qp_hexToRgbA(color1, 0.7);
					var borderWidth = 0;
					var pointRadius = 0;
					var fillLineArea = true;
					var displayLegend = false;
					var hoverInterset = false;
					var xAxisLabelShow = false;
					var yAxisLabelShow = false;

					chartHeight = 82;
					canvasParent.closest('.card-body').css({'padding-left' : '0', 'padding-right' : '0'});

					if(!canvasParent.closest('.card-body').next().length && !canvasParent.next().length){
						canvasParent.closest('.card-body').css({'padding-bottom' : '0', 'position' : 'relative'});
						canvasParent.css({'position' : 'absolute', 'bottom' : '0'});
						chartWidth = canvasParent.closest('.card-body').width();
					}
				}else{
					var borderWidth = 2;
					var pointRadius = 2;
					var fillLineArea = false;
					var displayLegend = true;
					var hoverInterset = true;
					var xAxisLabelShow = true;
					var yAxisLabelShow = true;
				}

				// First remove old chart, then create new one
				canvasParent.empty();

				$('<canvas>').attr({
					id: chartID.substring(1)
				}).css({
					width: chartWidth + 'px',
					height: chartHeight + 'px'
				}).appendTo(canvasParent);

				var ctx = $(chartID);

				var myChart = new Chart(ctx, {
					type: 'line',
					data: {
						labels: xAxisLabels,
						datasets: [{
							label: legendLine1,
							backgroundColor: color1,
							borderColor: color1,
							borderWidth: borderWidth,
							pointRadius: pointRadius,
							data: dataSet1,
							fill: fillLineArea
						}]
					},
					options: {
						responsive: false,
						title:{
							display: false
						},
						tooltips: {
							mode: 'index',
							intersect: false,
						},
						hover: {
							mode: 'nearest',
							intersect: hoverInterset
						},
						legend: {
							display: displayLegend
						},
						scales: {
							xAxes: [{
								display: xAxisLabelShow,
								scaleLabel: {
									display: true,
									labelString: 'Timeframe (' + range + ')'
								}
							}],
							yAxes: [{
								display: yAxisLabelShow,
								scaleLabel: {
									display: true,
									labelString: 'Value'
								}
							}]
						}
					}
				});
			}
		}
	}

	function qp_bar_chart(chartID, chartType, isStacked, maxHeight){
		if($(chartID).length){
			var chartSizes = qp_chart_sizes(chartID);
			var chartWidth = chartSizes[0];
			var chartHeight = chartSizes[1];

			if(typeof(maxHeight) === 'undefined'){
				maxHeight = chartHeight;
			}
			if(maxHeight != chartHeight){
				chartHeight = maxHeight;
			}

			if(typeof(chartType) === 'undefined'){
				chartType = 'bar';
			}
			if(typeof(stacked) === 'undefined'){
				isStacked = false;
			}

			// If there is a date/range dropdown, then enable a click event
			// If not, use another trigger
			var clickedElement = $(chartID).closest('.card').find('.header-btn-block .data-range.dropdown .dropdown-item');
			var triggeredEvent = 'click';

			if(!clickedElement.length){
				var clickedElement = $(chartID);
				var triggeredEvent = 'load';
			}

			clickedElement.on(triggeredEvent, function(e){
				e.preventDefault();
				
				// If default range is not set, then get the range from the clicked element
				if(triggeredEvent != "load"){
					var range = $(this).attr('href');
				}else{
					// B5B Documentation:
					// Set the default range if no data/range dropdown is present
					var range = 'year';
				}

				// Highlight clicked item as active
				$(this).siblings().removeClass('active');
				$(this).addClass('active');

				/* DEMO DATA - START */
				switch(range){
					case 'today':
					// B5B Documentation:
					// Use Ajax to pull your own data from the database
					var xAxisLabels = ["1AM", "2AM", "3AM", "4AM", "5AM", "6AM", "7AM", "8AM", "9AM", "10AM", "11AM", "12PM", "1PM", "2PM", "3PM", "4PM", "5PM", "6PM", "7PM", "8PM", "9PM", "10PM", "11PM", "12AM"];
					var dataSet1 = [0, 0, 0, 0, 0, 0, 0, 0, 3, 9, 7, 9, 5, 0, 5, 3, 9, 7, 9, 5, 0, 5, 7, 2];
					var dataSet2 = [0, 0, 3, 5, 0, 2, 7, 0, 9, 5, 0, 5, 3, 0, 2, 7, 0, 9, 5, 0, 5, 0, 5, 3];

					// Load the chart after all the data has been set
					load_chart(range, xAxisLabels, dataSet1, dataSet2);
					break;
					
					case 'week':
					// B5B Documentation:
					// Use Ajax to pull your own data from the database
					var xAxisLabels = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
					var dataSet1 = [40, 38, 97, 19, 85, 90, 50];
					var dataSet2 = [30, 45, 20, 52, 70, 20, 90];

					// Load the chart after all the data has been set
					load_chart(range, xAxisLabels, dataSet1, dataSet2);
					break;

					case 'month':
					// B5B Documentation:
					// Use Ajax to pull your own data from the database
					var xAxisLabels = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
					var dataSet1 = [2, 1, 3, 3, 4, 0, 0, 0, 6, 4, 3, 0, 0, 0, 0, 1, 8, 5, 1, 2, 4, 0, 0, 0, 3, 5, 0, 0, 0, 0, 0];
					var dataSet2 = [3, 4, 2, 2, 7, 0, 0, 0, 5, 2, 1, 3, 3, 4, 0, 0, 0, 6, 9, 2, 0, 0, 5, 2, 5, 7, 2, 9, 3, 3, 7];

					// Load the chart after all the data has been set
					load_chart(range, xAxisLabels, dataSet1, dataSet2);
					break;
					
					default:
					case 'year':
					// B5B Documentation:
					// Use Ajax to pull your own data from the database
					var xAxisLabels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", "January", "February", "March", "April", "May", "June"];
					var dataSet1 = [2025, 1460, 1492, -1794, -1384, -2122, 2880, 2545, 2108, 2935, -2907, -2937, 821, 730, 622, -897, -923, -1200, 1402, 1212, 1534, -2100, -1503, -1899];
					var dataSet2 = [821, 730, 622, -897, -923, -1200, 1402, 1212, 1534, 2100, -1503, -1899, 2937, 821, 730, -622, -1492, -1794];

					// Load the chart after all the data has been set
					load_chart(range, xAxisLabels, dataSet1, dataSet2);
					break;
				}
				/* DEMO DATA - END */
			});

			if(triggeredEvent == 'load'){
				clickedElement.trigger(triggeredEvent);
			}else{
				$(chartID).closest('.card').find('.header-btn-block .data-range.dropdown .dropdown-item.active').trigger(triggeredEvent);
			}

			function load_chart(range, xAxisLabels, dataSet1, dataSet2){

				var canvasParent = $(chartID).closest('.card-chart');
				var color1 = canvasParent.data('chart-color-1');
				var color2 = canvasParent.data('chart-color-2');

				var legendLine1 = canvasParent.data('chart-legend-1');
				var legendLine2 = canvasParent.data('chart-legend-2');

				// B5B Documentation:
				// Use these settings if it's called from a '.card-sm'
				// Add more card classes as you wish
				if(canvasParent.closest('.card').hasClass('card-sm')){
					var displayLegend = false;
					var hoverInterset = false;
					var xAxisLabelShow = false;
					var yAxisLabelShow = false;

					chartHeight = 112;
					canvasParent.closest('.card-body').css({'padding-left' : '0', 'padding-right' : '0'});
				}else{
					var displayLegend = true;
					var hoverInterset = true;
					var xAxisLabelShow = true;
					var yAxisLabelShow = true;
				}

				// First remove old chart, then create new one
				canvasParent.empty();

				$('<canvas>').attr({
					id: chartID.substring(1),
					width: chartWidth + 'px',
					height: chartHeight + 'px'
				}).appendTo(canvasParent);

				var ctx = $(chartID);

				var myChart = new Chart(ctx, {
					type: chartType,
					data: {
						labels: xAxisLabels,
						datasets: [{
							label: legendLine1,
							backgroundColor: color1,
							borderColor: color1,
							borderWidth: 2,
							pointRadius: 2,
							data: dataSet1,
							fill: false
						}, {
							label: legendLine2,
							backgroundColor: color2,
							borderColor: color2,
							borderWidth: 2,
							pointRadius: 2,
							data:  dataSet2,
							fill: false
						}]
					},
					options: {
						responsive: false,
						title:{
							display: false
						},
						tooltips: {
							mode: 'index',
							intersect: true,
						},
						hover: {
							mode: 'nearest',
							intersect: hoverInterset
						},
						legend: {
							display: displayLegend
						},
						scales: {
							xAxes: [{
								display: xAxisLabelShow,
								scaleLabel: {
									display: true,
									labelString: 'Timeframe (' + range + ')'
								},
								stacked: isStacked
							}],
							yAxes: [{
								display: yAxisLabelShow,
								scaleLabel: {
									display: true,
									labelString: 'Value'
								},
								stacked: isStacked
							}]
						}
					}
				});
			}
		}
	}

    function qp_datatables(){

        // All datatables must have the class ".datatables" added to their table tag
        var placeholder = '.table-datatable';

        if($(placeholder).length){
            $(placeholder).each(function(){
                $(this).DataTable();
            });
        }
    }

	/**
	 * REQUIRED FUNCTIONS - START
	 */
	
	// DO NOT REMOVE THIS!!!
	qp_required_misc();


	/* Resize certain elements on window resize */
	// Copy the functions loaded above and paste them below. Only works for certain functions
	// Line Charts functions should be copied here too
	$(window).resize(function () {
		waitForFinalEvent(function(){
			// functions here...
			
		}, 500, 'thisstringisunsdsaique');
	});

	/* REQUIRED FUNCTIONS - END */
	
	/**
	 * DEMO USE ONLY - START
	 * Do not copy the content below when you are building your site.
	 */
	qp_line_chart('#login_report');
    qp_datatables();

	/* Resize certain elements on window resize */
	// Copy the functions loaded above and paste them below. Only works for certain functions
	$(window).resize(function () {
		waitForFinalEvent(function(){
			// functions here...
			qp_line_chart('#sales-overview');
			qp_line_chart('#database-load');

			qp_bar_chart('#profit-loss');

			// ecommerce-dashboard.html
			qp_bar_chart('#average-order-value', 'horizontalBar', true);

			// ui-charts.html
			qp_line_chart('#demo-line-chart');
			qp_bar_chart('#demo-bar-chart');
			qp_bar_chart('#demo-stacked-chart');
			qp_bar_chart('#demo-horizontal-chart', 'horizontalBar', true);
		}, 500, 'thisstringisuniquedemo');
	});

	/* DEMO CALLS - END */
});
