/* pagasa/js/demo/validation */

$(function () {

	var rules = {
		    	rules: {
					call_no: {
						minlength: 2,
						required: true,
					},
					title: {
						minlength: 2,
						required: true,
					},
					subtitle: {
						minlength: 2,
							},
					pages: {
						minlength: 1,
						required: true,
						digits: true
					},
					
					volume: {
						minlength: 1,
					},
					copyright: {
						digits: true,
						required: true,
						digits: true

					},
					size: {
						minlength: 1,
						required: true,
					},
					units: {
			      		required: true
			         },
					borrowtype: {
						required: true
					},
					ddc: {
						required: true
					},
					isbn: {
						minlength: 4,
						required: true
						
					},
					description: {
						minlength: 2,
					},
					quantity: {
						minlength: 1,
						digits: true,
						required: true
					},
					publisher: {
						required: true
					},
					sup: {
						required: true
					},
					unitprice: {
						required: true,
					},
					booktype: {
			      	required: true
			         },
					newsupplier: {
					required: true
			        },
					fname1: {
						minlength: 2,
						required: true,
						lettersonly: true

					},
					mname1: {
						minlength: 2,
					},
					lname1: {
						minlength: 2,
						required: true,
						lettersonly: true

					},
					xname1: {
						minlength: 2,
					},
					
					
					fname2: {
						minlength: 2,
						lettersonly: true

					},
					mname2: {
						minlength: 2,
					},
					lname2: {
						minlength: 2,
						lettersonly: true

					},
					xname2: {
						minlength: 2,
					},
					fname3: {
						minlength: 2,
						lettersonly: true

					},
					mname3: {
						minlength: 2,
					},
					lname3: {
						minlength: 2,
						lettersonly: true

					},
					xname3: {
						minlength: 2,
					},
					fname4: {
						minlength: 2,
						lettersonly: true

					},
					mname4: {
						minlength: 2,
					},
					lname4: {
						minlength: 2,
						lettersonly: true

					},
					xname4: {
						minlength: 2,
					},
					
					fname5: {
						minlength: 2,
						lettersonly: true

					},
					mname5: {
						minlength: 2,
					},
					lname5: {
						minlength: 2,
						lettersonly: true

					},
					xname5: {
						minlength: 2,
					},
					fname6: {
						minlength: 2,
						lettersonly: true
					},
					mname6: {
						minlength: 2,
					},
					lname6: {
						minlength: 2,
						lettersonly: true
					},
					xname6: {
						minlength: 2,
					},
					issn: {
						minlength: 4,
						required: true
					},
					label: {
						minlength: 2,
					},
					month: {
						required: true
							},
					year: {
						required: true
							},
					every: {
						digits: true,
						required: true
					},
					issue_unit:{
						required: true,
							},
					every1: {
						digits: true,
							},
					issue_unit1:{
						lettersonly: true,
					},
					month1: {
						lettersonly: true,
					},
					year1 : {
						digits: true,
					}
					
					
					}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
		
		$('#validation-form').validate(validationObj);
		$('#validation-form1').validate(validationObj);
	
		
});

