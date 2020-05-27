/*
Template Name: Inspinia Ecosheys
Version: 2.0.0
Author: Javier Martinez

/* 01. Handle Page Load - Fade in
------------------------------------------------ */
var handlePageContentView = function() {
    "use strict";
    $.when($('#page-loader').addClass('hide')).done(function() {
        $('#wrapper').addClass('in');
    });
};

/* 02. Handle Scroll to Top Button Activation
------------------------------------------------ */
var handleScrollToTopButton = function() {
    "use strict";
    $(document).scroll( function() {
        var totalScroll = $(document).scrollTop();

        if (totalScroll >= 200) {
            $('[data-click=scroll-top]').addClass('in');
        } else {
            $('[data-click=scroll-top]').removeClass('in');
        }
    });

    $('[data-click=scroll-top]').click(function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $("body").offset().top
        }, 500);
    });
};

/* 03. Handle Panel - Remove / Reload / Collapse / Expand
------------------------------------------------ */
var panelActionRunning = false;
var handlePanelAction = function() {
    "use strict";
    
    if (panelActionRunning) {
        return false;
    }
    panelActionRunning = true;
    
    // remove
    $(document).on('hover', '[data-click=panel-remove]', function(e) {
        $(this).tooltip({
            title: 'Remove',
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
        $(this).tooltip('show');
    });
    $(document).on('click', '[data-click=panel-remove]', function(e) {
        e.preventDefault();
        $(this).tooltip('destroy');
        $(this).closest('.panel').remove();
    });
    
    // collapse
    $(document).on('hover', '[data-click=panel-collapse]', function(e) {
        $(this).tooltip({
            title: 'Collapse / Expand',
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
        $(this).tooltip('show');
    });
    $(document).on('click', '[data-click=panel-collapse]', function(e) {
        e.preventDefault();
        $(this).closest('.panel').find('.panel-body').slideToggle();
    });
    
    // reload
    $(document).on('hover', '[data-click=panel-reload]', function(e) {
        $(this).tooltip({
            title: 'Reload',
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
        $(this).tooltip('show');
    });
    $(document).on('click', '[data-click=panel-reload]', function(e) {
        e.preventDefault();
        var target = $(this).closest('.modal');
        if (!$(target).hasClass('panel-loading')) {
            var targetBody = $(target).find('.modal-content');
            var spinnerHtml = '<div class="panel-loader"><span class="spinner-small"></span></div>';
            $(target).addClass('panel-loading');
            $(targetBody).prepend(spinnerHtml);
            setTimeout(function() {
                $(target).removeClass('panel-loading');
                $(target).find('.panel-loader').remove();
            }, 2000);
        }
    });
    
    // expand
    $(document).on('hover', '[data-click=panel-expand]', function(e) {
        $(this).tooltip({
            title: 'Expand / Compress',
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
        $(this).tooltip('show');
    });
    $(document).on('click', '[data-click=panel-expand]', function(e) {
        e.preventDefault();
        var target = $(this).closest('.panele');
        var targetBody = $(target).find('.panele-body');
		$('#main_page').removeClass('animated fadeInRight');		
		var sizeWidth = $('.tabs-container').width();
		$(window).bind('resize', function() { $("#jqGrid").setGridWidth($(window).width()-80); }).trigger('resize');
        var targetTop = 40;
        if ($(targetBody).length !== 0) {
            var targetOffsetTop = $(target).offset().top;
            var targetBodyOffsetTop = $(targetBody).offset().top;
            targetTop = targetBodyOffsetTop - targetOffsetTop;
        }
        
        if ($('body').hasClass('panel-expand') && $(target).hasClass('panel-expand')) {
            $('body, .panele').removeClass('panel-expand');
            $('.panele').removeAttr('style');
            $(targetBody).removeAttr('style');
			$('#main_page').addClass('animated fadeInRight');
			$(window).bind('resize', function() { $("#jqGrid").setGridWidth(sizeWidth ); }).trigger('resize');
        } else {
            $('body').addClass('panel-expand');
            $(this).closest('.panele').addClass('panel-expand');
            
            if ($(targetBody).length !== 0 && targetTop != 40) {
                var finalHeight = 40;
                $(target).find(' > *').each(function() {
                    var targetClass = $(this).attr('class');
                    
                    if (targetClass != 'panel-heading' && targetClass != 'panele-body') {
                        finalHeight += $(this).height() + 30;
                    }
                });
                if (finalHeight != 40) {
                    $(targetBody).css('top', finalHeight + 'px');
                }
            }
        }
        $(window).trigger('resize');
    });
};

/* Application Controller
------------------------------------------------ */
var App = function () {
	"use strict";
	
	return {
		//main function
		init: function () {
		    this.initPageLoad();
			this.initComponent();
		},
		initPageLoad: function() {
			handlePageContentView();
		},
		initComponent: function() {			
			handleScrollToTopButton();
			handlePanelAction();
		}
  };
}();