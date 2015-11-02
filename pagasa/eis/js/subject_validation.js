$(function () {

	var rules = {
		    	rules: {
					subject_title: {
						required: true,
						remote: {
							url: "../actions/subject_name_check.php",
							type: "get",
							data: {
								title: function() {
									var title = $("#subject_title").val();
									return title;
								}
							}
						}
					},
					name: {
						minlength: 2,
						required: true
					},
					subject_unit: {
						required: true,
					},
					subject_year: {
						required: true
					},
					category: {
						required: true
					}
				},
				messages: {
				    subject_title: {
						remote: "HANEEEEEp"
					}
				}
		    };
		
	    var validationObj = $.extend (rules, Application.validationRules);
	    
		$('#form').validate(validationObj);
		
});