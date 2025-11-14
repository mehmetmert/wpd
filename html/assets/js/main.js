jQuery(function($) {

// Map Info

	checkMapInfoPosition();
	function checkMapInfoPosition() {
		if($(window).width() > 1230) {
			$('.contactWidget.homeWidget .infoBlock').css('right', ($(window).width() - 1100)/2 + 'px');	
		}
	}

	$(window).resize(function() {
		checkMapInfoPosition();
	});



// SafirTop

	$('.safirTop').click(function() {
		$('body,html').animate({scrollTop:0},800);
		return false;
	});



// Mobile Social

	$('#mobileHeaderBlock .button.social').click(function() {
		$(this).toggleClass("active");
		$("#mobileSocialContainer").slideToggle();

		$('.toggleMenu').removeClass('active');
		$('#mobileMenuContainer').slideUp();
	});


// Menu
	
	$('#mobileSocialContainer .icons').prepend($('#topSocial .safirSocial').clone());
	$('#mobileMenuContainer .menuContainer').prepend($('#menuGroup').clone());
	$('#mobileMenuContainer .topinfo').append($('#topSearch').clone());

	currentURL = window.location.href;
	currentMenuItem = $('#menu a[href="' + currentURL + '"]');
	parentItem = currentMenuItem.closest('#menu>ul>li');
	parentItem.addClass("active");

	$('#mobileMenuContainer li.menu-item-has-children').each(function () {
		$('<span class="mobilearrow">'+themeIcon("arrow")+'</span>').appendTo($(this));
	});

	$("#mobileMenuContainer .menu-item-has-children>a[href='#'], #mobileMenuContainer .menu-item-has-children>span.mobilearrow").on("click", function (event) {
		event.preventDefault();
		submenu = $(this).closest("li").find(">.sub-menu");
		arrow = $(this).closest("li").find(">.mobilearrow");
		submenu.slideToggle(400);
		arrow.toggleClass("active");
	});


	$("#menu li a").click(function (event) {
		if($(window).width() < 1100 && $(this).parent().hasClass('menu-item-has-children') == false) {
			$("#mobileMenuContainer").slideUp();
			$(".toggleMenu").addClass("active");
		}
	});

	scrollPos = 0;

	$('.toggleMenu').click(function() {

		$("#mobileHeaderBlock .button.social").removeClass("active");
		$("#mobileSocialContainer").slideUp();

		if($('.toggleMenu').hasClass("active")) {
			$('.toggleMenu').css('display','none').fadeIn().removeClass('active');
			$('body,html').animate({scrollTop:0}, 5);
			$('#mobileMenuContainer').slideUp(300, function() {
				$('body,html').animate({scrollTop:scrollPos}, 500);
			});
		} else {
			scrollPos = $('body').scrollTop();
			$('.toggleMenu').css('display','none').fadeIn().addClass('active');
			$('body,html').animate({scrollTop:0}, 5).promise().then(function() {
				$('#mobileMenuContainer').slideDown(300);
			});
		}
	});

	$(window).resize(function() {
		if($(window).width() >= 1100) {
			$("#mobileMenuContainer").hide();
			$(".toggleMenu").removeClass("active");
		}
	});




// Side menu

	$('#sidemenu.left a').hover(function() {
		$(this).closest("li").stop().animate({"left":"140px"});
	}, function() {
		$(this).closest("li").stop().animate({"left":"0"});
	});

	$('#sidemenu.right a').hover(function() {
		$(this).closest("li").stop().animate({"right":"140px"});
	}, function() {
		$(this).closest("li").stop().animate({"right":"0"});
	});

	$('#sidemenu.left').animate({"left":"-140px"});
	$('#sidemenu.right').animate({"right":"-140px"});


	if (!!jQuery('#sidemenu').offset()) {
		var stickyTop = jQuery('#sidemenu').offset().top;
		jQuery(window).scroll(function() {
			var windowTop = jQuery(window).scrollTop();
			if ((stickyTop - 100) < windowTop){
				jQuery('#sidemenu').css({ position: 'fixed', top: '100px' });
			}
			else {
				jQuery('#sidemenu').css('position','absolute');
				jQuery('#sidemenu').css('top',stickyTop);
			}
		});
	}

// THEME ICONS

	const owlNavText = [themeIcon("leftarrow"), themeIcon("rightarrow")];

	function themeIcon(icon) {
		return '<span class="themeicon icon"><svg class="themeicon-'+icon+'"><use href="#themeicon-'+icon+'"></use></svg></span>';
	}

	$(".commentlist .comment-author cite").prepend(themeIcon("user"));
	$(".commentlist .comment-meta a:first-child").prepend(themeIcon("date"));
	$("#comments a.comment-reply-link").prepend(themeIcon("reply2"));
	$("#comments ol.children li .comment-body").prepend(themeIcon("reply1"));
	$(themeIcon("triangle")).prependTo(".safirCustomMenu li a");


// ARRANGEMENTS

	$(".aboutWidget.nonClickable .menuBlock a").removeAttr('href');

	$(".owl-carousel").closest(".safirWidget.homeWidget").find(".mainHeading .text").css("padding-right", "90px");
	$(".owl-carousel").closest(".safirWidget.sidebarWidget").find(".mainHeading .text").css("padding-right", "40px");
	$(".owl-carousel").closest("#related").find(".mainHeading .text").css("padding-right", "90px");

// FAQ

	$(themeIcon("arrow")).prependTo('.safir-faq .question .openclose')
	$('.safir-faq .question').click(function() {
		$(this).stop().toggleClass('active').next().stop().slideToggle(600);
	});

// SAFIR BUTTON

	$('.safirButton').each(function () {
		var text = $(this).html();
		var regex = /icon:(.*?)\s/;
		var icon = text.match(regex);
		if (icon != null) {
			console.log(icon);
			text = text.replace(icon[0], '<div class="safiricon icon"><svg class="safiricon-'+icon[1]+'"><use href="#safiricon-'+icon[1]+'"></use></svg></div>') 
		}
		$(this).html(text);
	});

// Contact Form

	$(".safirForm .wpcf7-text, .safirForm .wpcf7-textarea, #comments .safirForm input[type=text], #comments .safirForm textarea").each(function () {
		let icon = $(this).attr("name")
		if(icon == "author") icon = "user"
		if(icon == "adsoyad") icon = "user"
		if(icon == "telefon") icon = "phone"
		if(icon == "konu") icon = "list"
		if(icon == "mesaj") icon = "comment"
		$(themeIcon(icon)).prependTo($(this).parent());		
	})

// Galleries

	$('#referencesPage .gallery-item img').unwrap();

	$("body").on("keydown", function(e) {
		var $url;
		if(e.key == "ArrowLeft") {
			$url = $('#single.attachment #gallery-links .prev a').attr('href');
		}
		else if(e.key == "ArrowRight") {
			$url = $('#single.attachment #gallery-links .next a').attr('href');
		}
		if($url != null) {
			window.location = $url + "#main";
		}
	});


// CUSTOM CODES

	$("a[rel^='external']").attr("target","_blank");

// EFFECTS

	$('.safirSocial li, .thumb img').hover(function() {
		$(this).stop().animate({'opacity':'0.85'});
	}, function() {
		$(this).stop().animate({'opacity':'1'});
	});

// YOUTUBE VIDEOS

	$(".reading iframe[src*='youtube']").wrap('<div class="safirEmbedContainer"></div>');

// CUSTOM MENU

	$('<div class="icon toggle"></div>').prependTo('.safirCustomMenu.sub-closed>div>ul>li.menu-item-has-children');

	$(".safirCustomMenu .toggle, .safirCustomMenu .menu-item-has-children>a[href='#']").on("click", function (e) {
		e.preventDefault();
		var icon = $(this).closest("li").find(">.toggle");
		icon.toggleClass("active");
		icon.closest('li').find('>.sub-menu').slideToggle();
		if(!icon.hasClass("active")) {
			icon.closest('li').find('.sub-menu').slideUp();
			icon.closest('li').find('.toggle').removeClass("active");
		}
	});

	currentCustomMenuItem = $('.safirCustomMenu a[href="' + currentURL + '"]');
	currentCustomMenuItem.find('.title').css('font-weight', 'bold');
	customParentItem = currentCustomMenuItem.closest('.menu>li');
	customParentItem.find('.sub-menu').slideDown();
	customParentItem.find('.icon.toggle').addClass('active');

// OWL

	$(".categoriesWidget.homeWidget .owl-carousel").owlCarousel({
		mouseDrag: false,
		loop:false,
		navText:owlNavText,
		autoplay:true,
		autoplayTimeout:6000,
		autoplayHoverPause:true,
		rewind:true,
		rewindNav:true,
	    responsive:{
        0:{
            items:1,
            nav:true
        },
        401:{
            items:2,
            nav:true
        },
        769:{
            items:3,
            nav:true
        },
    }
    });

	$(".categoriesWidget.sidebarWidget .owl-carousel").owlCarousel({
		mouseDrag: false,
		loop:false,
		navText:owlNavText,
		autoplay:true,
		autoplayTimeout:6000,
		autoplayHoverPause:true,
		rewind:true,
		rewindNav:true,
	    responsive:{
        0:{
            items:1,
            nav:true
        },
        401:{
            items:2,
            nav:true
        },
        769:{
            items:1,
            nav:true
        },
    }
    });

	$(".advancedPostsWidget1.homeWidget .owl-carousel").owlCarousel({
		mouseDrag: false,
		loop:false,
		navText:owlNavText,
		autoplay:true,
		autoplayTimeout:6000,
		autoplayHoverPause:true,
		rewind:true,
		rewindNav:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			321:{
				items:2,
				nav:true
			},
			501:{
				items:3,
				nav:true
			},
			721:{
				items:4,
				nav:true,
			}
		}
	});

	$(".advancedPostsWidget1.sidebarWidget .owl-carousel").owlCarousel({
		mouseDrag: false,
		loop:false,
		navText:owlNavText,
		autoplay:true,
		autoplayTimeout:6000,
		autoplayHoverPause:true,
		rewind:true,
		rewindNav:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			321:{
				items:2,
				nav:true
			},
			501:{
				items:3,
				nav:true
			},
			721:{
				items:4,
				nav:true,
			},
			769:{
				items:2,
				nav:true,
			}
		}
	});

	$(".referencesWidget.references.homeWidget .owl-carousel").owlCarousel({
		mouseDrag: false,
		loop:false,
		navText:owlNavText,
		autoplay:true,
		autoplayTimeout:6000,
		autoplayHoverPause:true,
		rewind:true,
		rewindNav:true,
		responsive:{
			0:{
				items:2,
				nav:true
			},
			550:{
				items:3,
				nav:true
			},
			769:{
				items:4,
				nav:true
			},
			1000:{
				items:5,
				nav:true,
			}
		}
	});

	$(".referencesWidget.references.sidebarWidget .owl-carousel").owlCarousel({
		mouseDrag: false,
		loop:false,
		navText:owlNavText,
		autoplay:true,
		autoplayTimeout:6000,
		autoplayHoverPause:true,
		rewind:true,
		rewindNav:true,
		responsive:{
			0:{
				items:2,
				nav:true
			},
			550:{
				items:3,
				nav:true
			},
			769:{
				items:2,
				nav:true
			},
		}
	});

	$(".referencesWidget.crew.homeWidget .owl-carousel").owlCarousel({
		mouseDrag: false,
		loop:false,
		navText:owlNavText,
		autoplay:true,
		autoplayTimeout:6000,
		autoplayHoverPause:true,
		rewind:true,
		rewindNav:true,
		responsive:{
			0:{
				items:2,
				nav:true
			},
			550:{
				items:3,
				nav:true
			},
			700:{
				items:4,
				nav:true
			},
			1000:{
				items:5,
				nav:true,
			},
			1170:{
				items:6,
				nav:true,
			}
		}
	});

	$(".referencesWidget.crew.sidebarWidget .owl-carousel").owlCarousel({
		mouseDrag: false,
		loop:false,
		navText:owlNavText,
		autoplay:true,
		autoplayTimeout:6000,
		autoplayHoverPause:true,
		rewind:true,
		rewindNav:true,
		responsive:{
			0:{
				items:2,
				nav:true
			},
			550:{
				items:3,
				nav:true
			},
			700:{
				items:4,
				nav:true
			},
			769:{
				items:2,
				nav:true
			},
		}
	});

	$(".referencesWidget.gallery.homeWidget .owl-carousel").owlCarousel({
		mouseDrag: false,
		loop:false,
		navText:owlNavText,
		autoplay:true,
		autoplayTimeout:6000,
		autoplayHoverPause:true,
		rewind:true,
		rewindNav:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:3,
				nav:true
			},
			1000:{
				items:5,
				nav:true,
			}
		}
	});

	$(".referencesWidget.gallery.sidebarWidget .owl-carousel").owlCarousel({
		mouseDrag: false,
		loop:false,
		navText:owlNavText,
		autoplay:true,
		autoplayTimeout:6000,
		autoplayHoverPause:true,
		rewind:true,
		rewindNav:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
		}
	});

	$("#related .owl-carousel").owlCarousel({
		mouseDrag: false,
		loop:false,
		navText:owlNavText,
		autoplay:true,
		autoplayTimeout:6000,
		autoplayHoverPause:true,
		rewind:true,
		rewindNav:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			480:{
				items:2,
				nav:true
			},
		}
	});

// SIDEBAR

	if($("body").hasClass("stickyMenu")) {
		safirAdditionalMarginTop = 90;
	} else {
		safirAdditionalMarginTop = 30;
	}

	!function(a){a.fn.theiaStickySidebar=function(b){var c={containerSelector:"",additionalMarginTop:safirAdditionalMarginTop,additionalMarginBottom:35,updateSidebarHeight:!0,minWidth:0};b=a.extend(c,b),b.additionalMarginTop=parseInt(b.additionalMarginTop)||0,b.additionalMarginBottom=parseInt(b.additionalMarginBottom)||0,a("head").append(a('<style>.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>')),this.each(function(){function f(){c.fixedScrollTop=0,c.sidebar.css({"min-height":"1px"}),c.stickySidebar.css({position:"static",width:""})}function g(b){var c=b.height();return b.children().each(function(){c=Math.max(c,a(this).height())}),c}var c={};c.sidebar=a(this),c.options=b||{},c.container=a(c.options.containerSelector),0==c.container.size()&&(c.container=c.sidebar.parent()),c.sidebar.parents().css("-webkit-transform","none"),c.sidebar.css({position:"relative",overflow:"visible","-webkit-box-sizing":"border-box","-moz-box-sizing":"border-box","box-sizing":"border-box"}),c.stickySidebar=c.sidebar.find(".theiaStickySidebar"),0==c.stickySidebar.length&&(c.sidebar.find("script").remove(),c.stickySidebar=a("<div>").addClass("theiaStickySidebar").append(c.sidebar.children()),c.sidebar.append(c.stickySidebar)),c.marginTop=parseInt(c.sidebar.css("margin-top")),c.marginBottom=parseInt(c.sidebar.css("margin-bottom")),c.paddingTop=parseInt(c.sidebar.css("padding-top")),c.paddingBottom=parseInt(c.sidebar.css("padding-bottom"));var d=c.stickySidebar.offset().top,e=c.stickySidebar.outerHeight();c.stickySidebar.css("padding-top",1),c.stickySidebar.css("padding-bottom",1),d-=c.stickySidebar.offset().top,e=c.stickySidebar.outerHeight()-e-d,0==d?(c.stickySidebar.css("padding-top",0),c.stickySidebarPaddingTop=0):c.stickySidebarPaddingTop=1,0==e?(c.stickySidebar.css("padding-bottom",0),c.stickySidebarPaddingBottom=0):c.stickySidebarPaddingBottom=1,c.previousScrollTop=null,c.fixedScrollTop=0,f(),c.onScroll=function(c){if(c.stickySidebar.is(":visible")){if(a("body").width()<c.options.minWidth)return void f();if(c.sidebar.outerWidth(!0)+50>c.container.width())return void f();var d=a(document).scrollTop(),e="static";if(d>=c.container.offset().top+(c.paddingTop+c.marginTop-c.options.additionalMarginTop)){var m,h=c.paddingTop+c.marginTop+b.additionalMarginTop,i=c.paddingBottom+c.marginBottom+b.additionalMarginBottom,j=c.container.offset().top,k=c.container.offset().top+g(c.container),l=0+b.additionalMarginTop,n=c.stickySidebar.outerHeight()+h+i<a(window).height();m=n?l+c.stickySidebar.outerHeight():a(window).height()-c.marginBottom-c.paddingBottom-b.additionalMarginBottom;var o=j-d+c.paddingTop+c.marginTop,p=k-d-c.paddingBottom-c.marginBottom,q=c.stickySidebar.offset().top-d,r=c.previousScrollTop-d;"fixed"==c.stickySidebar.css("position")&&(q+=r),q=r>0?Math.min(q,l):Math.max(q,m-c.stickySidebar.outerHeight()),q=Math.max(q,o),q=Math.min(q,p-c.stickySidebar.outerHeight());var s=c.container.height()==c.stickySidebar.outerHeight();e=(s||q!=l)&&(s||q!=m-c.stickySidebar.outerHeight())?d+q-c.sidebar.offset().top-c.paddingTop<=b.additionalMarginTop?"static":"absolute":"fixed"}if("fixed"==e)c.stickySidebar.css({position:"fixed",width:c.sidebar.width(),top:q,left:c.sidebar.offset().left+parseInt(c.sidebar.css("padding-left"))});else if("absolute"==e){var t={};"absolute"!=c.stickySidebar.css("position")&&(t.position="absolute",t.top=d+q-c.sidebar.offset().top-c.stickySidebarPaddingTop-c.stickySidebarPaddingBottom),t.width=c.sidebar.width(),t.left="",c.stickySidebar.css(t)}else"static"==e&&f();"static"!=e&&1==c.options.updateSidebarHeight&&c.sidebar.css({"min-height":c.stickySidebar.outerHeight()+c.stickySidebar.offset().top-c.sidebar.offset().top+c.paddingBottom}),c.previousScrollTop=d}},c.onScroll(c),a(document).scroll(function(a){return function(){a.onScroll(a)}}(c)),a(window).resize(function(a){return function(){a.stickySidebar.css({position:"static"}),a.onScroll(a)}}(c))})}}(jQuery);

	$('#aside').theiaStickySidebar();

// Sticky Menu

	!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof module&&module.exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){var b=Array.prototype.slice,c=Array.prototype.splice,d={topSpacing:0,bottomSpacing:0,className:"is-sticky",wrapperClassName:"sticky-wrapper",center:!1,getWidthFrom:"",widthFromWrapper:!0,responsiveWidth:!1,zIndex:"auto"},e=a(window),f=a(document),g=[],h=e.height(),i=function(){for(var b=e.scrollTop(),c=f.height(),d=c-h,i=b>d?d-b:0,j=0,k=g.length;k>j;j++){var l=g[j],m=l.stickyWrapper.offset().top,n=m-l.topSpacing-i;if(l.stickyWrapper.css("height",l.stickyElement.outerHeight()),n>=b)null!==l.currentTop&&(l.stickyElement.css({width:"",position:"",top:"","z-index":""}),l.stickyElement.parent().removeClass(l.className),l.stickyElement.trigger("sticky-end",[l]),l.currentTop=null);else{var o=c-l.stickyElement.outerHeight()-l.topSpacing-l.bottomSpacing-b-i;if(0>o?o+=l.topSpacing:o=l.topSpacing,l.currentTop!==o){var p;l.getWidthFrom?p=a(l.getWidthFrom).width()||null:l.widthFromWrapper&&(p=l.stickyWrapper.width()),null==p&&(p=l.stickyElement.width()),l.stickyElement.css("width",p).css("position","fixed").css("top",o).css("z-index",l.zIndex),l.stickyElement.parent().addClass(l.className),null===l.currentTop?l.stickyElement.trigger("sticky-start",[l]):l.stickyElement.trigger("sticky-update",[l]),l.currentTop===l.topSpacing&&l.currentTop>o||null===l.currentTop&&o<l.topSpacing?l.stickyElement.trigger("sticky-bottom-reached",[l]):null!==l.currentTop&&o===l.topSpacing&&l.currentTop<o&&l.stickyElement.trigger("sticky-bottom-unreached",[l]),l.currentTop=o}var q=l.stickyWrapper.parent(),r=l.stickyElement.offset().top+l.stickyElement.outerHeight()>=q.offset().top+q.outerHeight()&&l.stickyElement.offset().top<=l.topSpacing;r?l.stickyElement.css("position","absolute").css("top","").css("bottom",0).css("z-index",""):l.stickyElement.css("position","fixed").css("top",o).css("bottom","").css("z-index",l.zIndex)}}},j=function(){h=e.height();for(var b=0,c=g.length;c>b;b++){var d=g[b],f=null;d.getWidthFrom?d.responsiveWidth&&(f=a(d.getWidthFrom).width()):d.widthFromWrapper&&(f=d.stickyWrapper.width()),null!=f&&d.stickyElement.css("width",f)}},k={init:function(b){var c=a.extend({},d,b);return this.each(function(){var b=a(this),e=b.attr("id"),f=e?e+"-"+d.wrapperClassName:d.wrapperClassName,h=a("<div></div>").attr("id",f).addClass(c.wrapperClassName);b.wrapAll(function(){return 0==a(this).parent("#"+f).length?h:void 0});var i=b.parent();c.center&&i.css({width:b.outerWidth(),marginLeft:"auto",marginRight:"auto"}),"right"===b.css("float")&&b.css({"float":"none"}).parent().css({"float":"right"}),c.stickyElement=b,c.stickyWrapper=i,c.currentTop=null,g.push(c),k.setWrapperHeight(this),k.setupChangeListeners(this)})},setWrapperHeight:function(b){var c=a(b),d=c.parent();d&&d.css("height",c.outerHeight())},setupChangeListeners:function(a){if(window.MutationObserver){var b=new window.MutationObserver(function(b){(b[0].addedNodes.length||b[0].removedNodes.length)&&k.setWrapperHeight(a)});b.observe(a,{subtree:!0,childList:!0})}else a.addEventListener("DOMNodeInserted",function(){k.setWrapperHeight(a)},!1),a.addEventListener("DOMNodeRemoved",function(){k.setWrapperHeight(a)},!1)},update:i,unstick:function(b){return this.each(function(){for(var b=this,d=a(b),e=-1,f=g.length;f-->0;)g[f].stickyElement.get(0)===b&&(c.call(g,f,1),e=f);-1!==e&&(d.unwrap(),d.css({width:"",position:"",top:"","float":"","z-index":""}))})}};window.addEventListener?(window.addEventListener("scroll",i,!1),window.addEventListener("resize",j,!1)):window.attachEvent&&(window.attachEvent("onscroll",i),window.attachEvent("onresize",j)),a.fn.sticky=function(c){return k[c]?k[c].apply(this,b.call(arguments,1)):"object"!=typeof c&&c?void a.error("Method "+c+" does not exist on jQuery.sticky"):k.init.apply(this,arguments)},a.fn.unstick=function(c){return k[c]?k[c].apply(this,b.call(arguments,1)):"object"!=typeof c&&c?void a.error("Method "+c+" does not exist on jQuery.sticky"):k.unstick.apply(this,arguments)},a(function(){setTimeout(i,0)})});

	topMargin = 0
	if($("body.desktop").hasClass("admin-bar")) {
		topMargin = 32;
	}
	if($("body.mobile").hasClass("admin-bar")) {
		topMargin = 0;
	}
	$('.stickyMenu #header').sticky({ topSpacing: topMargin, zIndex: 9990 });
	
// LAZY
	
	!function(t){t.fn.unveil=function(i,e){var n,r=t(window),o=i||0,u=window.devicePixelRatio>1?"data-src-retina":"data-src",s=this;function l(){var i=s.filter(function(){var i=t(this);if(!i.is(":hidden")){var e=r.scrollTop(),n=e+r.height(),u=i.offset().top;return u+i.height()>=e-o&&u<=n+o}});n=i.trigger("unveil"),s=s.not(n)}return this.one("unveil",function(){var t=this.getAttribute(u);(t=t||this.getAttribute("data-src"))&&(this.setAttribute("src",t),"function"==typeof e&&e.call(this))}),r.on("scroll.unveil resize.unveil lookup.unveil",l),l(),this}}(window.jQuery||window.Zepto);


	$('img.lazy').unveil(0, function() {
		$(this).load(function() {
			this.style.opacity = 1;
		});
	});

	$(".crewModal img").trigger("unveil");

// Gallery Hover

	function isImageLink(url) {
		return /\.(jpg|jpeg|png|webp|avif|gif|svg)$/.test(url);
	}

	$(".wp-block-gallery figure a, .reading div.gallery .gallery-item a").each(function () {
		if (isImageLink($(this).attr("href"))) {
			$(themeIcon("full")).appendTo($(this))
		} else {
			$(themeIcon("link")).appendTo($(this))
		}
	})

// Whatsapp
			
	whatsappCount = localStorage.getItem("whatsappCount")
	if (whatsappCount == null) {
		$(".whatsappButton .count").fadeIn()
	}

	$(".whatsappButton").on("click", function() {
		$("#whatsappBlock").addClass("opened")
		$(".whatsappButton .count").fadeOut()
		localStorage.setItem("whatsappCount", "none")
	});

	$("#whatsappBlock .close, #whatsappBlock .reply").on("click", function() {
		$("#whatsappBlock").removeClass("opened");
	});




// END
});
