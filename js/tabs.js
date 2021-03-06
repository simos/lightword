jQuery.fn.tabs = function (options){
	var settings = {
		linkClass : 'tabs',
		containerClass : 'tab-content',
		linkSelectedClass : 'selected',
		containerSelectedClass : 'selected',
		onComplete : false
	}
	
	jQuery.extend(settings,options);
	
	jQuery('.'+settings.linkClass).each(function(i){
		jQuery(this).attr('rel',settings.containerClass+i);
	});
	jQuery('.'+settings.containerClass).each(function(i){
		jQuery(this).attr('id',settings.containerClass+i);
	});
	
	jQuery('.'+settings.linkClass).bind('click',function(){
		jQuery('.'+settings.linkClass+'.'+settings.linkSelectedClass).removeClass(settings.linkSelectedClass);
		jQuery(this).addClass(settings.linkSelectedClass);
		jQuery('.'+settings.containerClass+'.'+settings.containerSelectedClass).removeClass(settings.containerSelectedClass);
		jQuery('#'+jQuery(this).attr('rel')).addClass(settings.containerSelectedClass);
		if(settings.onComplete){
			settings.onComplete();
		}
		return false;
	});
}