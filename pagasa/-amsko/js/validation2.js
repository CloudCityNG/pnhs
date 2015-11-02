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
						required: true
					},
					supplier: {
						required:true
					},
					type_no: {
						required: true
					},
			      item_no: {
			      	required: true
		      		},
			      detail_no: {
			      	required: true
		      	  },
				  description: {
			      	required: true	
		      	  },
				  quantity: {
			      	required: true	
		      	  },
				  unit: {
			      	required: true	
		      	  },
			      unit_amount: {
			      	required: true
			      }
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#validation-form').validate(validationObj);
		
});