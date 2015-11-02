$(function () {

	var rules = {
		    	rules: {
					emp_id: {
						required: true
					},
					username: {
						minlength: 2,
						required: true
					},
					password: {
						required: true
					},
					repassword: {
						required:true
					},
					type: {
						required: true
					},
			      privilege_id: {
			      	required: true
			      }
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#validation-form').validate(validationObj);
		
});