$(function () {
	
	
	/*--------------------------------------------------
	Plugin: Lightbox
	--------------------------------------------------*/	
	
	$('.lightbox-type').lightbox ();
	
	/*--------------------------------------------------
	Plugin: Msg Growl
	--------------------------------------------------*/	
	$('.growl-type').live ('click', function (e) {
		$.msgGrowl ({
			type: $(this).attr ('data-type')
			, title: 'Header'
			, text: 'Lorem ipsum dolor sit amet, consectetur ipsum dolor sit amet, consectetur.'
		});
	});
	
	
	
	/*--------------------------------------------------
	Plugin: Msg Box
	--------------------------------------------------*/
	
	$('.msgbox-alert').live ('click', function (e) {
		$.msgbox(" There are no returning students becuase there is no previous school year!");
	});
	
	$('.msgbox-info').live ('click', function (e) {
		$.msgbox("jQuery is a fast and concise JavaScript Library that simplifies HTML document traversing, event handling, animating, and Ajax interactions for rapid web development.", {type: "info"});
	});
	
	$('.msgbox-error').live ('click', function (e) {
		$.msgbox("Already has an image.", {type: "error"});
	});
	
	$('.msgbox-confirm').live ('click', function (e) {
		$.msgbox("Are you sure that you want to permanently delete the selected element?", {
		  type: "confirm",
		  buttons : [
		    {type: "submit", value: "Yes"},
		    {type: "submit", value: "No"},
		    {type: "cancel", value: "Cancel"}
		  ]
		}, function(result) {
		  	$("#result2").text(result);
			});
	});
	
	$('.msgbox-prompt').live ('click', function (e) {
		$.msgbox("Insert your name below:", {
		  type: "prompt"
		}, function(result) {
		  if (result) {
		    alert("Hello " + result);
		  }
		});
	});
	
});