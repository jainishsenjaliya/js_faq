/*
 *  (c) 2014-2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
 *  All rights reserved 
 *  Togglae FAQ
*/

jQuery.noConflict();

jQuery(document).ready(function(jQuery){

	var plus		= 'tx-jsfaq-toggle-plus';
	var minus		= 'tx-jsfaq-toggle-minus'
	var disable		= 'disable';

	var showAll		= '.tx-jsfaq-toggle-show-all';
	var hideAll		= '.tx-jsfaq-toggle-hide-all';

	var showCatAll	= '.tx-jsfaq-toggle-show-category-all';
	var hideCatAll	= '.tx-jsfaq-toggle-hide-category-all';

	var header		= '.tx-jsfaq-header';
	var catBox		= '.category-box-';

	var content		= '.tx-jsfaq-details';


	var effectDuration = 250;

	jQuery(header).click(function() {

		jQuery(showAll+", "+showCatAll).removeClass("disabled");
		jQuery(hideAll+", "+hideCatAll).removeClass("disabled");

		jQuery(showAll+", "+showCatAll).removeAttr("disabled","disabled");
		jQuery(hideAll+", "+hideCatAll).removeAttr("disabled","disabled");

		if(jQuery(this).next().css('display')=='block') {
			jQuery(this).addClass(plus).removeClass(minus);
		}else {
			jQuery(this).addClass(minus).removeClass(plus);
		}
		jQuery(this).next().slideToggle(effectDuration);

		return false;

	}).next().hide();

	jQuery('.tx-jsfaq-toggle-show-all').click(function() {

		var id = jQuery(this).parent().parent().attr("id");

		jQuery("#"+id+" "+showAll).attr("disabled","disabled");
		jQuery("#"+id+" "+hideAll).removeAttr("disabled","disabled");

		jQuery("#"+id+" "+showAll).addClass("disabled");
		jQuery("#"+id+" "+hideAll).removeClass("disabled");

		jQuery("#"+id+" "+header).addClass(minus).removeClass(plus);
		jQuery("#"+id+" "+content).show(effectDuration);
		return false;
	});
	jQuery('.tx-jsfaq-toggle-hide-all').click(function() {

		var id = jQuery(this).parent().parent().attr("id");
		
		jQuery("#"+id+" "+hideAll).attr("disabled","disabled");
		jQuery("#"+id+" "+showAll).removeAttr("disabled","disabled");

		jQuery("#"+id+" "+hideAll).addClass("disabled");
		jQuery("#"+id+" "+showAll).removeClass("disabled");

		jQuery("#"+id+" "+header).addClass(plus).removeClass(minus);
		jQuery("#"+id+" "+content).hide(effectDuration);
		return false;
	});

	jQuery('.tx-jsfaq-toggle-show-category-all').click(function() {

		var id = jQuery(this).parent().parent().parent().attr("id");

		jQuery(this).attr("disabled","disabled");
		jQuery(this).next().removeAttr("disabled","disabled");

		jQuery(this).addClass("disabled");
		jQuery(this).next().removeClass("disabled");

		var cat = jQuery(this).attr("category");

		jQuery("#"+id+" "+catBox+cat+" "+".tx-jsfaq-box "+ header).addClass(minus).removeClass(plus);
		jQuery("#"+id+" "+catBox+cat+" "+".tx-jsfaq-box "+ content).show(effectDuration);
		return false;
	});

	jQuery('.tx-jsfaq-toggle-hide-category-all').click(function() {

		var id = jQuery(this).parent().parent().parent().attr("id");
		
		jQuery(this).attr("disabled","disabled");
		jQuery(this).prev().removeAttr("disabled","disabled");

		jQuery(this).addClass("disabled");
		jQuery(this).prev().removeClass("disabled");

		var cat = jQuery(this).attr("category");

		jQuery("#"+id+" "+catBox+cat+" "+".tx-jsfaq-box "+ header).addClass(plus).removeClass(minus);
		jQuery("#"+id+" "+catBox+cat+" "+".tx-jsfaq-box "+ content).hide(effectDuration);
		return false;
	});

	
	if(!jQuery('.f3-widget-paginator li.current').length){
		jQuery('.f3-widget-paginator').remove();
	}

});