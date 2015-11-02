$(function () {

	var rules = {
		    	rules: {
					
			        privilege_id: {
			      	required: true
			      }
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#validation-form').validate(validationObj);
		
});