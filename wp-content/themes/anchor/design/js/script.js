/*
 * AIT WordPress Theme
 *
 * Copyright (c) 2012, Affinity Information Technology, s.r.o. (http://AitThemes.club)
 */
/* Main Initialization Hook */
jQuery(document).ready(function(){
	/* menu.js initialization */
	desktopMenu();
	responsiveMenu();
	/* menu.js initialization */

	/* portfolio-item.js initialization */
	//portfolioSingleToggles();
	/* portfolio-item.js initialization */

	/* custom.js initialization */
	renameUiClasses();
	removeUnwantedClasses();

	initWPGallery();
	initColorbox();
	initRatings();
	initInfieldLabels();
	initSelectBox();

	notificationClose();
	/* custom.js initialization */

	/* Theme Dependent Functions */
	/* Theme Dependent Functions */
});
/* Main Initialization Hook */

/* Hack Initialization Hook */
jQuery(document).ajaxComplete(function( event, xhr, settings ) {
	// hack for easyreservations form hourly calendar not updating custom selectboxes
	updateSelectboxesOnReservationForm();
});
/* Hack Initialization Hook */

/* Theme Dependenent Functions */
function updateSelectboxesOnReservationForm(){
	var selectId;
	var oldStyle;

	jQuery('form#easyFrontendFormular select').selectbox('detach');
	jQuery('form#easyFrontendFormular select').selectbox({
		onOpen: function(inst){
			selectId = inst.settings.classHolder+"_"+inst.uid;
			jQuery("#"+selectId).attr('style', 'z-index: 100 !important');
		},
		onClose: function(inst){
			jQuery("#"+selectId).delay(100).queue(function(next){
				jQuery(this).removeAttr("style");
				next();
			});
		}
	});
}
/* Theme Dependenent Function */
