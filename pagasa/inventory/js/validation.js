$(function () {

	var rules = {
		    	rules: {
					stock_no: {
						required: true
					},
					ris_no: {
						minlength: 2,
						required: true
						
					},
					rcc: {
						required: true,
						digits: true
					},
					supplier: {
						required:true
					},
					type_no: {
						required: true
					},
			      item_no: {
			      	required: true,
					digits: true
		      		},
			      detail_no: {
			      	required: true,
					digits: true
		      	  },
				  description: {
			      	required: true
		      	  },
				  quantity: {
			      	required: true,	
					digits: true
		      	  },
				  unit: {
			      	required: true	
		      	  },
			      unit_amount: {
			      	required: true,
					digits: true
			      }
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
		jQuery.validator.addMethod("lettersonly", function(value, element) {
				return this.optional(element) || /^[a-z]\ +$/i.test(value);
		}, "Letters only please");  
	    
		$('#validation-form').validate(validationObj);
		
});