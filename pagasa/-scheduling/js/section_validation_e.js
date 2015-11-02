$(function () {
    $.validator.addMethod("e_unique_section", 
        function(value, element) {
            var result = false;
			var id = $("#section_id").val();

            $.ajax({
                type:"GET",
                async: false,
                url: "js/validation_scripts/check_section_name_e.php", // script to validate in server side
                data: {section_name: value, section_id:id},
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
	
	$.validator.addMethod("e_unique_section_no", 
        function(value, element) {
            var result = false;
			var level = $("#e_year_level").val();
			var id = $("#section_id").val();
			console.log(id);
			console.log(level);
			console.log(value);
            $.ajax({
                type:"GET",
                async: false,
                url: "js/validation_scripts/check_section_no_e.php", // script to validate in server side
                data: {section_no: value, year_level: level, section_id:id},
                success: function(data) {
					//alert(data);
					console.log(data);
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

					e_year_level: {
						required: true,
						//uniqueSection: true
					},
					e_curriculum: {
						required: true,
					},
					e_section_no: {
						digits: true,
						required: true,
						e_unique_section_no: true
					},
					e_section_name: {
						minlength: 4,
						required: true,
						e_unique_section: true
					},
			        e_class_adviser: {
			      	    required: true
		      	    },
			        e_section_size: {
			      	    required: true,
			      	    min: 10	
		      	    }
				},
				
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#edit_form').validate(validationObj);
		
});