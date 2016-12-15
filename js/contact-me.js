(function($){
// your standard jquery code goes here with $ prefix
// best used inside a page with inline code, 
// or outside the document ready, enter code here
$(document).ready(function($) {
/*******contact us form here********/
    $("#contact-form [type='submit']").click(function(e) {
        e.preventDefault();
        
        // Get input field values of the contact form
        var user_name       = $('input[name=name]').val();
        var user_email      = $('input[name=email-address]').val();
        var user_subject    = $('input[name=subject]').val();
        var user_message    = $('textarea[name=message]').val();
		var user_action		= $(this).closest('form').find('input[name=action]').val();
       
        // Datadata to be sent to server
        post_data = {'userName':user_name, 'userEmail':user_email, 'userSubject':user_subject, 'userMessage':user_message, 'user_action':user_action};
       
        // Ajax post data to server
        $.post('contact-me.php', post_data, function(response){  
           
            // Load json data from server and output message    
            if(response.type == 'error') {

                output = '<div class="error-message"><p>'+response.text+'</p></div>';
                
            } else {
           
                output = '<div class="success-message"><p>'+response.text+'</p></div>';
               
                // After, all the fields are reseted
                $('#contact-form input').val('');
                $('#contact-form textarea').val('');
                
            }
           
            $("#answer").hide().html(output).fadeIn();

        }, 'json');
		$('#contact-form')[0].reset();

    });
   
    // Reset and hide all messages on .keyup()
    $("#contact-form input, #contact-form textarea").keyup(function() {
        $("#answer").fadeOut();
    });
	/*******Notyfi view email id form here********/
      $("#notifijs").click(function(e) {
        e.preventDefault();
        
        // Get input field values of the contact form
     var user_email    = $(this).closest('form').find('#mail-sub').val();
		var user_action		= $(this).closest('form').find('input[name=action]').val();
       
        // Datadata to be sent to server
        post_data = {'userEmail':user_email, 'user_action':user_action};
       
        // Ajax post data to server
        $.post('contact-me.php', post_data, function(response){  
      
            // Load json data from server and output message    
            if(response.type == 'error') {

                output = '<div class="error-message"><p>'+response.text+'</p></div>';
                
            } else {
           
                output = '<div class="success-message"><p>'+response.text+'</p></div>';
               
                // After, all the fields are reseted
            
                
            }
           $('#mail-sub').val('');
           $(".message").hide().html('<p class="notify-valid">'+output+'</p>').fadeIn();

        }, 'json');
		$('#mail-sub').val('');

    });
	$("#notifyMe input").keyup(function() {
                $(".message").fadeOut();
            });
			
			$('.careerbtn').click(function(){
//alert('hello');
$('#contactdiv').show('fast');
});
/*******check special character here********/
var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-="
var check = function(string){
    for(i = 0; i < specialChars.length;i++){
        if(string.indexOf(specialChars[i]) > -1){
            return true
        }
    }
    return false;
}
/*******number match pattren here********/
var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
/*******email match pattren here********/
var email_patren = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
/*******Carrerr form apply now form here********/
$('.sendmail').click(function(e){
	e.preventDefault();
	var $this = $(this);
	$('#success_msg').hide('fast').html('');
var job_title = $('#job_title').val();
var user_name = $('#user_name').val();
var mobile_no = $('#mobile_no').val();
var email_id = $('#email_id').val();
var job_location = $('#job_location').val();
var cover_letter = $('#cover_letter').val();
if(job_title=='')
{
	$('#success_msg').show('fast').html('Enter job title');
	return false;
}
else if(!check(job_title)==false)
{
	$('#success_msg').show('fast').html('Do not use any special character in job title');
	return false;
}
else if(user_name=='')
{
	$('#success_msg').show('fast').html('Enter name');
	return false;
}
else if(!check(user_name)==false)
{
	$('#success_msg').show('fast').html('Do not use any special character in name');
	return false;
}
else if(mobile_no=='')
{
	$('#success_msg').show('fast').html('Enter mobile no');
	return false;
}
else if(!check(mobile_no)==false)
{
	$('#success_msg').show('fast').html('Do not use any special character in mobile no');
	return false;
}
else if(!numberRegex.test(mobile_no))
{
	$('#success_msg').show('fast').html('Enter valid  mobile no');
	return false;
}
else if(mobile_no.length!=10)
{
	$('#success_msg').show('fast').html('Enter min and max 10 character');
	return false;
}
else if(email_id=='')
{
	$('#success_msg').show('fast').html('Enter Email ID');
	return false;
}
else if(!email_id.match(email_patren)) 
{
	$('#success_msg').show('fast').html('Enter valid Email ID');
	return false;
}
else if(job_location=='')
{
	$('#success_msg').show('fast').html('Enter your job location');
	return false;
}
else if(!check(job_location)==false)
{
	$('#success_msg').show('fast').html('Do not use any special character in Job Location');
	return false;
}
else if(cover_letter=='')
{
	$('#success_msg').show('fast').html('Enter Cover letter');
	return false;
}
else if(!check(cover_letter)==false)
{
	$('#success_msg').show('fast').html('Do not use any special character in Cover letter');
	return false;
}
else
{
var post_data = $(this).closest('form').serialize();
        $.post('contact-me.php', post_data, function(response){ 
		var output; 
            if(response.type == 'error') {
                $('#success_msg').show('fast').html('<p class="notify-valid"><div class="error-message"><p>'+response.text+'</p></div></p>');
				return false;
				//console.log(response.text);
            } else {
                $('#success_msg').show('fast').html('<p class="notify-valid"><div class="success-message"><p>'+response.text+'</p></div></p>');
				$this.closest('form')[0].reset();
		 		$("#success_msg").fadeOut(3000);
				setTimeout(function(){$('#myModalNorm').modal('hide');},3000);
				return false;
            }
        }, 'json');
		
}
});

			
});

 })(jQuery);