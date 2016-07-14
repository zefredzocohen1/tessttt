$(function() {
	
/* Form related plugins
================================================== */

	//===== Input limiter =====//
	
	$('.lim').inputlimiter({
		limit: 100
		//boxClass: 'limBox',
		//boxAttach: false
	});


	//===== Multiple select with dropdown =====//
	
	$(".chzn-select").chosen(); 
	
	
	//===== Placeholder =====//
	
	$('input[placeholder], textarea[placeholder]').placeholder();
	
	
	//===== ShowCode plugin for <pre> tag =====//
	
	$('.showCode').sourcerer('js html css php'); // Display all languages
	$('.showCodeJS').sourcerer('js'); // Display JS only
	$('.showCodeHTML').sourcerer('html'); // Display HTML only
	$('.showCodePHP').sourcerer('php'); // Display PHP only
	$('.showCodeCSS').sourcerer('css'); // Display CSS only
	
	
	//===== Masked input =====//
	
	$.mask.definitions['~'] = "[+-]";
	$(".maskDate").mask("99/99/9999",{completed:function(){alert("Callback when completed");}});
	$(".maskPhone").mask("(999) 999-9999");
	$(".maskPhoneExt").mask("(999) 999-9999? x99999");
	$(".maskIntPhone").mask("+33 999 999 999");
	$(".maskTin").mask("99-9999999");
	$(".maskSsn").mask("999-99-9999");
	$(".maskProd").mask("a*-999-a999", { placeholder: " " });
	$(".maskEye").mask("~9.99 ~9.99 999");
	$(".maskPo").mask("PO: aaa-999-***");
	$(".maskPct").mask("99%");
	
	
	//===== Tags =====//	
		
	$('#tags').tagsInput({width:'100%'});
	
	
	//===== Autogrowing textarea =====//
	
	$(".autoGrow").autoGrow();



/* General stuff
================================================== */


	//===== Left navigation styling =====//
	
	$('li.this').prev('li').css('border-bottom-color', '#2c3237');
	$('li.this').next('li').css('border-top-color', '#2c3237');
	
	
	//===== User nav dropdown =====//		
	
	$('.dd').click(function () {
		$('.userDropdown').slideToggle(200);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("dd"))
		$(".userDropdown").slideUp(200);
	});
	  
	  
	  
	//===== Statistics row dropdowns =====//	
		
	$('.ticketsStats > h2 a').click(function () {
		$('#s1').slideToggle(150);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("ticketsStats"))
		$("#s1").slideUp(150);
	});
	
	
	$('.visitsStats > h2 a').click(function () {
		$('#s2').slideToggle(150);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("visitsStats"))
		$("#s2").slideUp(150);
	});
	
	
	$('.usersStats > h2 a').click(function () {
		$('#s3').slideToggle(150);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("usersStats"))
		$("#s3").slideUp(150);
	});
	
	
	$('.ordersStats > h2 a').click(function () {
		$('#s4').slideToggle(150);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("ordersStats"))
		$("#s4").slideUp(150);
	});
	
	
	
	//===== Collapsible elements management =====//
	
	$('.exp').collapsible({
		defaultOpen: 'current',
		cookieName: 'navAct',
		cssOpen: 'active',
		cssClose: 'inactive',
		speed: 200
	});
	
	$('.opened').collapsible({
		defaultOpen: 'opened,toggleOpened',
		cssOpen: 'inactive',
		cssClose: 'normal',
		speed: 200
	});
	
	$('.closed').collapsible({
		defaultOpen: '',
		cssOpen: 'inactive',
		cssClose: 'normal',
		speed: 200
	});
	
	
	$('.goTo').collapsible({
		defaultOpen: 'openedDrop',
		cookieName: 'smallNavAct',
		cssOpen: 'active',
		cssClose: 'inactive',
		speed: 100
	});
	
	/*$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("smalldd"))
		$(".smallDropdown").slideUp(200);
	});*/



	
	//===== Middle navigation dropdowns =====//
	
	$('.mUser').click(function () {
		$('.mSub1').slideToggle(100);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("mUser"))
		$(".mSub1").slideUp(100);
	});
	
	$('.mMessages').click(function () {
		$('.mSub2').slideToggle(100);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("mMessages"))
		$(".mSub2").slideUp(100);
	});
	
	$('.mFiles').click(function () {
		$('.mSub3').slideToggle(100);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("mFiles"))
		$(".mSub3").slideUp(100);
	});
	
	$('.mOrders').click(function () {
		$('.mSub4').slideToggle(100);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("mOrders"))
		$(".mSub4").slideUp(100);
	});



	//===== User nav dropdown =====//		
	
	$('.sidedd').click(function () {
		$('.sideDropdown').slideToggle(200);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("sidedd"))
		$(".sideDropdown").slideUp(200);
	});
	
	
	//$('.smalldd').click(function () {
	//	$('.smallDropdown').slideDown(200);
	//});





/* Tables
================================================== */

	//===== Check all checbboxes =====//
	$(".titleIcon input:checkbox").click(function()
	{
		var checkedStatus = this.checked;
		$("#checkAll tbody tr td:first-child input:checkbox").each(function()
		{
			var tr = $(this).parents('tr');
			this.checked = checkedStatus;
			
			if (checkedStatus == this.checked)
			{
				$(this).closest('.checker > span').removeClass('checked');
				tr.removeClass('active')
			}
			if (this.checked)
			{
				$(this).closest('.checker > span').addClass('checked');
				tr.addClass('active')
			}
		});
	});	
	
	// Add class select when checked
	$("#checkAll tbody tr td:first-child input:checkbox").change(function()
	{
		var tr = $(this).parents('tr');
		(this.checked) ? tr.addClass('active') : tr.removeClass('active');
	});

	
	
	//===== Resizable columns =====//
	
	$("#res, #res1").colResizable({
		liveDrag:true,
		draggingClass:"dragging" 
	});
	  
	  
	  
	//===== Sortable columns =====//
	
	$("table").tablesorter();
	
	
	
	//===== Dynamic data table =====//
	
	oTable = $('.dTable').dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sDom": '<""l>t<"F"fp>'
	});





/* # Pickers
================================================== */


	//===== Color picker =====//
	
	$('#cPicker').ColorPicker({
		color: '#e62e90',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#flatPicker').ColorPicker({flat: true});
	
	
	
	//===== Time picker =====//
	
	$('.timepicker').timeEntry({
		show24Hours: true, // 24 hours format
		showSeconds: true, // Show seconds?
		spinnerImage: 'images/forms/spinnerUpDown.png', // Arrows image
		spinnerSize: [19, 30, 0], // Image size
		spinnerIncDecOnly: true // Only up and down arrows
	});
	
	
	//===== Datepickers =====//
	
	$( ".datepicker" ).datepicker({ 
		defaultDate: +7,
		autoSize: true,
		dateFormat: 'dd-mm-yy',
	});	
	
	$( ".datepickerInline" ).datepicker({ 
		defaultDate: +7,
		autoSize: true,
		dateFormat: 'dd-mm-yy',
		numberOfMonths: 1
	});	


//===== Progress bars =====//
	
	// default mode
	$('#progress1').anim_progressbar();
	
	// from second #5 till 15
	var iNow = new Date().setTime(new Date().getTime() + 5 * 1000); // now plus 5 secs
	var iEnd = new Date().setTime(new Date().getTime() + 15 * 1000); // now plus 15 secs
	$('#progress2').anim_progressbar({start: iNow, finish: iEnd, interval: 1});
	
	// jQuery UI progress bar
	$( "#progress" ).progressbar({
			value: 80
	});
	
	
	
	//===== Animated progress bars =====//
	
	var percent = $('.progressG').attr('title');
	$('.progressG').animate({width: percent},1000);
	
	var percent = $('.progressO').attr('title');
	$('.progressO').animate({width: percent},1000);
	
	var percent = $('.progressB').attr('title');
	$('.progressB').animate({width: percent},1000);
	
	var percent = $('.progressR').attr('title');
	$('.progressR').animate({width: percent},1000);
	
	
	
	
	var percent = $('#bar1').attr('title');
	$('#bar1').animate({width: percent},1000);
	
	var percent = $('#bar2').attr('title');
	$('#bar2').animate({width: percent},1000);
	
	var percent = $('#bar3').attr('title');
	$('#bar3').animate({width: percent},1000);
	
	var percent = $('#bar4').attr('title');
	$('#bar4').animate({width: percent},1000);
	
	var percent = $('#bar5').attr('title');
	$('#bar5').animate({width: percent},1000);

	var percent = $('#bar6').attr('title');
	$('#bar6').animate({width: percent},1000);

	var percent = $('#bar7').attr('title');
	$('#bar7').animate({width: percent},1000);

	var percent = $('#bar8').attr('title');
	$('#bar8').animate({width: percent},1000);

	var percent = $('#bar9').attr('title');
	$('#bar9').animate({width: percent},1000);


/* UI stuff
================================================== */

	//===== Tooltips =====//
	
	$('.tipN').tipsy({gravity:'n', fade:false, html:true});
	$('.tipS').tipsy({gravity:'s', fade:false, html:true});
	$('.tipW').tipsy({gravity:'w', fade:false, html:true});
	$('.tipE').tipsy({gravity:'e', fade:false, html:true});
	
		
	
	//===== Accordion =====//		
	
	$('div.menu_body:eq(0)').show();
	$('.acc .title:eq(0)').show().css({color:"#2B6893"});
	
	$(".acc .title").click(function() {	
		$(this).css({color:"#2B6893"}).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
		$(this).siblings().css({color:"#404040"});
	});
	
	
	//===== Tabs =====//
		
	$.fn.contentTabs = function(){ 
		$(this).find(".tab_content").hide(); //Hide all content
		$(this).find("ul.tabs li:first").addClass("activeTab").show(); //Activate first tab
		$(this).find(".tab_content:first").show(); //Show first tab content
	
		$("ul.tabs li").click(function() {
			$(this).parent().parent().find("ul.tabs li").removeClass("activeTab"); //Remove any "active" class
			$(this).addClass("activeTab"); //Add "active" class to selected tab
			$(this).parent().parent().find(".tab_content").hide(); //Hide all tab content
			var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
			$(activeTab).show(); //Fade in the active content
			return false;
		});
	};
	//$("div[class^='widget']").contentTabs(); //Run function on any div with class name of "Content Tabs"
	
	
	
	//===== Notification boxes =====//
	
	$(".hideit").click(function()
	{
		$(this).fadeOut();
	});	
	
	
	
	//===== Image gallery control buttons =====//
	
	$(".gallery ul li").hover(
		function() { $(this).children(".actions").show("fade", 200); },
		function() { $(this).children(".actions").hide("fade", 200); }
	);
	
	
	//===== Spinner options =====//
	$.fn.spinner = function(){};
	
	var itemList = [
		{url: "http://ejohn.org", title: "John Resig"},
		{url: "http://bassistance.de/", title: "J&ouml;rn Zaefferer"},
		{url: "http://snook.ca/jonathan/", title: "Jonathan Snook"},
		{url: "http://rdworth.org/", title: "Richard Worth"},
		{url: "http://www.paulbakaus.com/", title: "Paul Bakaus"},
		{url: "http://www.yehudakatz.com/", title: "Yehuda Katz"},
		{url: "http://www.azarask.in/", title: "Aza Raskin"},
		{url: "http://www.karlswedberg.com/", title: "Karl Swedberg"},
		{url: "http://scottjehl.com/", title: "Scott Jehl"},
		{url: "http://jdsharp.us/", title: "Jonathan Sharp"},
		{url: "http://www.kevinhoyt.org/", title: "Kevin Hoyt"},
		{url: "http://www.codylindley.com/", title: "Cody Lindley"},
		{url: "http://malsup.com/jquery/", title: "Mike Alsup"}
	];
	
	var opts = {
		'sDec': {decimals:2},
		'sStep': {stepping: 0.25},
		'sCur': {currency: '$'},
		'sInline': {},
		'sLink': {
			//
			// Two methods of adding external items to the spinner
			//
			// method 1: on initalisation call the add method directly and format html manually
			init: function(e, ui) {
				for (var i=0; i<itemList.length; i++) {
					ui.add('<a href="'+ itemList[i].url +'" target="_blank">'+ itemList[i].title +'</a>');
				}
			},
	
			// method 2: use the format and items options in combination
			format: '<a href="%(url)" target="_blank">%(title)</a>',
			items: itemList
		}
	};
	/*
	for (var n in opts)
		$("#"+n).spinner(opts[n]);
	*/
	
	$("button").click(function(e){
		var ns = $(this).attr('id').match(/(s\d)\-(\w+)$/);
		if (ns != null)
			$('#'+ns[1]).spinner( (ns[2] == 'create') ? opts[ns[1]] : ns[2]);
	});
	
	
	
	//===== UI dialog =====//
	
	$( "#dialog-message" ).dialog({
		autoOpen: false,
		modal: true,
		buttons: {
			Ok: function() {
				$( this ).dialog( "close" );
			}
		}
	});
	
	$( "#opener" ).click(function() {
		$( "#dialog-message" ).dialog( "open" );
		return false;
	});	
		
	
	
	//===== Breadcrumbs =====//
	
	$('#breadcrumbs').xBreadcrumbs();
	
		
		
	//===== jQuery UI sliders =====//	
	
	$( ".uiSlider" ).slider(); /* Usual slider */
	
	
	$( ".uiSliderInc" ).slider({ /* Increments slider */
		value:100,
		min: 0,
		max: 500,
		step: 50,
		slide: function( event, ui ) {
			$( "#amount" ).val( "$" + ui.value );
		}
	});
	$( "#amount" ).val( "$" + $( ".uiSliderInc" ).slider( "value" ) );
		
		
	$( ".uiRangeSlider" ).slider({ /* Range slider */
		range: true,
		min: 0,
		max: 500,
		values: [ 75, 300 ],
		slide: function( event, ui ) {
			$( "#rangeAmount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});
	$( "#rangeAmount" ).val( "$" + $( ".uiRangeSlider" ).slider( "values", 0 ) +" - $" + $( ".uiRangeSlider" ).slider( "values", 1 ));
			
			
	$( ".uiMinRange" ).slider({ /* Slider with minimum */
		range: "min",
		value: 37,
		min: 1,
		max: 700,
		slide: function( event, ui ) {
			$( "#minRangeAmount" ).val( "$" + ui.value );
		}
	});
	$( "#minRangeAmount" ).val( "$" + $( ".uiMinRange" ).slider( "value" ) );
	
	
	$( ".uiMaxRange" ).slider({ /* Slider with maximum */
		range: "max",
		min: 1,
		max: 100,
		value: 20,
		slide: function( event, ui ) {
			$( "#maxRangeAmount" ).val( ui.value );
		}
	});
	$( "#maxRangeAmount" ).val( $( ".uiMaxRange" ).slider( "value" ) );	



	//===== Form elements styling =====//
	
	$("input:checkbox, input:radio, input:file").uniform();

	
});