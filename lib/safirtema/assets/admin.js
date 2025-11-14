jQuery(document).ready(function($) {

// CATEGORY SELECT

	$('select.categorySelect').each(function () {
		if($(this).val() == 'include' || $(this).val() == 'exclude') {
			$(this).parent().next().show();
		} else {
			$(this).parent().next().hide();
		}
	});

	$(document).on('change', 'select.categorySelect', function(){
		if($(this).val() == 'include' || $(this).val() == 'exclude') {
			$(this).parent().next().show();
		} else {
			$(this).parent().next().hide();
		}
	});

// ICON SELECTOR
	
	$("body").on("focus", ".safirAdminIconSelector .iconInput", function() {
		$(this).closest(".safirAdminIconSelector").find(".iconList").slideDown()
		$(this).closest(".safirAdminIconSelector").find(".iconList .item").show()
	});

	$("body").on("click", ".safirAdminIconSelector .iconList .close", function() {
		$(this).closest(".safirAdminIconSelector .iconList").slideUp();
	});

	$("body").on("click", ".safirAdminIconSelector .iconList .item", function() {
		var val = $(this).attr("data-icon");
		var mainDiv = $(this).closest(".safirAdminIconSelector");
		
		mainDiv.find(".iconList .item").removeClass("active");
		$(this).addClass("active");
		mainDiv.find(".iconList").slideUp();

		mainDiv.find(".iconInput").val(val).trigger('change');
		mainDiv.find(".iconSelected .safiricon").find("use").attr("href", "#safiricon-" + val);
	});

	$("body").on("keyup", ".safirAdminIconSelector .iconInput", function() {
		var val = $(this).val();
		var mainDiv = $(this).closest(".safirAdminIconSelector");
		// selectedIcon Element
		mainDiv.find(".iconSelected .safiricon").removeClass().addClass("safiricon " + val).find("use").attr("href", "#safiricon-" + val);
		// Icons Div Search Phrase
		if (val != "") {
			mainDiv.find(".iconList .item").hide()
			mainDiv.find('.iconList .item[data-icon*="'+val+'"]').show()
		} else {
			mainDiv.find(".iconList .item").show()
		}
		// Icons Div Activate Icon
		mainDiv.find(".iconList .item").removeClass("active")
		mainDiv.find('.iconList .item[data-icon="'+val+'"]').addClass("active")
	});

// WIDGETS

	$("body").on("click", ".safirWidgetBox .title", function() {
		$(this).parent().toggleClass("active");
		$(this).next().slideToggle();
	});
	$("body").on("click", "a.showAllBoxes", function(e) {
		e.preventDefault();
		$(this).closest(".widget-content").find(".safirWidgetBox").addClass("active").find(".data").slideDown();
	});
	$("body").on("click", "a.hideAllBoxes", function(e) {
		e.preventDefault();
		$(this).closest(".widget-content").find(".safirWidgetBox").removeClass("active").find(".data").slideUp();
	});

// COLORS
	
	function initColorPicker( widget ) {
		widget.find( '.color-picker' ).wpColorPicker( {
			change: _.throttle( function() { // For Customizer
				$(this).trigger( 'change' );
			}, 3000 )
		});
	}

	function onFormUpdate( event, widget ) {
		initColorPicker( widget );
	}

	$( document ).on( 'widget-added widget-updated', onFormUpdate );

	$( document ).ready( function() {
		$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
			initColorPicker( $( this ) );
		} );
	});
	
});
