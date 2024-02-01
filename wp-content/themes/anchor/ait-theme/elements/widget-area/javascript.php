<script id="{$htmlId}-script">
jQuery(window).load(function(){
	{if $options->theme->general->progressivePageLoading}
		if(!isResponsive(1024)){
			jQuery("#{!$htmlId}").waypoint(function(){
				jQuery("#{!$htmlId}").addClass('load-finished');
			}, { triggerOnce: true, offset: "95%" });
		} else {
			jQuery("#{!$htmlId}").addClass('load-finished');
		}
	{else}
		jQuery("#{!$htmlId}").addClass('load-finished');
	{/if}
});

jQuery(window).resize(function(){
	widgetAreaCheckResponsive();
});

jQuery(document).ready(function(){
	jQuery("#{!$htmlId}").find('.minimize-toggle').click(function(){
		if(typeof jQuery.cookie("widget-area-minimized") == "undefined"){
			jQuery("#{!$htmlId}").addClass("widget-area-minimized");
			jQuery("#{!$htmlId} .grid-main").delay(500).queue(function(next){
				jQuery(this).hide();
				next();
			});
			jQuery.cookie('widget-area-minimized', 'true');
		} else {
			jQuery("#{!$htmlId} .grid-main").show().delay(250).queue(function(next){
				jQuery("#{!$htmlId}").removeClass("widget-area-minimized");
				next();
			});
			jQuery.removeCookie('widget-area-minimized');
		}
	});

	if(typeof jQuery.cookie("widget-area-minimized") == "undefined"){
		jQuery("#{!$htmlId} .grid-main").show();
		jQuery("#{!$htmlId}").removeClass("widget-area-minimized");
	} else {
		jQuery("#{!$htmlId}").addClass("widget-area-minimized");
		jQuery("#{!$htmlId} .grid-main").hide();
	}

	widgetAreaCheckResponsive();
});

function widgetAreaCheckResponsive(){
	if(jQuery("#{!$htmlId}").data("floating")){
		if(isResponsive(640)){
			jQuery("#{!$htmlId}").removeClass("widget-area-floating").addClass("widget-area-static");
			jQuery("#{!$htmlId} .grid-main").show();
		} else {
			jQuery("#{!$htmlId}").addClass("widget-area-floating").removeClass("widget-area-static");
			if(jQuery("#{!$htmlId}").hasClass('widget-area-minimized')){
				jQuery("#{!$htmlId} .grid-main").hide();
			} else {
				jQuery("#{!$htmlId} .grid-main").show();
			}
		}
	}
}
</script>