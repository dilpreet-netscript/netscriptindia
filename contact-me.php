<?php
/*******DB connectivity here********/
$con = mysqli_connect("localhost","root","admin","netscript_db");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
/*******check special character here********/
function isValid($str) {
	return !preg_match('/[^A-Za-z0-9.#\\-$]/', $str);
}
$action = $_REQUEST['user_action'];
if(isset($action)):
/*******contact us form here********/
if($action=='contact_us_data'):
$userName = trim($_REQUEST['userName']);
$userEmail = trim($_REQUEST['userEmail']);
$userSubject = trim($_REQUEST['userSubject']);
$userMessage = trim($_REQUEST['userMessage']);
if($userName==''):
/*******jsson error msg here********/
echo json_encode(array('type'=>'error','text'=>'Enter Your name'));
elseif($userEmail==''):
/*******jsson error msg here********/
echo json_encode(array('type'=>'error','text'=>'Enter Your Email'));
elseif(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)):
/*******jsson error msg here********/
echo json_encode(array('type'=>'error','text'=>'Invalid Email Format'));
else:
$to = "contact@netscriptindia.com";
$subject = $userSubject;
$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Subject</th>
<th>Message</th>
</tr>
<tr>
<td>".$userName."</td>
<td>".$userEmail."</td>
<td>".$userSubject."</td>
<td>".$userMessage."</td>
</tr>
</table>
</body>
</html>
";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
echo mail($to,$subject,$message,$headers);
$sql ="insert into contactus_tbl(user_name,user_email,user_subject,user_message,createdAt) values('$userName','$userEmail','$userSubject','$userMessage',CURRENT_TIMESTAMP)";
$result = mysqli_query($con,$sql);
/*******jsson successs msg here********/
echo json_encode(array('type'=>'success','text'=>'Thanks For Subscribing'));
endif;
/*******Notyfi view email id form here********/
elseif($action=='notify_me_when_available'):
$userEmail = trim($_REQUEST['userEmail']);
if($userEmail==''):
/*******jsson error msg here********/
echo json_encode(array('type'=>'error','text'=>'Enter Your Email'));
elseif(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)):
/*******jsson error msg here********/
echo json_encode(array('type'=>'error','text'=>'Invalid Email Format'));
else:
$to = "contact@netscriptindia.com";
$subject = 'Notify for available';
$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>

<th>Email</th>

</tr>
<tr>
<td>".$userEmail."</td>

</tr>
</table>
</body>
</html>
";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($to,$subject,$message,$headers);
$sql ="insert into notify_tbl(email_id,createdAt) values('$userEmail',CURRENT_TIMESTAMP)";
$result = mysqli_query($con,$sql);
/*******jsson success msg here********/
echo json_encode(array('type'=>'success','text'=>'Thanks For Subscribing'));
endif;
/*******Carrerr form apply now form here********/
elseif( $action == 'sendmail_data'):
$job_title = trim($_POST['job_title']);
$name = trim($_POST['user_name']);
$mobile = trim($_POST['mobile_no']);
$email = trim($_POST['email_id']);
$location = trim($_POST['job_location']);
$cover_letter = trim($_POST['cover_letter']);
if(empty($job_title) || $job_title==NULL)
{
	/*******jsson error msg for job title here********/
	echo json_encode(array('type'=>'error','text'=>'Enter job title'));
	die();
}
else if(!isValid($job_title))
{
	/*******jsson error msg for job title here********/
	echo json_encode(array('type'=>'error','text'=>'Do not use any special character in job title'));
	die();
}else if(empty($name) || $name==NULL)
{
	/*******jsson error msg for name here********/
	echo json_encode(array('type'=>'error','text'=>'Enter name'));
	die();
}
else if(!isValid($name))
{
	/*******jsson error msg for name here********/
	echo json_encode(array('type'=>'error','text'=>'Do not use any special character in name'));
	die();
}else if(empty($mobile) || $mobile==NULL)
{
	/*******jsson error msg for mobile no here********/
	echo json_encode(array('type'=>'error','text'=>'Enter mobile no'));
	die();
}else if(!is_numeric($mobile))
{
	/*******jsson error msg for mobile no here********/
	echo json_encode(array('type'=>'error','text'=>'Enter Valid mobile no'));
	die();
}else if(strlen($mobile)<>10)
{
	/*******jsson error msg for mobile no here********/
	echo json_encode(array('type'=>'error','text'=>'Enter min and max 10 character in mobile no'));
	die();
}else if(!isValid($mobile))
{
	/*******jsson error msg for mobile no here********/
	echo json_encode(array('type'=>'error','text'=>'Do not use any special character in mobile no'));
	die();
}else if(empty($email) || $email==NULL)
{
	/*******jsson error msg for email id here********/
	echo json_encode(array('type'=>'error','text'=>'Enter email id'));
	die();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	/*******jsson error msg for email id here********/
	echo json_encode(array('type'=>'error','text'=>'Enter valid email id'));
	die();
}else if(empty($location) || $location==NULL)
{
	/*******jsson error msg for job location here********/
	echo json_encode(array('type'=>'error','text'=>'Enter job location'));
	die();
}
else if(!isValid($location))
{
	/*******jsson error msg for job location here********/
	echo json_encode(array('type'=>'error','text'=>'Do not use any special character in job location'));
	die();
}else if(empty($cover_letter) || $cover_letter==NULL)
{
	/*******jsson error msg for cover letter here********/
	echo json_encode(array('type'=>'error','text'=>'Enter Cover letter'));
	die();
}
else if(!isValid($cover_letter))
{
	/*******jsson error msg for cover letter here********/
	echo json_encode(array('type'=>'error','text'=>'Do not use any special character in Cover letter'));
	die();
}
$sql ="insert into subscriber_tbl(job_title,name,mobile,email,loc,cover_letter,createdAt) values('$job_title','$name','$mobile','$email','$location','$cover_letter',CURRENT_TIMESTAMP)";
$result = mysqli_query($con,$sql);
/*******jsson success msg here********/
echo json_encode(array('type'=>'success','text'=>'Your request received successfully, we will get back you soon. Thanks'));
die();
else:
/*******jsson error msg here********/
echo json_encode(array('type'=>'error','text'=>'action is empty'));
die();
endif;
endif;