/* pagasa/js/demo/validation */

$(function () {

	var rules = {
		    	rules: {
					f_name: {
						minlength: 2,
						required: true,
						lettersonly: true
					},
					m_name: {
						minlength: 2,
						required: true
					},
					l_name: {
						minlength: 2,
						required: true
					},
					birthdate: {
						required: true,
						date: true
					},
					gender: {
			      		required: true
			         },
					zipcode: {
						minlength: 4,
						maxlength: 4,
						digits: true,
						required: true
						
					},
					street: {
						minlength: 2,
						required: true
					},
					barangay: {
						minlength: 2,
						required: true
					},
					city: {
						minlength: 2,
						required: true
					},
					province: {
						minlength: 2,
						required: true
					},
					name_of_parent_guardian: {
						minlength: 2,
						required: true
					},
					Relation: {
			      	required: true
			         },
					name_of_last_sch_attended: {
						minlength: 5,
						required: true
					},
					exam_result: {
						minlength: 2,
						required: true
					},
					s_name: {
						minlength: 2,
						required: true
					},
					grantor: {
						minlength: 2,
						required: true
					},
					f_grant: {
						minlength: 10,
						required: true
					},
					s_date: {
						required: true,
						date: true
					},
					days: {
						minlength: 3,
						digits: true,
						required: true
					},
					year_level: {
						required: true,
						
					},
					scholarship: {
						required: true,
						
					},
					
					final_grade: {
						minlength: 2,
						required: true,
					}
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
		jQuery.validator.addMethod("lttersonly", function(value, element) {
				return this.optional(element) || /^[a-z]+$/i.test(value);
		}, "Letters only please");  
		
		$('#validation-form').validate(validationObj);
		
});