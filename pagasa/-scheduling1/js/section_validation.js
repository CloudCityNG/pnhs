$(function () {
    $.validator.addMethod("unique_section", 
        function(value, element) {
            var result = false;
            $.ajax({
                type:"GET",
                async: false,
                url: "js/validation_scripts/check_section_name.php", // script to validate in server side
                data: {section_name: value},
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
	
	$.validator.addMethod("unique_section_no", 
        function(value, element) {
            var result = false;
			var level = $("#year_level").val();
			console.log(level);
			console.log(value);
            $.ajax({
                type:"GET",
                async: false,
                url: "js/validation_scripts/check_section_no.php", // script to validate in server side
                data: {section_no: value, year_level: level},
                success: function(data) {
					//alert(data);
                    result = (data == "true") ? true : false;
                }
            });
            // return true if username is exist in database
            
			return result; 
        }, 
        "Section number is already taken."
    );
  
	var rules = {
		    	rules: {

					year_level: {
						required: true,
						//uniqueSection: true
					},
					curriculum: {
						required: true,
					},
					section_no: {
						digits: true,
						required: true,
						unique_section_no: true
					},
					section_name: {
						minlength: 4,
						required: true,
						unique_section: true
					},
			        class_adviser: {
			      	    required: true
		      	    },
			        section_size: {
			      	    required: true,
			      	    min: 10	
		      	    }
				},
				
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#add-form').validate(validationObj);
		
});