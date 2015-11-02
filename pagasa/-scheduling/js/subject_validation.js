$(function () {
    $.validator.addMethod("unique_subject", 
        function(value, element) {
            var result = false;
            $.ajax({
                type:"GET",
                async: false,
                url: "js/validation_scripts/check_subject_title.php", // script to validate in server side
                data: {subject_title: value},
                success: function(data) {
					//alert(data);
                    result = (data == "true") ? true : false;
                }
            });
            // return true if username is exist in database
            
			return result; 
        }, 
        "This title is already taken."
    );


	var rules = {
		    	rules: {
					subject_title: {
						required: true,
						minlength: 4,
						unique_subject: true
						
					},
					name: {
						minlength: 2,
						required: true
					},
					subject_unit: {
						required: true,
						digits: true
					},
					subject_yr: {
						required: true
					},
					curriculum: {
						required: true
					},
					category: {
						required: true
					}
				},
				messages: {
				  
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#add_subject_form').validate(validationObj);
		
});