$(function () {
    $.validator.addMethod("unique_level", 
        function(value, element) {
            var result = false;
			var id = $("#lvl_id").val();
            $.ajax({
                type:"GET",
                async: false,
                url: "js/validation_scripts/check_level_e.php", // script to validate in server side
                data: {year_lvl: value, lvl_id:id},
                success: function(data) {
					//alert(data);
                    result = (data == "true") ? true : false;
                }
            });
            // return true if username is exist in database
            
			return result; 
        }, 
        "This level is already taken."
    );
    $.validator.addMethod("unique_level_name", 
        function(value, element) {
            var result = false;
			var id = $("#lvl_id").val();
            $.ajax({
                type:"GET",
                async: false,
                url: "js/validation_scripts/check_level_name_e.php", // script to validate in server side
                data: {lvl_name: value, lvl_id:id},
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
					e_level: {
						required: true,
						digits: true,
						unique_level: true

					},
					e_level_name: {
						required: true,
						unique_level_name: true
					}
				},
				messages: {
				  
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#edit_year_level_form').validate(validationObj);
		
});