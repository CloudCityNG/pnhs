$(function () {
    $.validator.addMethod("unique_category", 
        function(value, element) {
            var result = false;
			var id = $("#category_id").val();
            $.ajax({
                type:"GET",
                async: false,
                url: "js/validation_scripts/check_category_e.php", // script to validate in server side
                data: {category_name: value, category_id:id},
                success: function(data) {
					//alert(data);
                    result = (data == "true") ? true : false;
                }
            });
            // return true if username is exist in database
            
			return result; 
        }, 
        "This name is already taken."
    );

	var rules = {
		    	rules: {
					e_category_name: {
						required: true,
						minlength: 2,
						unique_category: true

					}
				},
				messages: {
				  
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#edit_category_form').validate(validationObj);
		
});