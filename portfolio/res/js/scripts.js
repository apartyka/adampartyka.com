$(document).ready(function() {
	var images = $("#chap7, #chap13, #bnk_me, #clear_dui, #tlaw, #cs_dash, #cs_todo, #sales_admin, #ta_crm, #cc_initials, #infra, #wedding");
	images.fancybox({
		'titlePosition'	: 'over'
	});
	
	$('a[rel=external]').attr('target','_blank');
	
	$("#utility a").bind({  
		mouseover: function() {
	         $(this).addClass("border");
	    },  
	    mouseout: function() {  
	         $(this).removeClass("border");  
	    }  
	});
	
});