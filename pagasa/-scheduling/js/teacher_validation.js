$(function () {
    


	var rules = {
		    	rules: {
					employee: {
						required: true
					},
					max_load: {
						required: true,
						number: true
					}
				},
				messages: {
				  
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#add_teacher_form').validate(validationObj);
		
});