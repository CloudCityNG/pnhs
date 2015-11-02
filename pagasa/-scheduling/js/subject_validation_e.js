$(function () {
    $.validator.addMethod("e_unique_subject", 
        function(value, element) {
            var result = false;
			var code = $("#subject_code").val();
			
            $.ajax({
                type:"GET",
                async: false,
                url: "js/validation_scripts/check_subject_title_e.php", // script to validate in server side
                data: {subject_title: value, subject_code: code},
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
					e_subject_title: {
						required: true,
						minlength: 4,
						e_unique_subject: true
						
					},
					e_name: {
						minlength: 2,
						required: true
					},
					e_subject_unit: {
						required: true,
						number: true
					},
					e_subject_yr: {
						required: true
					},
					e_curriculum: {
						required: true
					},
					e_category: {
						required: true
					}
				},
				messages: {
				  
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#edit_subject_form').validate(validationObj);
		
});