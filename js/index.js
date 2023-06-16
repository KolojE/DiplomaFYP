  $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-remove',
            validating: 'fa fa-refresh'
        },
        fields: {
           
         Leave: {
                validators: {
                    notEmpty: {
                        message: 'Please select your Leave Type'
                    }
                }
            },
        Date1: {
                validators: {
                    notEmpty: {
                        message: 'Please select your Date '
                    }
                }
            },
            Date2: {
                validators: {
                    notEmpty: {
                        message: 'Please select your Date '
                    }
                }
            },
		}
        })
      
});