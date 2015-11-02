$(function () {

	var rules = {
		    	rules: {
					emp_id: {
						required: true
					},
					username: {
						minlength: 4,
						required: true
					},
					password: {
						minlength: 6,
						required: true
					},
					repassword: {
						minlength: 6,
						required:true
					},
					type_no: {
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