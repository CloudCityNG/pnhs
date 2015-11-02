$(function () {
    


	var rules = {
		    	rules: {
					e_employee: {
						required: true
					},
					e_max_load: {
						required: true,
						number: true
					}
				},
				messages: {
				  
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#edit_teacher_form').validate(validationObj);
		
});